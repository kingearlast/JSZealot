<?php
	session_start();
	include_once('CallDatabase.php');
	@extract($_POST);
	$updateMemberInformation = "update member set password = $password ,nickName='$nickName',email=$email, phone =$phone where id =$_SESSION[id]";

	$_SESSION['nickName']= $nickName;
	if(!(mysql_query($updateMemberInformation)))
	{
		echo "애러";
	}
	//@header('location:../index.html');
	echo "<script>location.href='../index.html'</script>";
	exit;

?>