<?php

include "DB/DB_pass.php";
$db = "talargoftogo";


$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$chats = "SELECT * FROM `".$_GET["Namechatroom"]."`";
$readchat = $conn->query($chats);
$chatsread = mysqli_fetch_all($readchat, MYSQLI_ASSOC);
mysqli_free_result($readchat);
mysqli_close($conn);




?>