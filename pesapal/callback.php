<?php
$reference = null;
$pesapal_tracking_id = null;
if(isset($_GET['pesapal_merchant_reference']))
    $reference = $_GET['pesapal_merchant_reference'];
if(isset($_GET['pesapal_transaction_tracking_id']))
    $pesapal_tracking_id = $_GET['pesapal_transaction_tracking_id'];

$logFile = "Result.txt";
$write=$reference. ' ' .$pesapal_tracking_id;
// write the M-PESA Response to file
$log = fopen($logFile, "a");
fwrite($log, $write);
fclose($log);
//store $pesapal_tracking_id in your database against the order with orderid = $reference