<?php
   $email = $_GET["email"];
   require_once('PHPMailer/PHPMailerAutoload.php');
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "123sabinashrestha@gmail.com";
   $mail ->Password = "12345sabina";
   $mail ->SetFrom('noreply@howcode.org');
   $mail ->Subject = 'Conformation Mail';
   $mail ->Body = 'Your Booking has been conformed.... ';
   $mail ->AddAddress($email);
   $mail->Send();
   header("Location: viewenquiry.php");
 
 ?>
