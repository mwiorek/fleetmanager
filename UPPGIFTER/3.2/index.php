<?php 

header('Content-type: text/html');

$html = file_get_contents("template.html");

$split_page = preg_split("/({% loop %})/", $html); //split page att loop tag

echo $split_page[0];
foreach ($_ENV as $k => $v) {
	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
	//eval for each iteration
}
foreach ($_SERVER as $k => $v) {
	$v = (is_array($v)) ? 'array()' : $v;
	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
	//eval for each iteration
}
echo $split_page[2];