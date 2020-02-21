<?php
require "dbConnection.php";

if (isset($_POST['signup']) && isset($_POST['phone']) && isset($_POST['email'])) {

    $signup = $_POST['signup'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $password=generatePassword();
//    $passHash=password_hash($password,PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO tbl_details(email,phone,password,dateReg)VALUES(?,?,?,CURRENT_TIMESTAMP)");
    $stmt->bind_param("sss", $email, $phone, $password);
    if (!$stmt->execute()) {
        //error
        header("location: register.html?msg=error");
    } else {
        //success
        setcookie("credential",$password);
        header("location: dashboard.php");
    }

} else {
    //error
    header("location: register.html?msg=error");
}

function generatePassword(){
    $chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $pass=array();
    $charLength=strlen($chars);
    for ($i=0;$i<7;$i++){
        $n=rand(0,$charLength);
        $pass[]=$chars[$n];
    }
    return implode($pass);
}
