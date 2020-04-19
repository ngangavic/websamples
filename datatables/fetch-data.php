<?php
require "../connection/connection.php";

$stmt = $conn->prepare("SELECT * FROM tbl_students");
$stmt->execute();
$result = $stmt->get_result();
$main_array = array();
$sub_array = array();
$recordsTotal = $result->num_rows;
$recordsFiltered = $result->num_rows;

while ($row = $result->fetch_array()) {
    array_push($sub_array, array(
        "name" => $row['name'],
        "class" => $row['class'],
        "age" => $row['age'],
        "home-town" => $row['home_town'],
        "parents-no" => $row['parent_no'],
        "id" => $row['id']
    ));
}

$main_array["recordsTotal"] = $recordsTotal;
$main_array["recordsFiltered"] = $recordsFiltered;
$main_array["data"] = $sub_array;
echo json_encode($main_array);
