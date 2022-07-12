
<?php 

$lastmsg = 0;

foreach($chatsread as $givemsg){ 
  
  if($givemsg['sender']!=$_GET['MYUS']){ ?>

<div class="chaty">
<label><?php echo $givemsg['sender']; ?> <div class="chatyshape"></div></label>
<br>
<p><?php echo $givemsg['Text']; ?></p>
</div>

<?php }else{ ?>


<div class="chatm">
<label><?php echo $givemsg['sender']; ?> <div class="chatmshape"></div></label>
<br>
<p><?php echo $givemsg['Text']; ?></p>



</div>


<?php }} ?>

<script>
    var limit = Math.max( document.body.scrollHeight, document.body.offsetHeight, 
                   document.documentElement.clientHeight, document.documentElement.scrollHeight, document.documentElement.offsetHeight );
    window.scroll({
  top: limit,
  left: 0,
  behavior: 'smooth'
});

setTimeout(() => { 

  if( document.getElementById("txt_1").value !=""){
    Returndata = true;
  }},5999);
    setTimeout(() => { location.reload() },6000);
    

</script>

<script type="text/javascript">
$(document).ready(function() {

if ( $.cookie("scroll") !== null ) {
    $(document).scrollTop( $.cookie("scroll") );
}

$('#submit').on("click", function() {

    $.cookie("scroll", $(document).scrollTop() );

});

});

</script>

