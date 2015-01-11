<?php 

header('Content-type: text/html');

$cookies = array('time' => date("D M j H:i:s Y"), 
				 'name' => 'Yumm Yumm a cookie!');

foreach ($cookies as $k => $v) {
	setcookie($k, $v, time()+60*60*3 ); // 60sec*60min*3hr
}

$html = file_get_contents("template.html");

$split_page = preg_split("/({% loop %})/", $html); //split page att loop tag

$destination_script = 'example.php';

eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[0]), '"') . "\";");

foreach ($cookies as $k => $v) {

	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
	//eval for each iteration
}

eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[2]), '"') . "\";");