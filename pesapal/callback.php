<?php
//database connection
$username = "";
$database = "";
$host = "localhost";
$password = "";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    echo 'Error! Database connection failed';
}

if (isset($_GET['pesapal_merchant_reference']) && isset($_GET['pesapal_transaction_tracking_id'])) {
    $reference = $_GET['pesapal_merchant_reference'];
    $pesapal_tracking_id = $_GET['pesapal_transaction_tracking_id'];

    $stmt = $conn->prepare("INSERT INTO tbl_subscription_trans(uid,reference,tracking,date,time)VALUES(?,?,?,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
    $stmt->bind_param("sss", $uid, $reference, $pesapal_tracking_id);
    if (!$stmt->execute()) {
        echo 'Error. Insert failed';
    } else {
        $stmt->close();
        echo 'Success!';
    }

} else {
    echo 'Error! Empty url';
}
