<form action="/board/member/save.php" method="post">
	<fieldset>
		<table border="1" summary="회원가입 테이블">
			<tr>
				<th><label for="id">ID : </label></th>
				<td>
					<input id="id" name="id" type="text" size="15" maxlength="15" placeholder="ID" />
					<input type="button" id="idInputBtn" value="ID 입력" />
				</td>
			</tr>
			<tr>
				<th><label for="password">PASSWORD : </label></th>
				<td><input id="password" name="password" type="password" size="15" maxlength="15" placeholder="PASSWORD" /></td>
			</tr>
			<tr>
				<th><label for="passwordCheck">PASSWORD 재입력 : </label></th>
				<td><input id="passwordCheck" name="passwordCheck" type="password" size="15" maxlength="15" placeholder="PASSWORD 재입력" /></td>
			</tr>
			<tr>
				<th><label for="socialNumber">주민번호 : </label></th>
				<td><input id="socialNumber" name="socialNumber" type="text" size="15" maxlength="13" placeholder="-제외하고입력" /></td>
			</tr>
			<tr>
				<th><label for="name">이름 : </label></th>
				<td><input id="name" name="name" type="text" size="15" maxlength="15" placeholder="이름" /></td>
			</tr>
			<tr>
				<th><label for="telNumber">전화번호 : </label></th>
				<td><input id="telNumber" name="telNumber" type="text" size="15" maxlength="11" placeholder="-제외하고입력" /></td>
			</tr>
			<tr>
				<th><label for="emailId">이메일 : </label></th>
				<td>
					<input id="emailId" name="emailId" type="text" size="10" maxlength="15" />@
					<select id="emailDomain" name="emailDomain">
						<option value="naver.com">naver.com</option>
						<option value="nate.com">nate.com</option>
						<option value="hanmail.net">hanmail.net</option>
						<option value="gmail.com">gmail.com</option>
						<option value="yahoo.co.kr">yahoo.co.kr</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="회원가입" /></td>
			</tr>
		</table>
	</fieldset>
</form>
