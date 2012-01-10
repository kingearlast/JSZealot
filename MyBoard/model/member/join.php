<?php
	@extract($_POST);
	
    //include_once '../../common/connect_db.php';
	
	// if($id == "" || $pwd == "" || $name == "") {
		// echo "<script>alert('입력 에러')</script>";
		// die;
	// }
	$host 		= "localhost";
	$user 		= "root";
	$password 	= "apmsetup";
	
	$connect = mysql_connect($host, $user, $password) or die("MySQL 서버 접속 에러");
	mysql_select_db('board', $connect) or die("DB 접속 에러");
	
	$sql = "select count(*) from member_info where id = '$id'";
	$result = mysql_query($sql, $connect);
	$resultSet = mysql_fetch_row($result);
	$row_num = $resultSet[0];
	
	if($row_num > 0) {
		echo "join.IDError";
		die;
	}
	
	$sql = "insert into member_info(id, pwd, name)";
	$sql .= " values('$id', '$pwd', '$name')";
	$result = mysql_query($sql, $connect);
	$total_row = mysql_affected_rows();
	mysql_close();
	
	if($total_row > 0) {
		echo "<script>
			      alert('가입 성공');
			      location.replace('/board');
			  </script>";
	}else{
		echo $sql;	
		echo "<script>
			      alert('가입 실패');
			      //location.replace('/board');
			  </script>";
	}
?>