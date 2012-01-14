<?
	session_start();
	$path = $_SERVER[DOCUMENT_ROOT];
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	extract($_GET);
	$sql = "SELECT * FROM BOARD WHERE seq = '$seq'";
	
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$board = setBoard($row);
	
	echo require_once($path."/board/getForm.php");
	//header("location:/board/getForm.php");
	
	$visitCountSql = "UPDATE BOARD SET visit_count = visit_count + 1 where seq = '$seq'";
	mysql_query($visitCountSql);
	
?>