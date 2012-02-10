<?
	session_start();
	@extract($_GET);
	$logon = $_SESSION['logon'];
	include_once('../common/connect.php');

	$query = "DELETE FROM board WHERE seq=".$no;
	$result = mysql_query($query);
	
?>