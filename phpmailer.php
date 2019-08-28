<?php


$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;


require("lib/PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail->IsSMTP();


$mail->Host = "mail.example.com";  // specify main and backup server

$mail->SMTPAuth = true;     // turn on SMTP authentication


$mail->Username = "send_from_PHPMailer@bradm.inmotiontesting.com";  // SMTP username
$mail->Password = "password"; // SMTP password


$mail->From = $email;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress("asta282708@gmail.com", "Aastha Timalsina");

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = "You have received feedback from your website!";


$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>
