<?php

require_once('./includes/application_top.php');

require_once(SMARTY_DIR . 'Smarty.class.php');


require(DIR_WS_CLASSES . 'user.php');
require(DIR_WS_CLASSES . FILENAME_VEHICLE);


if (!isset($_SESSION['users_id'])){
	$_SESSION['redirect_uri'] = $_SERVER['SCRIPT_NAME'];
	http_redirect(FILENAME_LOGIN);
}else{

	$user = new user($_SESSION['users_id']);
	
	$userList = user::getAllUsers();
	$driverList = user::getAllUsers('DRIVER'); 
	
	$smarty = new Smarty();
	$smarty->assign('pageTitle', "Dashboard");

	$smarty->assign('users_roles', $user->getUserRole());

	$smarty->assign('usersList', $userList);
	
	$smarty->assign('vehicleList', vehicle::listAllVehicles(false, "registration_number", $fromRow = 0, $rowCount = 20));
	
	$smarty->display('index.tpl');	
}