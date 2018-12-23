<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="home.css">
<title>Messagerie</title>
<script type="text/javascript">
	$(document).ready(function(){
$('#chatText').keyup(function(e){
	if(e.keyCode==13){
		var chatText =$("#chatText").val();
		$.ajax({
			type:'POST',
			url:'insertMessage.php',
			data:{chatText:chatText},
			success:function(){
				$("#ChatWider").load('displayMessage.php');
				$("#chatText").val("");

			}
		}); 
	}
	});
setInterval(function(){
	$("#ChatWider").load("displayMessage.php");
},1500);
	$("#ChatWider").load("displayMessage.php");

});

</script>
</head>
<body style="background-color: #D3D3D3;">
</body>
<body>
<center><h2 style="color: teal; font-family: Impact, Charcoal, sans-serif; font-size: 30px;">Hello <span style="color: aqua;"><?php echo $_SESSION['userName']; echo'!';?></span></h2></center>
<br><br>
<div id="Chat">
	<div id='ChatWider' class="scrollbar"></div>
 <textarea id="chatText" name="chatText" placeholder="Type a message..."></textarea>
</div>
<script type="text/javascript">
	var textarea = document.getElementById('chatText');
	textarea.scrollTop = textarea.scrollHeight;
</script>
</body>
</html>