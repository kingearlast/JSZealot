<?php
	session_start();
	
	if(isset($_SESSION['loginID'])) {
		$loginID = $_SESSION['loginID'];
	}else {
		$loginID = "";
	}
?>