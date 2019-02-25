<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMessage($subject, $body) {
    date_default_timezone_set('Etc/UTC');
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 1;
    
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.a0274741.xsph.ru';
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "kraycenter@a0274741.xsph.ru";
    $mail->Password = "qwepoiasdlkj";
    $mail->setFrom('kraycenter@a0274741.xsph.ru', 'KrayCenter'); // Name 
    $mail->addAddress('doctor-maxin@yandex.ru', 'John Doe');
    $mail->Subject = $subject; // Theme
    
    $mail->msgHTML($body);
    
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    // $mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}

