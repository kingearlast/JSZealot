<?php
include_once '../../common/connect.php';
@extract($_POST);
//$id = $data.id;

if ($id == "") {
	echo "<script>
			alert('error null');
			//history.go(-1);
		  </script>";
	die ;
}

$sql = "SELECT COUNT(*) FROM member WHERE id = '$id'";
$result = mysql_query($sql, $connect);
$resultSet = mysql_fetch_row($result);
$row_num = $resultSet[0];

if ($row_num == 1) {
	echo "  id가 존재합니다";
} else {
	echo "  id가 존재안합니다";
}
?>