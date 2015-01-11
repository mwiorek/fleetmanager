<?php 

header('Content-type: text/plain');

$filepath = 'counter.txt';

$file = fopen($filepath, 'c+');
//open for read+write create if file does not exist

if (flock($file, LOCK_EX)) { // true if exclusive lock can be aquired 
	if (filesize($filepath) < 1){
		$counter = '0';	
	}else{
		$counter = fread($file, filesize($filepath));
	}
	
	$counter++;
	rewind($file);      // go to start of file
    fwrite($file,  $counter);
    fflush($file);            // flush output before releasing the lock
    flock($file, LOCK_UN);    // release the lock
    echo $counter;

} else {
    echo "Could not lock the file!";
}

fclose($file);

