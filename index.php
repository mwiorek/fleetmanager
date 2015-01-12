<?php

require_once('./includes/application_top.php');

require_once(SMARTY_DIR . 'Smarty.class.php');


require(DIR_WS_CLASSES . 'user.php');
require(DIR_WS_CLASSES . FILENAME_VEHICLE);
require(DIR_WS_CLASSES . FILENAME_DRIVERS_ENTRY);


if (!isset($_SESSION['users_id'])){
	$_SESSION['redirect_uri'] = $_SERVER['SCRIPT_NAME'];
	http_redirect(FILENAME_LOGIN);
}

$user = new user($_SESSION['users_id']);

$userList = user::getAllUsers();
$driverList = user::getAllUsers('DRIVER'); 

$available_drivers = driversEntry::getAvailableDrivers(); 
$active_drivers = driversEntry::getActiveDriverRows();
$available_vehicles = driversEntry::getAvailableVehicles();

$smarty = new Smarty();
$smarty->assign('page_title', "Dashboard");
$smarty->assign('user_roles', $user->getUserRole());

//ADMIN
$smarty->assign('usersList', $userList);

//ADM + ADMIN
$smarty->assign('available_drivers', $available_drivers);
$smarty->assign('active_drivers', $active_drivers);

$smarty->assign('available_vehicles', $available_vehicles);

$smarty->assign('all_vehicle_list', vehicle::listAllVehicles(false, "registration_number", $fromRow = 0, $rowCount = 20));

$smarty->display('index.tpl');	
