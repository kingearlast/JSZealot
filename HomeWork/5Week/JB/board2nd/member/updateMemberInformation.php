<?php
	session_start();
	include_once('CallDatabase.php');
	@extract($_POST);
	$updateMemberInformation = "update member set password = $password ,password_check =$passwordCheck ,nic_name='$nickName',email=$email, phone =$phone where id =$_SESSION[id]";
	$_SESSION['password']= $password;
	$_SESSION['nickName']= $nickName;
	$_SESSION['email']= $email;
	$_SESSION['phone']=$phone;
	$_SESSION['passwordCheck']=$passwordCheck;
	if(!(mysql_query($updateMemberInformation)))
	{
		echo "애러";
	}
	@header('location:../Index2.html');

?>