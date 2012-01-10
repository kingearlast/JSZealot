<div>
	<form action="/member/get.php" method="post">
		<fieldset>
			<label for="id">ID : </label>
			<input id="id" name="id" type="text" size="10" maxlength="15" placeholder="ID" readonly="readonly" />
			<label for="password">PASSWORD : </label>
			<input id="password" name="password" type="password" size="10" maxlength="15" placeholder="PASSWORD" />
			<label for="passwordCheck">PASSWORD 재입력 : </label>
			<input id="passwordCheck" name="passwordCheck" type="password" size="10" maxlength="15" placeholder="PASSWORD 재입력" />
			<label for="socialNumber">주민번호 : </label>
			<input id="socialNumber" name="socialNumber" type="text" size="13" maxlength="13" placeholder="-제외하고입력" readonly="readonly"/>
			<label for="name">이름 : </label>
			<input id="name" name="name" type="text" size="10" maxlength="15" placeholder="이름" />
			<label for="telNumber">전화번호 : </label>
			<input id="telNumber" name="telNumber" type="text" size="11" maxlength="11" placeholder="-제외하고입력" />
			<label for="emailId">이메일 : </label> 
			<input id="emailId" name="emailId" type="text" size="10" maxlength="15" />@
			<input id="emailDomain" name="emailDomain" type="text" size="10" maxlength="15" readonly="readonly">
			<input id="emailDomainManually" type="checkbox" />
			<label for="emailDomainManually">직접작성</label>
			<select>
				<option>이메일선택</option>
				<option value="naver.com">naver.com</option>
				<option value="nate.com">nate.com</option>
				<option value="hanmail.net">hanmail.net</option>
				<option value="gmail.com">gmail.com</option>
			</select> 
			<input type="submit" value="수정" />
		</fieldset>
	</form>
	<form action="/" action="post">
		<fieldset>
			<input name="id" type="hidden" /><!-- input 밸류값 셋팅 필요 --> 
			<input type="submit" value="회원탈퇴" />
		</fieldset>
	</form>
</div>