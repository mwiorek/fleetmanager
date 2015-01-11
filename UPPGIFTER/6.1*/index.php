<?php

header('Content-type: text/plain');

$id = dba_open("database.db", "c", "db4"); //c creates database if not already exists

//make sure db opened
if (!$id) {
        echo "dba_open failed\n";
        exit;
}

$seconds = explode(" ", microtime()); //array to get use only the msec part of the microtime() string

dba_insert(date("Y-m-d H:i:s") . '.' . substr($seconds[0], 2), $_SERVER['REMOTE_ADDR'] . '|' . $_SERVER['HTTP_USER_AGENT'], $id);

$i = dba_firstkey($id); 

while($i != NULL) 
{ 
	$entry = explode('|',dba_fetch($i, $id));    // fetch as array 
	
	echo 'Time: ' . $i . "\n";
    echo 'IP-address: ' . $entry[0] . "\n";
    echo 'User Agent: ' . $entry[1] . "\n\n";
    //echo dba_fetch($i, $id) . "\n";
    $i = dba_nextkey($id); 
} 

dba_close($id);
?>