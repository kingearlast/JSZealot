<?php
	session_start();
	@extract($_POST);
	
    include_once '../../common/connect_db.php';
	include_once '../../common/util.php';
	
	if($id == "" || $pwd == "" || $name == "") {
		page_alert_and_redirect('입력 에러', '/phpboard');
	}
	
	$sql = "select count(*) from mb_inf where mb_inf_id = '$id'";
	$result = mysql_query($sql, $connect);
	$resultSet = mysql_fetch_row($result);
	$rowNum = $resultSet[0];
	
	if($rowNum > 0) {
		page_alert_and_redirect('중복된 ID 가 있습니다.', '/phpboard');
	}
	
	$sql = "insert into mb_inf(mb_inf_id, mb_inf_nm, mb_inf_pwd)";
	$sql .= " values('$id', '$name', '$pwd')";
	$result = mysql_query($sql, $connect);
	$totalRow = mysql_affected_rows();
	mysql_close();
	
	if($totalRow > 0) {
		$_SESSION['loginID'] = $id;
		page_redirect('/phpboard');
	}else{
		page_alert_and_redirect('SQL 에러 $sql 회원가입 실패', '/phpboard');
	}
?>