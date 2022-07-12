<?php 

include "DB/DB_pass.php";
$dbuser = "usertalargoftogo";
$runcommand = true;

$conn = new mysqli($servername, $username, $password, $dbuser);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];


$userss = "SELECT * FROM `user`";
$readuserforcheck = $conn->query($userss);
$usercheked = mysqli_fetch_all($readuserforcheck, MYSQLI_ASSOC);

foreach($usercheked as $uc){
if($uc['user']==$username){
$runcommand= false;
}
}

if ($runcommand & $username !="" & $password !="" ){
$sql = "INSERT INTO `user` (`user`, `pass`) VALUES ('$username', '$password');";

if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error creating table: " . $conn->error;
  }
echo "Account created $username";

}else{
echo "Your account could not be created because of similar usernames or empty entries";

}


$conn->close();
?>

<script>
    setTimeout(() =>{
        window.location.href = '/index.php';

    },5000);
</script>

