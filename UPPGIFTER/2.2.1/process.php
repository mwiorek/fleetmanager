<?php 
header('Content-type: text/plain');

function get_key_values($array, $indent=""){
	$str = NULL;
	foreach ($array as $k=>$v){
		if (is_array($v)){
			$str .= $indent . $k . ': Array ' . "\n";
			$str .= $indent . get_key_values($v, "     ");
		}else{
			$str .= $indent . $k . ': ' . $v . "\n";
		}	
	}
	return $str;
}

if (isset($_POST) && (sizeof($_POST) > 0 )){
	//is form submitted through POST method, check post array
	echo get_key_values($_POST);
}elseif (isset($_GET) && (sizeof($_GET) > 0 )){
	//elseif for submitted through GET method check GET array
	echo get_key_values($_GET);
}else{
	echo 'Neither $_POST nor $_GET array has any elements';
}