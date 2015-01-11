<?php 

header('Content-type: text/plain');

$email_to = $_POST['to'];
$email_subject = $_POST['subject'];
$email_message = $_POST['message'];
$email_message .= "\n\n" . 'Observera! Detta meddelande är sänt från ett formulär på Internet och avsändaren kan vara felaktig!';

$email_headers = "MIME-Version: 1.0" . "\r\n"; //MIME to tell MIME-aware clients about MIME-type
$email_headers .= "Content-type: text/plain; charset=iso-8859-1" . "\r\n";
$email_headers .= "Content-Transfer-Encoding: 8bit" . "\r\n"; //good practice to define encoding
$email_headers .= "From: " . $_POST['from'] . "\r\n";
$email_headers .= "Cc: " . $_POST['cc'] . "\r\n";
$email_headers .= "Bcc: " . $_POST['bcc'] . "\r\n";
$email_headers .= "Date: " . date("D M j H:i:s Y");

if ($_POST['password'] == '5678'){
	
	if (mail($email_to, $email_subject, $email_message, $email_headers)){

		echo "EMAIL SENT:" . "\n";

		echo "To: " . $email_to . "\n";
		echo "Subject: " . $email_subject . "\n";
		echo $email_headers . "\n\n";

		echo "Message: \n" . $email_message . "\n";

	}else{
		echo 'Mail was not sent, an error occured';
	}

	

}else{
	echo 'Password is incorrect.';
}