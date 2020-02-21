<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function newMail($address,$msg)
{
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/SMTP.php";

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ngangavictor10@gmail.com";
    $mail->Password = "";
    $mail->SMTPSecure = "tsl";
    $mail->Port = "587";

    $mail->setFrom('ngangavictor10@gmail.com', 'Nganga Victor');
    $mail->addAddress($address, $address);
    $mail->Subject = 'New Account';
    $mail->Body = $msg;
    if (!$mail->send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
//        echo 'Message has been sent.';
        header("location: register.php?msg=Account created check your email.");
    }
}
