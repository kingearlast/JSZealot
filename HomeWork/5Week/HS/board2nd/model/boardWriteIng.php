<?
	session_start();
	@extract($_REQUEST);
	$logon = $_SESSION['logon'];
		
	include_once('../common/connect.php');
	$query = "INSERT INTO board(writer_id, title, content, reg_date)
			VALUES('".$logon[0]."', '".$title."', '".$content."', UNIX_TIMESTAMP());";
	$result = mysql_query($query);
	mysql_close($connect);
	if($result) {
		echo '글쓰기 성공';
	}
	else {
?>
<?
		echo '글쓰기 실패';
	}
?>