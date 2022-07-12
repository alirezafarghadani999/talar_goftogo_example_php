<?php
include "DB/DB_pass.php";
$dbuser = "usertalargoftogo";

$conn = new mysqli($servername, $username, $password, $dbuser);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$alluser = "SELECT * FROM `user`";
$showalluser = $conn->query($alluser);
$allusersshows = mysqli_fetch_all($showalluser, MYSQLI_ASSOC);
mysqli_free_result($showalluser);
mysqli_close($conn);




?>