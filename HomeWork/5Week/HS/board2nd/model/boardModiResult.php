<?
	session_start();
	@extract($_REQUEST);
	
	include_once('../common/connect.php');
	$query = "UPDATE board SET title='".$title."', content='".$content."' WHERE seq=".$no;
	mysql_query($query);
?>
