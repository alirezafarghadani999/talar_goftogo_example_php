<?php
include "DB/DB_pass.php";
$dbuser = "usertalargoftogo";

$conn = new mysqli($servername, $username, $password, $dbuser);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$alluseradmin = "SELECT * FROM `admin`";
$showalluseradmin = $conn->query($alluseradmin);
$allusersadminshows = mysqli_fetch_all($showalluseradmin, MYSQLI_ASSOC);
mysqli_free_result($showalluseradmin);
mysqli_close($conn);




?>