<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function newMail($address, $msg)
{
    require "../PHPMailer/src/PHPMailer.php";
    require "../PHPMailer/src/Exception.php";
    require "../PHPMailer/src/SMTP.php";
    require "../database/secrets.php";//contains gmail username and password

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $gmail_uname;
    $mail->Password = $gmail_password;
    $mail->SMTPSecure = "tsl";
    $mail->Port = "587";

    $mail->setFrom('ngangavictor10@gmail.com', 'Nganga Victor');
    $mail->addAddress($address, $address);
    $mail->Subject = 'New Account';
    $mail->Body = $msg;
    if (!$mail->send()) {
        echo json_encode(array('report' => '11'));
    } else {
        echo json_encode(array('report' => '0'));
    }
}
