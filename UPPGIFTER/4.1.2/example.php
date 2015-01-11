<?php

header('Content-type: text/html');

$html = file_get_contents("template.html");

$error_page = file_get_contents("error_page.html");


$error_message = '';

$form_action = 'example2.php';

if (isset($_POST['regnr']) && !is_null($_POST['regnr'])){
	$regnr = $_POST['regnr'];
	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $html), '"') . "\";");
}else{
	$error_message = 'No Registration number given please go <a href="./">back.</a>';
	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $error_page), '"') . "\";");
}



