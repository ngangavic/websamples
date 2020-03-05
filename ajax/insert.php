<?php
require "../connection/connection.php";
    $data = array(
 ':name'  => $_POST["name"],
 ':email'  => $_POST["email"]
); 
	
   $query = "INSERT INTO tbl_ajax (name, email) VALUES (:name, :email)";

$statement = $pdo->prepare($query);

if($statement->execute($data))
{
 $output = array(
  'name' => $_POST['name'],
  'email'  => $_POST['email']
 );

 echo json_encode($output);
}
?>