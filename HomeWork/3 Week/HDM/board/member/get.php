<table border="1" summary="회원가입 테이블">
	<tr>
		<th><label for="id">ID : </label></th>
		<td>
			<input id="id" name="id" type="text" size="15" maxlength="15" placeholder="ID" readonly="readonly" value="<?=$member->id?>"/>
		</td>
	</tr>
	<tr>
		<th><label for="password">PASSWORD : </label></th>
		<td><input id="password" name="password" type="password" size="15" maxlength="15" placeholder="PASSWORD" readonly="readonly" value="<?=$member->password?>"/></td>
	</tr>
	<tr>
		<th><label for="socialNumber">주민번호 : </label></th>
		<td><input id="socialNumber" name="socialNumber" type="text" size="15" maxlength="13" placeholder="-제외하고입력" readonly="readonly" value="<?=$member->socialNumber?>"/></td>
	</tr>
	<tr>
		<th><label for="name">이름 : </label></th>
		<td><input id="name" name="name" type="text" size="15" maxlength="15" placeholder="이름" readonly="readonly" value="<?=$member->name?>"/></td>
	</tr>
	<tr>
		<th><label for="telNumber">전화번호 : </label></th>
		<td><input id="telNumber" name="telNumber" type="text" size="15" maxlength="11" placeholder="-제외하고입력" readonly="readonly" value="<?=$member->telNumber?>"/></td>
	</tr>
	<tr>
		<th><label for="emailId">이메일 : </label></th>
		<td>
			<input id="emailId" name="emailId" type="text" size="10" maxlength="15" readonly="readonly" value="<?=$member->emailId?>"/>@
			<input id="emailDomain" name="emailDomain" type="text" size="10" maxlength="15" readonly="readonly" value="<?=$member->emailDomain?>"/>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a href="/board">확인 / 홈으로...</a></td>
	</tr>
</table>			
