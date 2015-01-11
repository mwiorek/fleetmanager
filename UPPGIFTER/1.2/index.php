<?php 

header('Content-type: text/plain');

function get_enviroment_variables($array, $array_name){
	$str = NULL;
	foreach ($array as $k=>$v){
		if (is_array($v)){
			$str .= $array_name . '[' . $k . '] = Array ' . "\n";
			$str .= get_enviroment_variables($v, $k);
		}else{
			$str .= $array_name . '[' . $k . '] = ' . $v . "\n";
		}	
	}
	return $str;
}

echo get_enviroment_variables($_ENV, '$_ENV');
echo get_enviroment_variables($_SERVER, '$_SERVER');
