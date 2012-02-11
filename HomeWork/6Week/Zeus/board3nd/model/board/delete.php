<?php
	include_once ('../../common/db.php');
	
	$seq = $_GET['seq'];
	
	$sql = "DELETE from board where seq = '$seq'";
	$result = mysql_query($sql);
	
	header("location: ../../view/board/boardList.php");
?>