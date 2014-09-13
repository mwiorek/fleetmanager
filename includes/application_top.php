<?php

require_once('includes/config.php'); //load config values

require_once(DIR_WS_INCLUDES . 'functions.php');

require_once('filename.php');
require_once('database_tables.php');

require_once(DIR_WS_CLASSES . 'errorStack.php');

require_once(DIR_WS_CLASSES . 'databaseConnection.php');

//TODO 
// make language choosable
$lang = 'english';

require_once(DIR_WS_LANGUAGES . sprintf(FILENAME_GLOBAL_LANGUAGE, $lang));


$db = new databaseConnection();

session_start();
