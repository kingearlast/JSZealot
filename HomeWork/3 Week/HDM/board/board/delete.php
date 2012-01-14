<?
	$path = $_SERVER[DOCUMENT_ROOT];
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	extract($_GET);
	
	$sql = "DELETE FROM BOARD WHERE seq = '$seq'"; 
	$result = mysql_query($sql);
	$count = mysql_affected_rows();
	
	if ( $count > 0 ){
		header("location:/index.php");
	}else{
		header("location:/board/get.php?seq=$seq");
	}
?>