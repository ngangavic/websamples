<?php
require "../dbConnection.php";

if (isset($_POST['email_phone']) && isset($_POST['password'])) {
    //check if email or phone
    $email_phone = $_POST['email_phone'];
    $password = $_POST['password'];
    if (is_numeric($email_phone)) {
        //check from db
        $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE phone=?");
        $stmt->bind_param("s", $email_phone);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            //success
            if (checkPasswordForPhone($password, $email_phone, $conn)) {
                $row = $result->fetch_array();
//                $_SESSION['cdr'] = $row['id'];
                echo json_encode(array('report' => '0','uid'=>$row['id']));
            } else {
                echo json_encode(array('report' => '1'));
            }

        } else {
            //error
            echo json_encode(array('report' => '1'));
        }

    } else {
        //check from db
        $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE email=? ");
        $stmt->bind_param("s", $email_phone);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            //success
            if (checkPasswordForEmail($password, $email_phone, $conn)) {
                $row = $result->fetch_array();
//                $_SESSION['cdr'] = $row['id'];
                echo json_encode(array('report' => '0','uid'=>$row['id']));
            } else {
                echo json_encode(array('report' => '1'));
            }

        } else {
            //error
            echo json_encode(array('report' => '1'));
        }
    }

} else {
    //error
    echo json_encode(array('report' => '1'));
}

function checkPasswordForPhone($password, $phone, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE phone=?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    return password_verify($password, $row['password']);
}

function checkPasswordForEmail($password, $email, $conn)
{
    $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    return password_verify($password, $row['password']);
}