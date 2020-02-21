<?php
$dbName="test";
$uName="root";
$pWord="";
$host="localhost";

$conn=mysqli_connect($host,$uName,$pWord,$dbName);

if (!$conn){
    echo 'Database connection failed';
}
