<?php

require_once('./includes/application_top.php');

require_once(SMARTY_DIR . 'Smarty.class.php');

$smarty = new Smarty();

if (!isset($_SESSION['user_id'])){
	$_SESSION['redirect_uri'] = $_SERVER['SCRIPT_NAME'];
	bid_redirect(FILENAME_LOGIN);
}else{
	$smarty->display('index.tpl');	
}

