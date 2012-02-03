<?php
	session_start();
	@extract($_POST);
	include_once('../member/CallDatabase.php');
	$Rewrite_Board_information = "update board set write_day = now(),content = '$write', title='$title' where seq =$_SESSION[seq]";
	mysql_query($Rewrite_Board_information);
	header('location:Board.html');
?>