<?php
require "../connection/connection.php";

$stmt = $conn->prepare("SELECT * FROM tbl_students");
$stmt->execute();
$result = $stmt->get_result();
$main_array = array();
$sub_array = array();

while ($row = $result->fetch_array()) {
    array_push($sub_array, array(
        "name" => $row['name'],
        "class" => $row['class'],
        "age" => $row['age'],
        "home-town" => $row['home_town'],
        "parents-no" => $row['parent_no']
    ));
}
$main_array["data"] = $sub_array;
echo json_encode($main_array);
