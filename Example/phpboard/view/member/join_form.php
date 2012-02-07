<div class="memberJoinForm inner">
	<form action="model/member/join.php" method="post" id="memberJoinForm">
		<table border="1">
			<tr>
				<th>아이디</th>
				<td>
					<input type="text" size="15" maxlength="15" name="id" id="memberID" class="notNull" />					
					<input type="button" value="중복검사" id="IDCheckBtn" />
					<span class="message"></span>
				</td>
			</tr>
			<tr>
				<th>비밀번호</th>
				<td>
					<input type="password" size="15" maxlength="15" name="pwd" id="pwd" class="notNull" />
					<span class="message"></span>
				</td>
			</tr>
			<tr>
				<th>비밀번호 확인</th>
				<td>
					<input type="password" size="15" maxlength="15" name="pwdConfirm" id="pwdConfirm" class="notNull" />
					<span class="message"></span>
				</td>
			</tr>
			<tr>
				<th>이 름</th>
				<td>
					<input type="text" size="15" maxlength="15" name="name" id="name" class="notNull" />
					<span class="message"></span>
				</td>	
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" id="joinSubmit" value="가입" />
					<input type="reset" value="취소" />
				</td>
			</tr>
		</table>
	</form>
</div>	