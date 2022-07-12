<?php

$logintrue = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbuser = "usertalargoftogo";
$dbgroup = "talargoftogo";

include "phpcod/givusers.php";
include "phpcod/giveadminuser.php";


$conn = new mysqli($servername, $username, $password, $dbuser);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$useradmin = "SELECT * FROM admin";
$admus = $conn->query($useradmin);
$ADUS = mysqli_fetch_all($admus, MYSQLI_ASSOC);
mysqli_free_result($admus);
mysqli_close($conn);




function backtopage()
{
    $url = '/admin';
    header("Location: $url");
}

if ($_POST['ADPASS'] . $_POST['ADUSE'] == "") {
    echo "ERROR : PASSWORD AND USERNAME IS NULL";
    backtopage();
} elseif ($_POST['ADUSE'] == "") {
    echo "ERROR :USERNAME IS NULL";
    backtopage();
} elseif ($_POST['ADPASS'] == "") {
    echo "ERROR : PASSWORD IS NULL";
    backtopage();
} elseif ($_POST['ADPASS'] . $_POST['ADUSE'] != "") {

    foreach ($ADUS as $userchek) {
        if ($_POST['ADPASS'] . $_POST['ADUSE'] == $userchek['user'] . $userchek['pass']) {
            $logintrue = true;
        }
    }
    if (!$logintrue) {
        backtopage();
    }
}

include "phpcod/databseChatlist.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssfile.css">
    <title>Panel Admin</title>
</head>

<body>

    <label for="">user login : <?php echo $_POST['ADUSE'] ?></label>

    <div id="makegroup">
        <label for="">Make talar Goftogo</label>
        <form action="phpcod/createtable.php" method="POST" autocomplete="off">
            <br>
            <label for="">Name Talar Goftogo</label>
            <input type="text" name="nametalar">
            <br>
            <button onclick="setTimeout(() => {location.reload()}, 1000);" id="okbtn">Create</button>
        </form>
    </div>

    <div id="makegroup">
        <label for="">List talar Goftogo</label>
        <div id="pageshower" style="width: 80%; height:80% ; overflow: scroll;
    overflow-x: hidden; ">

            <br>
            <?php while ($row = mysqli_fetch_row($result)) {  ?>
                <div id="listchat">
                    <label><?php echo $row[0] ?></label>
                    <a style="color: white;   text-decoration: none;" href="phpcod/removetabel.php?tbname=<?php echo $row[0] ?>" onclick="setTimeout(() => {location.reload()}, 1000);">
                        <button id="dellist">Remove</buttons></a>
                    <br>
                </div>
            <?php } ?>

            <br>
        </div>
    </div>
    <div id="makegroup">
        <label for="">List User</label>
        <div id="pageshower" style="width: 80%; height:80% ; overflow: scroll;
    overflow-x: hidden; ">

            <br>
            <?php foreach($allusersshows as $aus) {  ?>
                <div id="listchat">
                    <label>User : <?php echo $aus['user'] ?></label>
                    <br>
                    <?php if ($aus['pass']=="This account has been blocked and the owner is not allowed to use this account directly"){ ?>
                        <label style="color: red;"><?php echo $aus['pass'] ?></label>
                        <?php }else{ ?>
                    <label>Password : <?php echo $aus['pass'] ?></label>
                    <a style="color: white;   text-decoration: none;" href="phpcod/banuser.php?usname='<?php echo $aus['user'] ?>'" onclick="setTimeout(() => {location.reload()}, 1000);">
                        <button id="dellist" style="width: 100px;">Ban User</buttons></a>
                    <?php } ?>

                    
                    <br>
                </div>
            <?php } ?>

            <br>
        </div>
    </div>
    
    <div id="makegroup">
    <label for="">List Admin User</label>
        <div id="pageshower" style="width: 80%; height:80% ; overflow: scroll;
    overflow-x: hidden; display:inline-block;">

            <br>
            <?php foreach($allusersadminshows as $auas) {  ?>
                <div id="listchat">
                    <label>User : <?php echo $auas['user'] ?></label>
                    <br>
                    <label>Password : <?php echo $auas['pass'] ?></label>

                    <a style="color: white;   text-decoration: none;" href="phpcod/disableadmin.php?useradmin='<?php echo $auas['user'] ?>'" onclick="setTimeout(() => {location.reload()}, 1000);">
                        <button id="dellist" style="width: 100px;">Disable User</buttons></a>
                    <br>
                </div>
            <?php } ?>

            <br>
        </div>



    </div>

   
    <div id="makegroup">
        <label for="">Add Admin User</label>
        <form action="phpcod/addadmin.php" method="POST" autocomplete="off">
            <br>
            <label for="">Username Admin</label>
            <input type="text" name="usernamead">
            <label for="">Password Admin</label>
            <br>
            <input type="text" name="passwordad">

            <br>
            <button onclick="setTimeout(() => {location.reload()}, 1000);" id="okbtn">Add</button>
        </form>
    </div>

</body>

</html>