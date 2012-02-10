<?php
	ini_set("display_errors", "1");
	
	$host = 'localhost';
	$username = 'root';
	$password = 'apmsetup';
	$dbname = 'myhomepage';
	
	$link = mysql_connect($host, $username, $password);
	$db_selected = mysql_select_db($dbname, $link);
?>