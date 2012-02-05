<?php
    $connect = mysql_connect('localhost', 'hyo', 'sun123');
	$db_status = mysql_select_db('myboard', $connect);
	//mysql_query("set names utf8;");
	if(!$db_status) {
		die('접속 실패 : '.mysql_error());
	}
?>