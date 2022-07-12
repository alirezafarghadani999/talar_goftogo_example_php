<?php
include "DB/DB_pass.php";
$dbname = "talargoftogo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nc = $_GET["nc"];
$snd = $_GET["snd"];
$msg = $_GET['msgtxt'];

$sql = "INSERT INTO `$nc` (`id`,`sender`, `Text`)
VALUES (NULL,'$snd', '$msg')";

if ($msg != "" & $snd != ""){

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
?>


<script>

    window.history.back();
</script>