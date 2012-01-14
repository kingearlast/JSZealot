<?
	session_start();
	
	$path = $_SERVER[DOCUMENT_ROOT];
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	extract($_POST);
	
	$sql = "UPDATE BOARD SET title = '$title', content = '$content' where seq = '$seq'";
	$result = mysql_query($sql);
	//$count = mysql_affected_rows();
	
	//if ( $count > 0 ){
	$sql = "SELECT * FROM BOARD WHERE seq = '$seq'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$board = setBoard($row);
	echo require_once($path."/board/getForm.php");
	//}
?>