<?php 
	include_once('../../common/db.php');
	
	$seq = $_GET['seq'];
	
	$sql = "SELECT * from board where seq = '$seq'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$TITLE = $row['title'];
	$CONTENT = $row['content'];
	$WRITER = $row['writer_id'];
	$NAME = $row['name'];
	$DATE = $row['reg_date'];
	$COUNT = $row['read_count'];
?>