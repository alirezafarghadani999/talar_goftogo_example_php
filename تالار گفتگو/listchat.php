<?php include "PHP page/databseChatlist.php"; ?>
<?php include "PHP page/checklogin.php"; ?>


<?PHP

$usern = $_POST['Usernames'];
$passw = $_POST['Passwords'];
$logined = false;

foreach ($userha as $us) {
    if ($us['user'] . $us['pass'] == $usern . $passw) {
        $logined = true;
    }
}
if (!$logined) {

    ob_start(); 

    $url = 'index.php'; 

    while (ob_get_status()) {
        ob_end_clean();
    }

    header("Location: $url");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css pages/cssindex.css">
    <link rel="stylesheet" href="Css pages/loginbutton.css">
    <title>LIST GROUP | لیست تالار گفتگو ها</title>
</head>

<body>


    <div id="page">

        <div id="Selectchat">
            <div id="listchat">

                <center>
                    <?php while ($row = mysqli_fetch_row($result)) { ?>

                        <a href="chatroom.php?Namechatroom=<?php echo $row[0].'&MYUS='.$usern; ?>">
                            <span id="listview">
                                <label id="labellistview"><?php echo "$row[0]"; ?></label>
                                <span id="shapelistview"></span>
                            </span>
                        </a>
                    <?php } ?>
                </center>
            </div>
        </div>
    </div>

    <script src="Javascript/indexjavascript.js"></script>


</body>

</html>