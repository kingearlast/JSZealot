<?php
	@extract($_GET);
    include_once '../../common/connect_db.php';
	
	if($id == "") {
		echo "input_error";
		die;
	}
	
	$sql = "select count(*) from mb_inf where mb_inf_id = '$id'";
	$result = mysql_query($sql, $connect);
	$resultSet = mysql_fetch_row($result);
	$row_num = $resultSet[0];
	
	if($row_num > 0) {
		echo "fail";
	}else {
		echo "success";
	}
?>