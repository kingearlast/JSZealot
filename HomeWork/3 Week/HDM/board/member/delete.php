<?
	@session_start();
	extract($_POST);
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	require_once($path."/db/database.php");
	
	$sql = "DELETE FROM MEMBER where id = '$id'";
			
	$result = mysql_query($sql);
	$count = mysql_affected_rows();
	
	if ( $count > 0 ){
		session_destroy();
		header("location:/board/index.php");
		exit;
	}else {
		echo require_once($path."/member/updateForm.php");	
	}
	
	
?>