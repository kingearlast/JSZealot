<?
	session_start();
	@extract($_POST);
	$logon = $_SESSION['logon'];
	
	include_once('./connect.php');
	$query = "INSERT INTO board(writer_id, title, content, reg_date)
			VALUES('".$logon[0]."', '".$title."', '".$content."', UNIX_TIMESTAMP());";
	$result = mysql_query($query);
	mysql_close($connect);
	if($result) {
		header('Location: ./boardList.php');
	}
	else {
?>
<?
		echo '글쓰기 실패';
	}
?>