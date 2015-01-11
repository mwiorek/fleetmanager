<?php 

$attachment = array();
//create new empty attachment array

for ($i = 0; $i < sizeof($_FILES); $i++){

	$maxsize = 4000000;

	if (isset($_FILES['file' . $i]) && ($_FILES['file' . $i] != '')){
		if($maxsize < $_FILES['file' . $i]['size']){ 
			$error_message = 'The uploaded file is too large';
		}elseif ($_FILES['file' . $i]['error'] != UPLOAD_ERR_OK){
			
			$error_codes = array(0 => "There is no error, the file uploaded with success", 
				1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini", 
				2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
				3 => "The uploaded file was only partially uploaded", 
				4 => "No file was uploaded", 
				6 => "Missing a temporary folder"); 

			$error_message = 'Uploaded file generated the following error: ' . $error_codes[$_FILES['file' . $i]['error']];
			
		}elseif ($_FILES['file' . $i]['error'] == UPLOAD_ERR_OK){
			$attachment[$i]['content'] = base64_encode(file_get_contents($_FILES['file' . $i]['tmp_name']));
			$attachment[$i]['encoding'] = 'base64';
			$attachment[$i]['filename'] = $_FILES['file' . $i]['name'];
			$attachment[$i]['MIME-type'] = $_FILES['file' . $i]['type'];
			

		}else{
			$error_message = 'an unknown error occurred';
		}

	}else{
		$error_message = 'There was a problem with the uploaded file';
	}

}

$email_to = $_POST['to'];
$email_subject = $_POST['subject'];

$email_headers = "MIME-Version: 1.0" . "\r\n"; //MIME to tell MIME-aware clients about MIME-type
$email_headers .= "Content-type: multipart/mixed; boundary=endOfMixedPart" . "\r\n";
		//multipart/mixed to handle attachments mail will include mixed types


$email_headers .= "From: " . $_POST['from'] . "\r\n";
$email_headers .= "Cc: " . $_POST['cc'] . "\r\n";
$email_headers .= "Bcc: " . $_POST['bcc'] . "\r\n";
$email_headers .= "Date: " . date("D M j H:i:s Y");

$email_message = "Content-type: text/plain" . "\r\n";
$email_message .= $_POST['message'];
$email_message .= "\n\n" . 'Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!';
$email_message .= "\n\n" . '--endOfMixedPart' . "\n\n";
	//message part of email ends here 

for ($i = 0; $i < sizeof($attachment); $i++){
	$attachment_message = "Content-Type: " . $attachment[$i]['MIME-type'] . "; name=" . $attachment[$i]['filename'] . "\n";  
	$attachment_message .= "Content-Transfer-Encoding: " . $attachment[$i]['encoding'] . "\n";  
	$attachment_message .= "Content-Disposition: attachment;  filename=" . $attachment[$i]['filename'] . "\n";
	$attachment_message .= $attachment[$i]['content'] . "\n";
	$attachment_message .= "\n\n" . '--endOfMixedPart' . "\n\n";

		//attach attachment to message
	$email_message .= $attachment_message;
}
header('Content-type: text/plain');

if ($_POST['password'] == '5678'){

	if (mail($email_to, $email_subject, $email_message, $email_headers)){

		echo "EMAIL SENT:" . "\n";

		echo "To: " . $email_to . "\n";
		echo "Subject: " . $email_subject . "\n";
		echo $email_headers . "\n\n";

		echo "Message: \n" . $email_message . "\n";

	}else{
		echo 'Mail was not sent, an error occurred';
	}

}else{
	echo 'Password is incorrect.';
}




