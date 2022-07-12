<?php 
include "DB/DB_pass.php";
$dbuser = "usertalargoftogo";


$conn = new mysqli($servername, $username, $password, $dbuser);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$usname = $_GET['usname'];

$sql = "UPDATE `user` SET `pass`='This account has been blocked and the owner is not allowed to use this account directly' WHERE user=$usname";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

?>


<script>
    history.back();
</script>
