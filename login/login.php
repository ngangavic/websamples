<?php

require "../connection/connection.php";

//get data from form and assign it to variables
$email = $_POST['email'];
$password = $_POST['password'];

//ensure the button is clicked
if (isset($_POST['login'])) {

    //ensure the variables have data
    if (isset($email) && isset($password)) {
        //execute login
        verifyUser($conn, $email, $password);
    }
}

function verifyUser($conn, $email, $password)
{
    $stmt = $conn->prepare("SELECT * FROM tbl_register WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->num_rows;
    if ($count > 0) {
        //check password
//        while($row = $result = fetch_array()){
        $row = $result->fetch_array();
        $dbPassword = $row['password'];
        if (password_verify($password, $dbPassword)) {
            //success login
            header("location:index.php?info=success");
        } else {
            //password error
            header("location:index.php?info=error");
        }
//        }
    } else {
        //error
        header("location:index.php?info=error");
    }
}


?>