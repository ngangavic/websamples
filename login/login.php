<?php

require "../connection/connection.php";

//get data from form and assign it to variables
$email=$_POST['email'];
$password=$_POST['password'];

//ensure the button is clicked
if(isset($_POST['login'])){
    
    //ensure the variables have data
    if(isset($email)&&isset($password)){
        //execute login
        $stmt=$conn->prepare("SELECT * FROM tbl_register WHERE email=? AND password=?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->num_rows;
        if($row>0){
            //login successful
            header("location:index.php?info=success");
        }else{
            //login error
            header("location:index.php?info=error");
        }

    }else{
        //return error
    }


}



?>