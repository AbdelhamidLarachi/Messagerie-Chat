<?php

session_start();

include 'classes.php';

if(isset($_POST['chatText'])){
	$chat = new chat();
	$chat->setchatUserID($_SESSION['userID']);
	$chat->setchatText($_POST['chatText']);
	$chat->insertMessage();
}
?>