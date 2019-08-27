<?php
$database="websample";
$username="root";
$password="";
$host="localhost";

//mysqli connection 
$conn=mysqli_connect($host,$username,$password,$database);

if(!$conn){
 echo 'Connection error!!!';
}

//PDO connection for use in AJAX
$pdo = new PDO("mysql:host=localhost;dbname=websample", "root", "");
?>
