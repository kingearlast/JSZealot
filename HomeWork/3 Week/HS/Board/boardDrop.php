<?
	session_start();
	@extract($_GET);
	
	include_once('./connect.php');
	$query = "DELETE FROM board WHERE seq=".$no;
	$result = mysql_query($query);
	header('Location: ./boardList.php');
?>
