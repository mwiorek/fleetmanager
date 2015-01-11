<?php 

header('Content-type: text/html');

$html = file_get_contents("template2.html");

$split_page = preg_split("/({% loop %})/", $html); //split page att loop tag

$destination_script = 'index.php';

eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[0]), '"') . "\";");

foreach ($_COOKIE as $k => $v) {

	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
	//eval for each iteration
}

eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[2]), '"') . "\";");