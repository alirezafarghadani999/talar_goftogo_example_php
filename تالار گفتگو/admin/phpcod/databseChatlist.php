<?php
include "DB/DB_pass.php";
$db = "talargoftogo";


$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "SHOW TABLES FROM $db";
$result = $conn->query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    exit;
}



?>