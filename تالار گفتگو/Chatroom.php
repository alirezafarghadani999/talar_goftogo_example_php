<?php include "PHP page/givechat.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Css pages/cssindex.css">
    <link rel="stylesheet" href="/Css pages/loginbutton.css">
    <title><?php echo $_GET['Namechatroom'];?></title>
</head>
<body>

<div class="upchat">
  <label><?php echo $_GET['Namechatroom'];?></label>
  <label onclick="  window.history.back();">CLOSE</label>
</div>

    

<div id="page" style="min-height: 80%; font-family: fontfarsi; ">


<div class="chats" >
<?php include "PHP page/chats.php"; ?>
</div>
</div>

<div class="chatbar">
<?php

$nc = $_GET['Namechatroom'];
$snd = $_GET['MYUS'];

?>
<form action="PHP page/sendmsg.php" method="GET" autocomplete="off" onkeydown="return event.key != 'Enter';">
<input name="msgtxt" class="inputch" type="text" id="txt_1" onkeyup=' input=this; saveValue(input);'/>
<input type = "hidden" name = "nc" value = "<?php echo $nc ?>" />
<input type = "hidden" name = "snd" value = "<?php echo $snd ?>" />

<button class="btnchat" onclick="aftersend()"></button>

</form>
</div>

  <script src="/Javascript/indexjavascript.js"></script>  
  
  <script>

 var page = document.getElementById("page");
  page.style.width = "95vw";
  page.style.height = "auto";
  page.style.marginTop = "10vh";


  </script>


</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">


Returndata = true;

const selc =  document.getElementById("txt_1");
    selc.select();

if(Returndata){
    document.getElementById("txt_1").value = getSavedValue("txt_1");   

        function saveValue(e){
            var id = e.id;   
            var val = e.value; 
            localStorage.setItem(id, val);
        }

        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
        }
}


function aftersend(){


  Returndata = false;
  setTimeout(() => { 
  location.reload();
    document.getElementById("txt_1").value = ""
  },100);
  localStorage.removeItem('txt_1');
}



$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
</script>


<style>

  .chaty{

    background-color: #7D9D9C;
    color:white;
    font-family: Arial, Helvetica, sans-serif;
    margin: 10px;
    border-radius: 10px;
    width: 40%;
    padding-top: 1vh;
    padding-bottom: 0.3vh;
  }

  .chatm{

background-color: #576F72;
color:white;
font-family: Arial, Helvetica, sans-serif;
margin: 10px;
border-radius: 10px;
width: 40%;
padding-top: 1vh;
padding-bottom: 0.3vh;
right: 0;
margin-left: auto;
margin-right: 10px;

}


  .chaty label{
    font-weight: bold;
    margin-left: 1vh;
  }

  .chatm label{
    font-weight: bold;
    margin-left: 1vh;
  }

  .chatyshape{
    width: 0;
      height: 0;
      border: 1vh solid transparent;
      border-bottom: 1vh solid white;
      position: relative;
      top: -0.5vh;
      display: inline-block;
  }
  .chatyshape:after{
    content: '';
      position: absolute;
      left: -1vh;
      top: 0.9vh;
      width: 0;
      height: 0;
      border: 1vh solid transparent;
      border-top: 1vh solid white;
  }

  .chatmshape{
    width: 0;
      height: 0;
      border: 1vh solid transparent;
      border-bottom: 1vh solid white;
      position: relative;
      top: -0.5vh;
      display: inline-block;
  }
  .chatmshape:after{
    content: '';
      position: absolute;
      left: -1vh;
      top: 0.9vh;
      width: 0;
      height: 0;
      border: 1vh solid transparent;
      border-top: 1vh solid white;
  }


  .chaty p{
    margin-top: 0.7vh;
    margin-right: 2vh;
    text-align: right;

  }
  
  .chatm p{
    margin-top: 0.7vh;
    margin-right: 2vh;
    text-align: right;

  }

  .chats{
    overflow:scroll;
    height: 80%;
    overflow-x: hidden;
    margin-top: 12vh;
    margin-bottom: 7vh;
  }

  .upchat{
    width: 100%;
    height: 6vh;
    background-color: #2C3639;
    position: fixed;
    z-index: 12;

  }

  .chatbar{
    position: fixed;
    width: 100%;
    height: 5vh;
    background-color: #2C3639;
    bottom: 0;
  }

  .upchat label:nth-child(1){
    position: absolute;
    top: 50%;
    transform: translate(0,-50%);
    left: 5vw;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    
    
  }

  .upchat label:nth-child(2){
    position: absolute;
    top: 50%;
    transform: translate(0,-50%);
    right: 5vw;
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    
    
  }

  .inputch{
    width: 90vw;
    height: 70%;
    top: 50%;
    position: absolute;
    transform: translate(0,-50%);
    margin-left:1%;
    background-color: #576F72;
    border: none;
    border-radius: 20px;
    resize: none;
    outline: none;
    padding-left: 20px;
    color: white;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    display: inline;
    
  }

  .btnchat{
    position: absolute;
    right: 0;
    background-color: #576F72;

    border: none;
    border-radius: 50%;
    width: 6vw;
    height: 6vw;
    display: inline;
    top: 50%;
    transform: translate(0,-50%);
    margin-right: 20px;
  }

 

</style>

</html>