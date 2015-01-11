<?php 

header('Content-type: text/html');

$html = file_get_contents("template.html");

$split_page = preg_split("/({% loop %})/", $html); //split page att loop tag

$car_models = array('Jeep Wrangler TJ','Jeep Wrangler JK 2Dr', 'Jeep Wrangler JK 4Dr');

$destination_script = 'example.php';

$params = '?';

if (sizeof($_GET) > 0){
	$params .= http_build_query($_GET) . '&';
}

$error_message = '';

echo $split_page[0];
foreach ($car_models as $v) {
	$new_params = http_build_query(array('car' => $v));

	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
	//eval for each iteration
}

eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[2]), '"') . "\";");
