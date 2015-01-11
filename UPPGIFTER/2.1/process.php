<?php

header('Content-type: text/plain');
header("Cache-Control: no-cache, must-revalidate");
header("expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT");

foreach ($_GET as $k=>$v){
	echo $k . ': ' . $v . "\n";
}
