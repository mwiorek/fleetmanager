<?php

header('Content-type: text/plain');

foreach ($_POST as $k => $v) {
	echo $k . ' = ' . $v ."\n"; 
}