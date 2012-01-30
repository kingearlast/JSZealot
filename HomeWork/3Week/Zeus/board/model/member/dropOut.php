<?php
	session_start();
	include_once ('../../common/db.php');
	
	$id = $_SESSION['id'];
	$sql = "DELETE from member where id = '$id'";
	$result = mysql_query($sql);
	$_SESSION['nickname'] = "";
	
	header("location: ../../index.php");
?>