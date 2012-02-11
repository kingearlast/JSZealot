<?
	session_start();
	$logon = $_SESSION['logon'];
	include_once('../common/connect.php');

	$query = "DELETE FROM member WHERE id ='".$logon[0]."'";
	$result = mysql_query($query);
	if($result) {
		session_unregister('logon');
?>
		<h1>Good Bye!</h1>
		<p>회원탈퇴 되셨습니다.</p>
		<a href="index.php">홈으로</a>
<?
	}
	else {
		echo '실패';
	}
?>
