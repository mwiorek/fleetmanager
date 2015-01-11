<?php 

header('Content-type: text/html');

$html = file_get_contents("template.html");

$split_page = preg_split("/({% loop %})/", $html); //split page att loop tag

$error_message = '';

switch ($_GET['car']) {
    case ('Jeep Wrangler TJ'):
        $years = array('2002', '2003', '2004', '2005', '2006');
        break;
    case ('Jeep Wrangler JK 2Dr'):
        $years = array('2007', '2008', '2009');
        break;
    case ('Jeep Wrangler JK 4Dr'):
        $years = array('2008', '2009', '2010');
        break;
}

if ( (!isset($years)) || (!isset($_GET['car'] ) ) ){
	$error_message = 'Something is wrong with the input data, please check you car'; 
}else{



	$destination_script = 'example2.php';

	$params = '?';
	if (sizeof($_GET) > 0){
		$params .= http_build_query($_GET) . '&';
	}

	echo $split_page[0];
	foreach ($years as $v) {

		$new_params = http_build_query(array('year' => $v));
		eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
		//eval for each iteration
	}
}
eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[2]), '"') . "\";");

