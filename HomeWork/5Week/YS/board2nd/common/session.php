<?php
session_start();

if(isset($_SESSION['login_ID'])) {
	$loginID = $_SESSION['login_ID'];
}else {
	$loginID = "";
}
?>