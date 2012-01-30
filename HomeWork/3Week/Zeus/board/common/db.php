<?php
	ini_set("display_errors", "1");
	
	$host = 'localhost';
	$username = 'root';
	$password = 'apmsetup';
	$dbname = 'zeus';
	
	$link = mysql_connect($host, $username, $password);/*
	if(!$link) {
		die('접속실패 : '. mysql_error());
	}else{
		echo"접속성공<br />";
	}*/
	$db_selected = mysql_select_db($dbname, $link);/*
	if(!$db_selected){
		die('Can\'t use foo : '.mysql_error());
	}else{
		echo"DB선택성공<br />";
	}*/
?>