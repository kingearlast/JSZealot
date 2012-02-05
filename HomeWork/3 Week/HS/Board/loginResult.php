<?
	session_start();
	@extract($_POST);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Board</title>
	</head>
	<body>
<?
	include_once('./connect.php');
	$query = "SELECT id, name FROM member WHERE"
			."(id='".$userID."') and (password='".$userPwd."')";
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
	
	/* Q. 페이지 이동 후 alert 하지말고 index페이지에서 alert 띄우는 방법은..? */
	if(!$data) {
		echo "<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.');
				history.go(-1);</script>";
	}
	else {
		session_register('logon');
		/* Q. 이런식으로 연관배열로 저장했을 때, 세션에서 꺼내서 쓸땐 연관배열로 접근 안되낭?? 
		$logon = array("id" => $data[id], "name" => $data[name]); */
		$logon = array($data[id], $data[name]);
		echo "<script>window.location='./boardList.php'</script>";
	}
?>
	</body>
</html>