<?php
header('Content-type: text/plain');

function validate($user, $pass) {

	$users = array('adam' => 'eve');
	//Check inputs against $user => password array
	if (isset($users[$user]) && ($users[$user] === $pass)) { 
		return true;
	}else{
		return false;
	} 
}

//PHP triggers error 'uknown index' if we do not check if the keys exist
$username = (isset($_SERVER['PHP_AUTH_USER'])) ? $_SERVER['PHP_AUTH_USER'] : NULL;
$password = (isset($_SERVER['PHP_AUTH_PW'])) ? $_SERVER['PHP_AUTH_PW'] : NULL;

if (!validate($username, $password)){
	http_response_code(401);
	header('WWW-Authenticate: Basic realm="8.1.1"');
	echo "You need to enter username: adam, password: eve.";
	exit; 
}else{
	echo 'Great Success!! You are Logged in as: ' . $username;
}