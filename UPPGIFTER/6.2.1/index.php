<?php

header('Content-type: text/html');

require('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = $_POST['name'];
	$email_adress = $_POST['email_adress'];
	$website = $_POST['website'];
	$comment = $_POST['comment'];

	insert_post($name, $email_adress, $website, $comment, date("Y-m-d H:i:s"));
}

//determine sort_order from $_GET[]
$sort_order = $_GET['sort_order'];

$sort_columns = array(array('1', '', 'Newest First'), array('2', '', 'Oldest First'), array('3', '', 'Name A-Z'), array('4', '', 'Name Z-A'));

for ($i=0; $i<sizeof($sort_columns); $i++){
	if ($i == $sort_order-1 ){
		$sort_columns[$i][1] = 'selected';
	}
}

$html = file_get_contents("template.html");

$split_page = preg_split("/({% loop %})/", $html); //split page att loop tag

echo $split_page[0];

foreach ($sort_columns as $k => $sort_column) {

	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[1]), '"') . "\";");
	//eval for each iteration
}

echo $split_page[2];

foreach (grab_posts($sort_order) as $k => $v) {

	eval("print \"" . addcslashes(preg_replace("/({{ (.+?) }})/", "\\2", $split_page[3]), '"') . "\";");
	//eval for each iteration
}

echo $split_page[4];