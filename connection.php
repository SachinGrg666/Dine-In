<?php
$servername = "sql200.infinityfree.com";
$username = "if0_35404264";
$password = "XnOUM8kVMGY1";
$database = "if0_35404264_test";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>