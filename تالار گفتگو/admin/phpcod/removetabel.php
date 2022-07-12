<?php 
include "DB/DB_pass.php";
$dbgroup = "talargoftogo";


$conn = new mysqli($servername, $username, $password, $dbgroup);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$tbname = $_GET['tbname'];

$sql = "DROP TABLE `$tbname`;";

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