<?php
	@extract($_POST);
    include_once '../../common/connect_db.php';
	include_once '../../common/session.php';
	include_once '../../common/util.php';
	
	$sql = "insert into brd_cont(mb_inf_id, brd_cont_title, brd_cont_cont)";
	$sql .= " values('$memberID', '$title', '$cont')";
	$result = mysql_query($sql, $connect);
	$totalRow = mysql_affected_rows();
	mysql_close();
	
	if($totalRow > 0) {
		page_redirect('/phpboard');	  
	}else{
		page_alert_and_redirect('SQL 에러 $sql 작성 실패', '/phpboard');
	}
?>