<?php
	session_start();
	include_once '../../common/util.php';
	
	$_SESSION['loginID'] = "";
	page_redirect('/phpboard');	  
?>