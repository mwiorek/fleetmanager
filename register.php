<?php

require_once('./includes/application_top.php');

require_once(SMARTY_DIR . 'Smarty.class.php');

require(DIR_WS_CLASSES . 'userHandler.php');
require(DIR_WS_CLASSES . 'user.php');
$errorStack = new errorStack;
$userHandler = new userHandler;

if (isset($_POST['action']) && $_POST['action'] == 'register'){

	if (isset($_POST['name']) && ($_POST['name'] != '')){
		$name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	}else{
		$errorStack->setError(201);
	}
	if (isset($_POST['email_address']) && ($_POST['email_address'] != '')){
		//$email_address = idn_to_ascii($_POST['email_address']);
		$email_address = idn_to_ascii($_POST['email_address']);
		
		//punycode to bypass FILTER_VALIDATE_EMAIL unability to handle international domains
		if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)){
			$errorStack->setError(203);
		}else{
			$email_address = filter_var($email_address, FILTER_SANITIZE_EMAIL);
			if ($userHandler->emailIsRegistered($email_address)){
				$errorStack->setError(202);
			}
		}
	}else{
		$errorStack->setError(204);
	}
	if (isset($_POST['password']) && ($_POST['password'] != '')){
		$password = $_POST['password'];
	}else{
		$errorStack->setError(205);
	}
	if (isset($_POST['password_confirmation']) && ($_POST['password_confirmation'] != '')){
		$password_confirmation = $_POST['password_confirmation'];
	}else{
		$errorStack->setError(206);
	}

	if ($password !== $password_confirmation){
		$errorStack->setError(207);
	}
	
	if (!$errorStack->hasErrors()){
		//if all is clear create the new user
		if ($user = $userHandler->createUser($name, $email_address, $password)){
			
			$_SESSION['user_id'] = $user->getUserId();
			
			header("Location: " . FILENAME_DEFAULT);
		}
	}


}





$smarty = new Smarty();
if (isset($user_id)){
	$smarty->assign('user_id', $user_id);
}

$smarty->assign('errors', $errorStack->getErrors());	

$smarty->display('register.tpl');