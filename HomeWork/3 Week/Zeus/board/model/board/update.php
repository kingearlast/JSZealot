<?php
	include_once ('../../common/db.php');
	
	$upSeq = $_REQUEST['seq'];
	$upTitle = $_REQUEST['title'];
	$upContent = $_REQUEST['content'];	
	
	$upSql = "UPDATE board SET title = '$upTitle', content = '$upContent' where seq = '$upSeq'";
	$result = mysql_query($upSql);
	
	header("location: ../../index.php");
?>

