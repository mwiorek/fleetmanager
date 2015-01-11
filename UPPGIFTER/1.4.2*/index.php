<?php 

//prevent php from buffering.. 
//empty the buffer and turn buffering off
ob_end_clean();

$randomBoundary = mt_rand();
//use a psuedo-random separator

header("Content-type: multipart/x-mixed-replace; boundary=" . $randomBoundary);

//while content keeps coming the browser is connected sleep(1) to make sure it takes a second to load the next part
for ($i=0; $i<10; $i++) {
	echo "Content-type: text/plain" . "\n\n";
	echo "Time: " . gmdate("D, d M Y H:i:s", time()) . "\n";
	echo "Count: " . (10 - $i) . "\n";
	echo "\n\n" . "--" . $randomBoundary . "\n\n" ;
	
	flush();
	sleep(1);
}