<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="style/board.css" />
		<title>Welcome</title>
	</head>
	<body>
		<div id="wrap">
			<div id="login">
				<form action="loginResult.php" method="post">
					<img src="images/login_text.png" />
					<p><label for="userID">아이디</label>
					<input type="text" name="userID" id="userID" /></p>
					<label for="userPwd">비밀번호</label>
					<input type="password" name="userPwd" id="userPwd" />
					<input type="image" value="로그인" src="images/login_butten.png" />
				</form>
				<a href="join.php">회원가입</a>
			</div>
		</div>
	</body>
</html>
