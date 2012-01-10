<?php
	@extract($_POST);
    include_once '../../common/connect_db.php';
	include_once '../../common/session.php';
	
	$sql = "insert into board_cont(member_id, title, cont)";
	$sql .= " values('$memberID', '$title', '$cont')";
	$result = mysql_query($sql, $connect);
	$total_row = mysql_affected_rows();
	mysql_close();
	
	if($total_row > 0) {
		echo "<script>
			      alert('작성 성공');
			      location.replace('/board');
			  </script>";
	}else{
		echo "작성 실패 sql : ".$sql;	  
	}
?>