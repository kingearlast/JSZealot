<?php
	session_start();
	@extract($_POST);
    include_once '../../common/connect_db.php';
	
	if($id == "" || $pwd == "") {
		echo "<script>alert('입력 에러')</script>";
		die;
	}
	
	$sql = "select count(*) from member_info where id = '$id' and pwd = '$pwd'";
	$result = mysql_query($sql, $connect);
	$resultSet = mysql_fetch_row($result);
	$row_num = $resultSet[0];
	
	echo $resultSet[0];
	
	if($row_num > 0) {
		$_SESSION['loginID'] = $id;
		echo "<script>
			      alert('로그인 성공');
			      location.replace('/board');
			  </script>";
	}else {
		echo "<script>
			      alert('아이디나 패스워드가 틀립니다.');
			      //location.replace('/board');
			  </script>";
	}
?>