<?php
require 'mailgun-php/vendor/autoload.php';
require_once 'phpmailer/class.phpmailer.php';

	if($_REQUEST['action']=="demo"){
    $Requester_email= $_REQUEST['email'];
    $sender_email = "canopus.testing@gmail.com";
    $sender_password = "canopus123";
    $sender_name = "Courtesy";
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // specify main and backup server
    $mail->Port = 465;
    $mail->Username = $sender_email; // SMTP username
    $mail->Password = $sender_password; // SMTP password
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = 'ssl';
    $mail->From = $sender_email;
    $mail->FromName = $sender_name;
    $mail->AddAddress($Requester_email);
    $mail->AddAddress('smithjaron360@gmail.com');
    $mail->AddReplyTo($sender_email, $sender_name);
    $mail->WordWrap = 50; // set word wrap to 50 characters
    $mail->IsHTML(true); // set email format to HTML
    $mail->Subject ="Thanks For Contact";
    $mail->Body ="<b>We will get back to you soon</b> <b>Thanks</b>";
    if (!empty($file))
    {
        $mail->AddAttachment($file);
    }
    if(!$mail->send()) {
            //  echo 'Message could not be sent.';
            //  echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
            //  echo 'Message has been sent';
    }

    $message = "Form details below."."<br>";
    $message .= "Name: ".$_REQUEST['name']."<br>";
    $message .= "Email: ".$_REQUEST['email']."<br>";
    $message .= "Phone: ".$_REQUEST['phone']."<br>";
    $message .= "Company Name: ".$_REQUEST['company_title']."<br>";
    $message .= "City: ".$_REQUEST['city']."<br>";

    $sender_email = "canopus.testing@gmail.com";
    $sender_password = "canopus123";
    $sender_name = $Requester_email;
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // specify main and backup server
    $mail->Port = 465;
    $mail->Username = $sender_email; // SMTP username
    $mail->Password = $sender_password; // SMTP password
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = 'ssl';
    $mail->From = $sender_email;
    $mail->FromName = $sender_name;
    $mail->AddAddress('info@courtesyapp.co');
    $mail->AddAddress('smithjaron360@gmail.com');
    $mail->AddReplyTo($sender_email, $sender_name);
    $mail->WordWrap = 50; // set word wrap to 50 characters
    $mail->IsHTML(true); // set email format to HTML
    $mail->Subject ="Request a Demo";
    $mail->Body =$message;
    if (!empty($file))
    {
        $mail->AddAttachment($file);
    }
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
	}

if($_REQUEST['action']=="contact"){
  $from = $_POST['email'];
  $full_name = $_POST['name'];

  $sender_email = "canopus.testing@gmail.com";
  $sender_password = "canopus123";
  $sender_name = $full_name;
  $mail = new PHPMailer();
  $mail->IsSMTP(); // set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com'; // specify main and backup server
  $mail->Port = 465;
  $mail->Username = $sender_email; // SMTP username
  $mail->Password = $sender_password; // SMTP password
  $mail->SMTPAuth = true; // turn on SMTP authentication
  $mail->SMTPSecure = 'ssl';
  $mail->From = $sender_email;
  $mail->FromName = $sender_name;
  $mail->AddAddress('info@courtesyapp.co');
  $mail->AddAddress('smithjaron360@gmail.com');
  $mail->AddReplyTo($sender_email, $sender_name);
  $mail->WordWrap = 50; // set word wrap to 50 characters
  $mail->IsHTML(true); // set email format to HTML
  $mail->Subject =   $_POST['subject'];
  $mail->Body =$full_name . " wrote the following:" . "\n\n" . $_POST['msg'];
  if (!empty($file))
  {
      $mail->AddAttachment($file);
  }
  if(!$mail->send()) {
       echo 'Error';
      //     echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
        echo 'Success';
  }
}

 ?>
