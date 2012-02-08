<?php
	session_start();
	@extract($_POST);
	
    include_once '../../common/connect_db.php';
	
	if($id == "" || $pwd == "" || $name == "") {
		echo "<script>alert('입력 에러')</script>";
		die;
	}
	
	$sql = "select count(*) from mb_inf where mb_inf_id = '$id'";
	$result = mysql_query($sql, $connect);
	$resultSet = mysql_fetch_row($result);
	$row_num = $resultSet[0];
	
	if($row_num > 0) {
		echo "join.IDError";
		die;
	}
	
	$sql = "insert into mb_inf(mb_inf_id, mb_inf_nm, mb_inf_pwd)";
	$sql .= " values('$id', '$name', '$pwd')";
	$result = mysql_query($sql, $connect);
	$total_row = mysql_affected_rows();
	mysql_close();
	
	if($total_row > 0) {
		$_SESSION['loginID'] = $id;
		echo "<script>
			      alert('로그인 성공');
			      location.replace('/phpboard');
			  </script>";
	}else{
		echo $sql;	
		echo "<script>
			      alert('가입 실패');
			  </script>";
	}
?>