<?php 
	session_start();
	include_once('../../common/db.php');
	
	$id = $_SESSION['id'];
	
	$sql = "SELECT * from member where id = '$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$password = $row['password'];
	$name = $row['name'];
	$email = $row['email'];
?>