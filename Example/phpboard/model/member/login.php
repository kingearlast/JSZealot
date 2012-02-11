<?php
	session_start();
	@extract($_POST);
    include_once '../../common/connect_db.php';
	include_once '../../common/util.php';
	
	if($id == "" || $pwd == "") {
		page_alert_and_redirect('입력 에러', '/phpboard');
	}
	
	$sql = "select count(*) from mb_inf where mb_inf_id = '$id' and mb_inf_pwd = '$pwd'";
	$result = mysql_query($sql, $connect);
	$resultSet = mysql_fetch_row($result);
	$rowNum = $resultSet[0];
	
	echo $resultSet[0];
	
	if($rowNum > 0) {
		$_SESSION['loginID'] = $id;
		page_redirect('/phpboard');
	}else {
		page_alert_and_redirect('아이디나 패스워드가 틀립니다.', '/phpboard');
	}
?>