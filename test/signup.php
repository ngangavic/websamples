<?php
require "dbConnection.php";
include "send-mail.php";
session_start();
unset($_SESSION['cdr']);
if (isset($_POST['signup']) && isset($_POST['phone']) && isset($_POST['email'])) {

    $signup = $_POST['signup'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //check if account exists
    $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE email=? OR phone=? ");
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $count = $stmt->get_result()->num_rows;
    if ($count > 0) {
        header("location: register.php?msg=Account exists");
    } else {

        $password = generatePassword();
//    $passHash=password_hash($password,PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO tbl_details(email,phone,password,dateReg)VALUES(?,?,?,CURRENT_TIMESTAMP)");
        $stmt->bind_param("sss", $email, $phone, $password);
        if (!$stmt->execute()) {
            //error
            header("location: register.php?msg=Error");
        } else {
            //success
//        setcookie("credential",$password);
//            mail($email, "New Account", "You have successfully registered. Here is your password: " . $password);
//            $_SESSION['credential'] = $password;
//            header("location: dashboard.php");
            $msg="Welcome! \n You just created an account. Your password is ".$password;
            newMail($email,$msg);
        }
    }
} else {
    //error
    header("location: register.php?msg=Error");
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
