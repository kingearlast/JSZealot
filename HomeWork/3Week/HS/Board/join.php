<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="style/board.css" />
		<title>회원가입</title>
	</head>
	<body>
		<div id="wrap">
			<h1>회원가입</h1>
			<form method="post" action="./joinResult.php">
			<table id="join">
				<tr>
	        		<td colspan="2" class="line"></td>
	        	</tr>
				<tr>
					<th><label for="userID">아이디</label></th>
					<td class="right"><input type="text" name="userID" id="userID" /></td>
				</tr>
				<tr>
					<th><label for="userPwd">비밀번호</label></th>
					<td class="right"><input type="password" name="userPwd" id="userPwd" /></td>
				</tr>
				<tr>
					<th><label for="name">이름</label></th>
					<td class="right"><input type="text" name="name" id="name" /></td>
				</tr>
				<tr>
					<th><label for="phone">휴대폰번호</label></th>
					<td class="right"><input type="text" name="phone" id="phone" /></td>
				</tr>
				<tr>
					<th><label for="email">이메일</label></th>
					<td class="right"><input type="text" name="email" id="email" /></td>
				</tr>
				<tr>
	        		<td colspan="2" class="line2"></td>
	        	</tr>
				<tr>
					<td colspan="2" class="button">
						<input type="submit" value="입력" />
						<input type="reset" value="재입력" />
						<input type="button" value="취소" onClick="history.go(-1)" />
					</td>
				</tr>
			</table>
			</form>
		</div>
	</body>
</html>
