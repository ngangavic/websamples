<?php
require "../dbConnection.php";

if (isset($_POST['uid'])) {
    $stmt = $conn->prepare("SELECT * FROM tbl_details WHERE id=?");
    $stmt->bind_param("s", $_POST['uid']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();

    echo json_encode(array('report' => '0', 'email' => $row['email'], 'phone' => $row['phone']));

} else {
    //error
    echo json_encode(array('report' => '1'));
}