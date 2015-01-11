<?php

require('includes/classes/external/class.phpmailer.php');
require('includes/classes/external/class.smtp.php');
//require php mailer class for emailing.
$emailTemplate = new Smarty;

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.live.com';  					  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'martinwiorek@hotmail.com';         // SMTP username
$mail->Password = 'wiorek1';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'no-reply@bi-dashboard.com';
$mail->FromName = 'BI-Dashboard';

$mail->addAddress('martinwiorek@hotmail.com', 'Martin Wiorek');     // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Account Registered for BI-Dashboard';

$smarty->assign('name', 'Martin');

$mail->Body    = $smarty->fetch('register_email_html.tpl');
$mail->AltBody = $smarty->fetch('register_email_plain.tpl');

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}