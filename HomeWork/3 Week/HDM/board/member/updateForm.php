<?
	@session_start();
	$id = $_GET["id"];
			
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");

	$sql = "SELECT * FROM MEMBER where id = '$id'";
	$result = mysql_query($sql);
	
	$row = mysql_fetch_array($result);
	
	$member = setMember($row);
	
?>

<form action="/member/update.php" method="post" >
	<fieldset>
		<table border="1" summary="회원가입 테이블">
			<tr>
				<th><label for="id">ID : </label></th>
				<td>
					<input id="id" name="id" type="text" size="10" maxlength="15" placeholder="ID" readonly="readonly" value="<?= $member->id ?>" />
				</td>
			</tr>
			<tr>
				<th><label for="password">PASSWORD : </label></th>
				<td><input id="password" name="password" type="password" size="10" maxlength="15" placeholder="PASSWORD" value="<?= $member->password ?>" /></td>
			</tr>
			<tr>
				<th><label for="passwordCheck">PASSWORD 재입력 : </label></th>
				<td><input id="passwordCheck" name="passwordCheck" type="password" size="10" maxlength="15" placeholder="PASSWORD 재입력" /></td>
			</tr>
			<tr>
				<th><label for="socialNumber">주민번호 : </label></th>
				<td><input id="socialNumber" name="socialNumber" type="text" size="13" maxlength="13" placeholder="-제외하고입력" value="<?= $member->socialNumber ?>" /></td>
			</tr>
			<tr>
				<th><label for="name">이름 : </label></th>
				<td><input id="name" name="name" type="text" size="10" maxlength="15" placeholder="이름" value="<?= $member->name ?>" /></td>
			</tr>
			<tr>
				<th><label for="telNumber">전화번호 : </label></th>
				<td><input id="telNumber" name="telNumber" type="text" size="11" maxlength="11" placeholder="-제외하고입력" value="<?= $member->telNumber ?>" /></td>
			</tr>
			<tr>
				<th><label for="emailId">이메일 : </label></th>
				<td>
					<input id="emailId" name="emailId" type="text" size="10" maxlength="15" value="<?= $member->emailId ?>" />@
					<select id="emailDomain" name="emailDomain">
						<option value="naver.com" <?= ($member->emailDomain) == 'naver.com'? 'selected="selected"' : ''; ?>>naver.com</option>
						<option value="nate.com" <?= ($member->emailDomain) == 'nate.com'? 'selected="selected"' : ''; ?>>nate.com</option>
						<option value="hanmail.net" <?= ($member->emailDomain) == 'hanmail.net'? 'selected="selected"' : ''; ?>>hanmail.net</option>
						<option value="gmail.com" <?= ($member->emailDomain) == 'gmail.com'? 'selected="selected"' : ''; ?>>gmail.com</option>
						<option value="yahoo.co.kr" <?= ($member->emailDomain) == 'yahoo.co.kr'? 'selected="selected"' : ''; ?>>yahoo.co.kr</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="수정" /></td>
			</tr>
		</table>
	</fieldset>
</form>
<form action="/member/delete.php" method="post">
	<fieldset>
		<!-- ID 는 SESSION 값으로 조회 -->
		<input name="id" type="hidden" value="<?= $member->id ?>" />
		<input type="submit" value="회원탈퇴" />
	</fieldset>
</form>
