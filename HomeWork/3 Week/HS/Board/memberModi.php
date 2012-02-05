<?
	session_start();
	$logon = $_SESSION['logon'];
	@extract($_POST);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>회원정보수정</title>
    </head>
	<body>
	<?
		include_once('./connect.php');
		$query = "UPDATE member SET password='".$userPwd."', name='".$name."',
				tel_number='".$phone."', email='".$email."' WHERE id='".$logon[0]."'";
		$result = mysql_query($query);
		session_unregister('logon');
		
	?>
		<h1>회원정보가 수정 되셨습니다!</h1>
		<p>다시 로그인 해 주세요.</p>
		<p><a href="./index.php">로그인 하러 가기</a></p>
	</body>
</html>    
