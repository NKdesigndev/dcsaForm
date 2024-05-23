<?php
// require '../PHPMailer/PHPMailerAutoload.php'; // PHPMailer for sending emails

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require(__dir__ . '/../vendor/autoload.php');


function sendMail($email, $body) {
    
    // Send verification email
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'localhost'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->Username = null;
    $mail->Password = null;
    $mail->SMTPSecure = null;
    $mail->Port = 1025;

    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress($email);
    
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body = $body;
        
    if($mail->send()) {
        return true;
    } else {
        print_r($mail->ErrorInfo);
        die;
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

function sendVerificationMail($email, $token) {
    $body = "Click on the following link to verify your email: <a href='http://localhost/dcsaForm/verify.php?token=$token'>Verify Email</a>";

    if(sendMail($email, $body)) {
        echo 'A verification email has been sent to your email address.';
    }
}

?>
