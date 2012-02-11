<?php
	session_start();
	include_once ('../../common/db.php');
	
	$id = $_SESSION['id'];
	$upPassword = $_REQUEST['password'];
	$upName = $_REQUEST['name'];
	$upEmail = $_REQUEST['email'];
	
	$upSql = "UPDATE member SET password = '$upPassword', name = '$upName', email = '$upEmail' where id = '$id'";
	$result = mysql_query($upSql);
	
	header("location: ../../view/member/memberInfoView.php");
?>

