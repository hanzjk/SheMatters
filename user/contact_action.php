<?php


use PHPMailer\PHPMailer\PHPMailer;
use Stripe\Terminal\Location;

require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

  
  $from_name = $_POST['form_name'];
  $from_email = $_POST['form_email'];
  $msg = $_POST['form_message'];
  $subject="Inquiry From SHE Matters";

  $mail= new PHPMailer();

  $mail->isSMTP();
  $mail->Host="smtp.gmail.com";
  $mail->SMTPAuth=true;
  $mail->Username = "shematters21@gmail.com";
  $mail->Password = "shematters";
  $mail->Port = 465;

  $mail->SMTPSecure = "ssl"; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
     
  $mail->isHTML(true);
  $mail->setFrom($from_email,$from_name);
  $mail->addAddress("shematters21@gmail.com");

   
  $mail->Subject = ($subject);
  
  $mail->Body="Name : $from_name <br><br> Email : $from_email <br><br> Message : $msg";

  if($mail->send()){
     $status="success";
    header("Location: contact.php?action=$status");


  }



  else{
    $status="failed";
    header("Location: contact.php?action=$status");


  }




  
  

