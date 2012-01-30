<?php
include_once '../connect.php';
session_start();
@extract($_POST);

if ($id == "" || $pwd == "") {
	echo "<script>
			alert('error null');
			location.replace('../member/loginForm.php');
		  </script>";
	die ;
}

$sql = "SELECT COUNT(*) FROM member WHERE id = '$id' AND pwd = '$pwd'";
$result = mysql_query($sql, $connect);
$resultSet = mysql_fetch_row($result);
$row_num = $resultSet[0];

//echo $resultSet[0];

if ($row_num == 1) {
	$_SESSION['login_ID'] = $id;
	echo "<script>
			alert('login succeeded');
			location.replace('../board/readList.php');
		  </script>";
} else {
	echo "<script>
			alert('error id || pwd');
			location.replace('../member/loginForm.php');
		  </script>";
}
?>
