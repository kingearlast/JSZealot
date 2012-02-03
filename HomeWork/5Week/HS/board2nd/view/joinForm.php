<h1>회원가입</h1>
<form method="post" action="model/joinResult.php" id="joinForm">
<table id="join">
	<tr>
		<td colspan="2" class="line"></td>
	</tr>
	<tr>
		<th><label for="userID">아이디</label></th>
		<td class="right">
			<input type="text" name="userID" id="userID" />
			<input type="button" value="중복확인" id="checkID" />
			<span id="confirm"></span>
		</td>
	</tr>
	<tr>
		<th><label for="userPwd">비밀번호</label></th>
		<td class="right">
			<input type="password" name="userPwd" id="userPwd" />
			<span></span>
		</td>
	</tr>
	<tr>
		<th><label for="name">이름</label></th>
		<td class="right">
			<input type="text" name="name" id="name" />
			<span></span>
		</td>
	</tr>
	<tr>
		<th><label for="phone">휴대폰번호</label></th>
		<td class="right">
			<input type="text" name="phone" id="phone" />
			<span></span>
		</td>
	</tr>
	<tr>
		<th><label for="email">이메일</label></th>
		<td class="right">
			<input type="text" name="email" id="email" />
			<span></span>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="line2"></td>
	</tr>
	<tr>
		<td colspan="2" class="button">
			<input type="submit" value="가입" />
			<input type="reset" value="재입력" />
			<input type="button" value="취소" onClick="location='index.php'" />
		</td>
	</tr>
</table>
</form>
