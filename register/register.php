<?php

require "../connection/connection.php";

//get data from form and assign it to variables.

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
//allow execution only when button is clicked
if(isset($_POST['register'])){

    //check if the variables have data
    if(isset($name)&&isset($email)&&isset($password)){

        //check if user already exists
        $stmt=$conn->prepare("SELECT * FROM tbl_register WHERE email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->num_rows;
        if($row>0){
            //display error
        header("location:index.php?info=exists");
        }else{
        //insert data to database
        $stmt=$conn->prepare("INSERT INTO tbl_register(name,email,password,date)VALUES(?,?,?,CURRENT_TIMESTAMP)");
        $stmt->bind_param("sss",$name,$email,$password);
        if(!$stmt->execute()){
           header("location:index.php?info=empty");
        }
          header("location:index.php?info=success");
    }

    }else{
        //display error if there is no data.
        header("location: index.php?error=empty");
    }

}

?>