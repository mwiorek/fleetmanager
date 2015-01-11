<?php 

header("Content-Type: image/jpg");
header("Cache-Control: no-cache, must-revalidate");
header("expires: " . gmdate("D, d M Y H:i:s", time()) . " GMT");


$image = @imagecreate(500, 500)
    or die("Cannot Initialize new GD image stream");

$rbg = array('r' => mt_rand(0, 255),
			 'b' => mt_rand(0, 255),
			 'g' => mt_rand(0, 255)
			); 
$background = imagecolorallocate($image, $rbg['r'], $rbg['b'], $rbg['g']); 

//get random rgb color for background

$text_color = imagecolorallocate($image, 255-$rbg['r'], 255-$rbg['b'], 255-$rbg['g']); //invert background as textcolor 

imagestring($image, 5, 40, 250, gmdate("D, d M Y H:i:s", time()), $text_color); 
//write date as string to image with color: $text_color, with font 2, at (x,y): (40,250)

imagejpeg($image, NULL, 100); //outputs image to browser
imagedestroy($image); //frees up the memory image uses