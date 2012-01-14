<?php 
	session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>회원가입</title>
		<script language="JavaScript"></script>
	</head>
	<body>
		<h1 ><font face="휴먼엑스포" color="gray" >&nbsp;&nbsp;&nbsp;&nbsp;회      원    가    입</font></h1>
		Board (게시판)</b></font></h1>
					<?php 
		@session_start();
		if($_SESSION['id']!=NULL)
		{
			echo "<a href='okLogin.html'>홈으로</a>";
		}
		else{
			echo "<a href='Login.html'>홈으로</a>";
		}	
?>
		<form action="Change.php" method="post">
		<table border="1">
			<tr>
				<th colspan="2" align="center">기    본    정    보</th>
			</tr>
			<tr>
				<td>아이디 <font color="red">*</font></td>
				<td>
				<input type="text"  name="id" value="<?php echo $_SESSION['id'];?>" />
				</td>
			</tr>
			<tr>
				<td>비밀번호 <font color="red" >*</font></td>
				<td>
				<input type="text" name="password" value="<?php echo $_SESSION['password'];?>" />
				</td>
			</tr>
			<tr>
				<td>비밀번호 확인<font color="red">*</font></td>
				<td>
				<input type="text" name="passwordcheck" value="<?php echo $_SESSION['password_check'];?>"/>
				</td>
			</tr>
			<tr>
				<td>이름 <font color="red">*</font></td>
				<td>
				<input type="text" name="name"value="<?php echo $_SESSION['name'];?>" />
				</td>
			</tr>
			<tr>
				<td>주민등록번호 <font color="red">*</font></td>
				<td>
				<input type="text" name="social_security_number" id="social_security_number" value="<?php echo $_SESSION['social_security_number'];?>" />
				</td>
			</tr>
			<tr>
				<td>닉네임 <font color="red">*</font></td>
				<td>
				<input type="text" name="nickname" value="<?php echo $_SESSION['nickname'];?>" />
				</td>
			</tr>
			<tr>
				<td>이메일 주소 <font color="red">*</font></td>
				<td>
				<input type="text" name="email" value="<?php echo $_SESSION['email'];?>"  />
				</td>
			</tr>
			<tr>
				<td>전화번호 </td>
				<td>
				<input type="text" name="phone"value="<?php echo $_SESSION['phone'];?>"  />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
				<input type="submit"  value="등록" />
				<form action="okLogin.html" method="post"><input type="button" value="취소" /></form>
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>

