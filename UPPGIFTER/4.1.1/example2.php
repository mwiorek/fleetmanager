<?php 

header('Content-type: text/plain');

foreach ($_GET as $k => $v) {
	echo $k . ' = ' . $v ."\n"; 
}