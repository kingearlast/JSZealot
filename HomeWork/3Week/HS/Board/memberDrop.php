<?
	session_start();
	$logon = $_SESSION['logon'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>회원탈퇴</title>
	</head>
	<body>
		<?
			include_once('./connect.php');
			$query = "DELETE FROM member WHERE id ='".$logon[0]."'";
			$result = mysql_query($query);
			if($result) {
				session_unregister('logon');
			}
		?>
		<h1>Good Bye!</h1>
		<p>회원탈퇴 되셨습니다.</p>
		<a href="index.php">홈으로</a>
	</body>
</html>
