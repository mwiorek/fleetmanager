<?php 

//prevent php from buffering.. 
//empty the buffer and turn buffering off
ob_end_clean();

$randomBoundary = mt_rand();
header("Content-type: multipart/x-mixed-replace; boundary=" . $randomBoundary);

//while content keeps coming the browser is connected sleep(5) to wait 5 seconds for next part
//will load text/plain -> image/jpeg -> image/html in that order

/////////////////////////
// plain text section

echo "Content-type: text/plain" . "\n\n";
echo "The plage will reload in 5 seconds showing an image and then five seconds later a html page";
echo "\n\n" . "--" . $randomBoundary . "\n\n" ;

flush();
sleep(5);

/////////////////////////
// image section

echo "Content-type: image/jpeg" . "\n\n";

$image = @imagecreate(500, 500)
or die("Cannot Initialize new GD image stream");

$rbg = array('r' => mt_rand(0, 255),
	'b' => mt_rand(0, 255),
	'g' => mt_rand(0, 255)
	); 
$background = imagecolorallocate($image, $rbg['r'], $rbg['b'], $rbg['g']); 

//get random rgb color for background

$text_color = imagecolorallocate($image, 255-$rbg['r'], 255-$rbg['b'], 255-$rbg['g']); //invert background as textcolor 

imagestring($image, 5, mt_rand(0,250), mt_rand(0,400), gmdate("D, d M Y H:i:s", time()), $text_color); 
//write date as string to image with color: $text_color, with font 2, at (x,y): (random,random)

imagejpeg($image, NULL, 100); //outputs image to browser
imagedestroy($image); //frees up the memory image uses

echo "\n\n" . "--" . $randomBoundary . "\n\n" ;

flush();
sleep(5);

//////////////////////////////////
// HTML section

echo "Content-type: text/html" . "\n\n";
echo "This <i>section</i> is <b>HTML</b>";
echo "\n\n" . "--" . $randomBoundary . "\n\n" ;

flush();
