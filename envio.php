<?php

require_once 'vendor/autoload.php';

$name = $_POST['name'];
$mail = $_POST['email'];
$subject = $_POST['subject'];
$message_body = $_POST['message'];


$info_body = "Cliente: ".$name."\r\n Correo: ".$mail."\r\n Mensaje: ".$message_body;


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.zoho.com', 465, 'SSL'))
  ->setUsername('ezenteno@elearning.com.gt')
  ->setPassword('zenteno94')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subject))
  ->setFrom(['ezenteno@elearning.com.gt' => 'Admin'])
  ->setTo(['ezenteno@elearning.com.gt', 'ezenteno@elearning.com.gt' => 'Ventas'])


  ->setBody($info_body);

// Send the message
$result = $mailer->send($message);


// Sendmail
$transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');

header("Location:index.html");

?>