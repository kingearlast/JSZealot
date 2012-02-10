<?
	session_start();
	$logon = $_SESSION['logon'];
	include_once('../common/connect.php');
	
	if($logon[0] == "admin") {
		// 관리자면 회원 리스트 보여주기
		$query = "SELECT id, name, tel_number, email FROM member WHERE id!='admin'";
		$result = mysql_query($query);
?>
	<h1>회원목록</h1>
	<table id="boardList">
		<tr>
    		<td colspan="5" class="line"></td>
    	</tr>
		<tr>
			<th class="no">No.</th>
			<th>아이디</th>
			<th>이름</th>
			<th>전화번호</th>
			<th>이메일</th>
		</tr>
<?
		$count = 0;
		while($data = mysql_fetch_array($result)){	
			echo '
			<tr>
				<td>'.++$count.'</td>
				<td>'.$data[id].'</td>
				<td>'.$data[name].'</td>
				<td>'.$data[tel_number].'</td>
				<td>'.$data[email].'</td>
			</tr>';
		}
?>
		<tr>
    		<td colspan="5" class="line2"></td>
    	</tr>
	</table>
	
<?
	}
	else {
		// 회원이면 회원정보 수정 화면 보여주기
		$query = "SELECT id, name, tel_number, email FROM member WHERE id ='".$logon[0]."'";
		$result = mysql_query($query);
		$data = mysql_fetch_array($result);		
?>
	<h1>회원 정보 수정</h1>
	<form method="post" action="model/memberModi.php">
	<table id="join">
		<tr>
			<th><label for="userID">아이디</label></th>
			<td class="printID"><?echo $data[id];?></td>
		</tr>
		<tr>
			<th><label for="userPwd">비밀번호</label></th>
			<td><input type="password" name="userPwd" id="userPwd" /></td>
		</tr>
		<tr>
			<th><label for="name">이름</label></th>
			<td><input type="text" name="name" id="name" value="<?echo $data[name];?>" /></td>
		</tr>
		<tr>
			<th><label for="phone">휴대폰번호</label></th>
			<td><input type="text" name="phone" id="phone" value="<?echo $data[tel_number];?>" /></td>
		</tr>
		<tr>
			<th><label for="email">이메일</label></th>
			<td><input type="text" name="email" id="email" value="<?echo $data[email];?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="button">
				<input type="submit" value="수정" />
				<input type="reset" value="재입력" />
				<input type="button" value="취소" onClick="location='index.php'" />
			</td>
		</tr>
	</table>
	</form>
<?
	}
?>
