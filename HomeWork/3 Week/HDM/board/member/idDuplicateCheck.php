<?
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	require_once($path."/db/database.php");
	$checkId = $_GET["id"];
	// ID 중복 검사
	$sql = "SELECT COUNT(*) FROM MEMBER where id = '$checkId'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$count = $row[0];
	
	if ( $count > 0 ){
		echo false;	
	}else if ( $count < 1){
		echo true;
	}
	
?>