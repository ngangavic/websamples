<?php

use PHPMailer\PHPMailer\PHPMailer;
require "../dbConnection.php";
//include "send-mail.php";

if (isset($_POST['phone']) && isset($_POST['email'])) {

    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //check if account exists
    $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE email=? OR phone=? ");
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $result=$stmt->get_result();
    $count = $result->num_rows;
    if ($count == 0) {
        $password = generatePassword();
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO tbl_details(email,phone,password,dateReg)VALUES(?,?,?,CURRENT_TIMESTAMP)");
        $stmt->bind_param("sss", $email, $phone, $passHash);
        if (!$stmt->execute()) {
            //error
            echo json_encode(array('report' => '13'));
        } else {
            //success
            $msg = "Welcome! \n You just created an account. Your password is " . $password;
//            echo json_encode(array('report' => '1'));
//            echo json_encode(array('report' => '0'));
            newMail($email, $msg);
        }
    } else {
        echo json_encode(array('report' => '12'));
    }
} else {
    //error
    echo json_encode(array('report' => '10'));
}

function generatePassword()
{
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $pass = array();
    $charLength = strlen($chars);
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $charLength);
        $pass[] = $chars[$n];
    }
    return implode($pass);
}


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
