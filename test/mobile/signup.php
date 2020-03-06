<?php
require "../dbConnection.php";
include "../send-mail.php";

if (isset($_POST['phone']) && isset($_POST['email'])) {

    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //check if account exists
    $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE email=? OR phone=? ");
    $stmt->bind_param("ss", $email, $phone);
    $stmt->execute();
    $count = $stmt->get_result()->num_rows;
    if ($count > 0) {
        echo json_encode(array('report' => '1'));
    } else {

        $password = generatePassword();
        $passHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO tbl_details(email,phone,password,dateReg)VALUES(?,?,?,CURRENT_TIMESTAMP)");
        $stmt->bind_param("sss", $email, $phone, $passHash);
        if (!$stmt->execute()) {
            //error
            echo json_encode(array('report' => '1'));
        } else {
            //success
            $msg = "Welcome! \n You just created an account. Your password is " . $password;
//            echo json_encode(array('report' => '1'));
            newMail($email, $msg);
        }
    }
} else {
    //error
    echo json_encode(array('report' => '1'));
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
