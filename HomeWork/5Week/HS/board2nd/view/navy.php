<?	
	if(session_is_registered('logon')) { // 로그인 된 상태
		echo '<div id="login" class="logOn">';
		if($logon[0] == "admin") {	// 관리자 로그인
			echo '<p>'.$logon[1].'님 환영합니다.</p>'.
				'<li><a href="#" id="memberInfor">회원 목록</a></li>
				<li><a href="model/logout.php">로그아웃</a></li>';
		}
		else {	// 회원 로그인
			echo '<p>'.$logon[1].'님 환영합니다.</p>'.
				'<li><a href="#" id="memberInfor">회원정보 수정</a></li>
				<li><a href="#" id="memberDrop">회원 탈퇴</a></li>
				<li><a href="model/logout.php">로그아웃</a></li>';
		}
		echo '</div>';
	}
	else { // 로그인 안된 상태
?>
		<div id="login">
			<form action="model/loginResult.php" method="post">
				<img src="resources/images/login_text.png" />
				<p><label for="loginID">아이디</label>
				<input type="text" name="userID" id="loginID" /></p>
				<label for="loginPwd">비밀번호</label>
				<input type="password" name="userPwd" id="loginPwd" />
				<input type="image" value="로그인" src="resources/images/login_butten.png" />
			</form>
			<a href="#" id="joinBtn">회원가입</a>
		</div>
<?
	}
?>


<div id="sideMenu">
	<ul>
		<li><a href="#" id="boardMenu">게시판</a></li>
	</ul>
</div>
