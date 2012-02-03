<?php
include_once '../../common/connect.php';
session_start();
@extract($_POST);

$sql = "SELECT COUNT(*) FROM member WHERE id = '$id' AND pwd = '$pwd'";
$result = mysql_query($sql, $connect);
$resultSet = mysql_fetch_row($result);
$row_num = $resultSet[0];

if ($row_num == 1) {
	$_SESSION['login_ID'] = $id;
	echo "<script>
			alert('login succeeded');
			history.go(-1);
		  </script>";
} else {
	echo "<script>
			alert('error id || pwd');
			history.go(0);
			//location.replace('../member/loginForm.php');
		  </script>";
}
?>
