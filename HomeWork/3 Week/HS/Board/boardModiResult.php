<?
	session_start();
	@extract($_POST);
	@extract($_GET);
	
	include_once('./connect.php');
	$query = "UPDATE board SET title='".$title."', content='".$content."' WHERE seq=".$no;
	mysql_query($query);
	header('Location: ./boardRead.php?no='.$no);
?>
