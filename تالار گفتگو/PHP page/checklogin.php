 <?php 
include "DB/DB_pass.php";
$db = "usertalargoftogo";


$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user = "SELECT * FROM user";
$usernameha = $conn->query($user);
$userha = mysqli_fetch_all($usernameha, MYSQLI_ASSOC);
mysqli_free_result($usernameha);
mysqli_close($conn);


?>