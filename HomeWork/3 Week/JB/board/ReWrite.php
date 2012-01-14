<?php
	session_start();
	@extract($_POST);
	ini_set("display_errors", "1");
	$link = mysql_connect('localhost', 'root', 'apmsetup');
	$db_selected = mysql_select_db('myboard', $link);
	
	$Rewrite_Board_information = 'update board set write_day = now(),content = '.$write.', title='.$title.' where seq ='.$_SESSION['seq'];
	mysql_query($Rewrite_Board_information);

	header('location:Board.html');

?>