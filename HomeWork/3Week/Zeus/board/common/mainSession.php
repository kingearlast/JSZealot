<?php
	session_start();
	
	if (!isset($_SESSION['is_login'])) {
		//header('Location: ../../view/member/memberLogin.html');
		//header('Location: ../../index.php');
		$_SESSION['nickname'] ="";
	}/*
	else {
		header('Location: ../../index.php');
	}*/
?>
