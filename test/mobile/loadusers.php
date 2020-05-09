<?php
require "../dbConnection.php";

$stmt = $conn->prepare("SELECT * FROM tbl_details ");
$stmt->execute();
$result = $stmt->get_result();
$products = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($products, array(
        "email" => $row['email'],
        "phone" => $row['phone'],
        "date" => $row['dateReg']));
}

//displaying the result in json format
echo json_encode($products);