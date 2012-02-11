<?php
    $host 		= "localhost";
	$user 		= "root";
	$password 	= "root";
	
	$connect = mysql_connect($host, $user, $password) or die("MySQL 서버 접속 에러");
	mysql_select_db('php_board', $connect) or die("DB 접속 에러");
?>