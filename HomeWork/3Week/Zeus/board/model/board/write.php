<?php
	session_start();
	include_once('../../common/db.php');
	
	$TITLE = $_POST['title'];
	$CONTENT = $_POST['content'];
	$WRITER = $_SESSION['id'];
	$NICK = $_SESSION['nickname'];
	
	$query = "SELECT * FROM board";
	 
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	$query = "INSERT INTO board(title, content, writer_id, name) VALUE('$TITLE','$CONTENT','$WRITER', '$NICK')";
	mysql_query($query);
	header('location: ../../view/board/boardList.php');
?>