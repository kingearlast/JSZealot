<?php
	session_start();
	if (!isset($_SESSION['is_login'])) {
		header('Location: ../../view/member/memberLogin.php');
	}
	else {
		header('Location: ../../index.php');
	}
?>