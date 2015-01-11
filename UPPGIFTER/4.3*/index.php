<?php 

header('Content-type: text/html');

$current_time = date("D M j H:i:s Y");

session_start();

if (isset($_GET['action']) && $_GET['action'] = 'reset'){
	if (isset($_SESSION['first_access'])){
		unset($_SESSION['first_access']);
	}
	header("Location: index.php"); //redirect to clear $_GET 
}


if (!isset($_SESSION['first_access'])){
	$_SESSION['first_access'] = $current_time;
}


$html = file_get_contents("template.html");

$destination_script = 'index.php';

$reset_parameters = "?action=reset";

eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $html), '"') . "\";");