<?php

require_once('./includes/application_top.php');

require_once(SMARTY_DIR . 'Smarty.class.php');

$errorStack = new errorStack; 

if (isset($_POST['action']) && ($_POST['action'] == 'login')){

	if (!isset($_POST['email']) || $_POST['email'] = ''){
		$errorStack->setError(601);
	}
	if (!isset($_POST['password']) || $_POST['password'] = ''){
		$errorStack->setError(602);
	}
}
	
	$input_email_address = $_POST['email_address'];
    $input_password = $_POST['password'];

	// Check if email exists
    if ($check_user_statement = $mysqli->prepare("select users_id, users_email_address, users_password from " . TABLE_USERS . " where users_email_address = ?' LIMIT 1")){
    	$check_user_statement->bind_param('s', $input_email_address);
    	$check_user_statement->execute();
    	$check_user_statement->store_result();
    	if ($check_user_statement->num_rows < 1){
			$errorStack->setError(103); //no email found
    		break;    	
    	}else{
    		$check_user_statement->bind_result($users_id, $users_email_address, $users_password);
    		$check_user = $check_user_statement->fetch();
    		
    		if (!password_verify($input_password, $check_user['users_password'])){
    			$errorStack->setError(104);
    		}else{
    			//user is authenticated
    			session_regenerate_id(); //regenerate session id to prevent session hijacking
    			if (isset($_SESSION['redirect_uri'])){
    				header("Location: " . $_SESSION['redirect_uri']);
    			}else{
    				header("Location: " . FILENAME_DEFAULT);
    			}
    		}
    	}
    }
    	

// }else{
	
	require_once(DIR_WS_INCLUDES . 'application_bottom.php');

	$errors = $errorStack->getErrors();
	print_r($errors);
	$smarty = new Smarty();


	$smarty->display('login.tpl');
// }
