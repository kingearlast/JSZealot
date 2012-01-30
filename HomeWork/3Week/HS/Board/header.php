<div id="header">
<?
	if($logon[0] == "admin") {	// 관리자 로그인
		echo $logon[1].'님 환영합니다. '.
			'<a href="memberInfor.php">회원 목록</a>
			<a href="./logout.php">로그아웃</a>	';
	}
	else {	// 회원 로그인
		echo $logon[1].'님 환영합니다. '.
			'<a href="memberInfor.php">회원 정보 수정</a>
			<a href="memberDrop.php">회원 탈퇴</a>
			<a href="./logout.php">로그아웃</a>';
	}
?>
</div>