<?php 

if (isset($_FILES) && ($_FILES > 0)){

	$maxsize = 200000;

	if (isset($_FILES['file'])){
		if($maxsize < $_FILES['file']['size']){ 
			$error_message = 'The uploaded file is too large';
		}elseif ($_FILES['file']['error'] != UPLOAD_ERR_OK){
			
			$error_codes = array(0 => "There is no error, the file uploaded with success", 
								 1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini", 
								 2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
								 3 => "The uploaded file was only partially uploaded", 
								 4 => "No file was uploaded", 
							  	 6 => "Missing a temporary folder" 
							); 

			$error_message = 'Uploaded file generated the following error: ' . $error_codes[$_FILES['file']['error']];
			
		}elseif ($_FILES['file']['error'] == UPLOAD_ERR_OK){

			if (in_array($_FILES['file']['type'], array('image/jpg', 'image/jpeg', 'image/png', 'image/gif'))){
				
				header('Content-Type: ' . $_FILES['file']['type']);
				readfile($_FILES['file']['tmp_name']);

			}elseif($_FILES['file']['type'] == 'text/plain') {
				header('Content-type: text/plain');
				$file = fopen($_FILES['file']['tmp_name'], "r");
				  while (!feof($file)) {
				  	echo fgets($file). "";
				}
				fclose($file);

			}else{
				header('Content-type: text/plain');
				echo 'Filename: ' . $_FILES['file']['name'] . "\n";
				echo 'MIME-type: ' . $_FILES['file']['type'] . "\n";
				echo 'Size: ' . $_FILES['file']['size'] . "\n";
			}

		}else{
			$error_message = 'an unknown error occurred';
		}

	}else{
		$error_message = 'There was a problem with the uploaded file';
	}

}else{
	$error_message = 'Nothing in $_FILES was found';
}

if (isset($error_message)){
	header('Content-type: text/plain');
	echo $error_message;
}