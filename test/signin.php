<?php
require "dbConnection.php";
session_start();
if (isset($_POST['signin']) && isset($_POST['email_phone']) && isset($_POST['password'])) {
    //check if email or phone
    $email_phone=$_POST['email_phone'];
    $password=$_POST['password'];
    if(is_numeric($email_phone)){
        //check from db
        $stmt=$conn->prepare("SELECT * FROM tbl_details WHERE phone=? AND password=?");
        $stmt->bind_param("ss",$email_phone,$password);
        if (!$stmt->execute()){
            //error
            header("location: index.html?msg=error3");
        }else{
                //success
            $stmt->execute();
                $result=$stmt->get_result();
                $row=$result->fetch_row();
//                $_SESSION['id']=$email_phone;
                $_SESSION['cdr']=$row['id'];
                header("location: dashboard.php");
        }

    }else{
        //check from db
        $stmt=$conn->prepare("SELECT * FROM tbl_details WHERE email=? AND password=?");
        $stmt->bind_param("ss",$email_phone,$password);
        if (!$stmt->execute()){
            //error
            header("location: index.html?msg=error2");
        }else{
            //success
            $stmt->execute();
                $result=$stmt->get_result();
                $row=$result->fetch_array();
                    $_SESSION['cdr'] = $row['id'];
                    header("location: dashboard.php");
//                }
        }
    }

}else{
    //error
    header("location: index.html?msg=error1");
}

//function checkPasswordForPhone($password,$phone,$conn){
//    $stmt=$conn->prepare("SELECT * FROM tbl_test WHERE phone=?");
//    $stmt->bind_param("s",$phone);
//    $stmt->execute();
//    $result=$stmt->get_result();
//    $row=$result->fetch_array();
//    return password_verify($password,$row['password']);
//}
//
//function checkPasswordForEmail($password,$email,$conn){
//    $stmt=$conn->prepare("SELECT * FROM tbl_test WHERE email=?");
//    $stmt->bind_param("s",$email);
//    $stmt->execute();
//    $result=$stmt->get_result();
//    $row=$result->fetch_array();
//    return password_verify($password,$row['password']);
//}