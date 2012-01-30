<?
	session_start();
	session_destroy();
	header("location:/board/index.php");
?>