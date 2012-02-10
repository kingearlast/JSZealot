<?php
session_start();
include_once ('./callDatabase.php');
extract($_REQUEST);
$Login_information = "select * from member where id='$id' and password = '$password'";
$result = mysql_query($Login_information);
$row = mysql_fetch_array($result);
if (!$result) {
	echo "오류";
} else {
	if ($row['id'] == "") {
		//여기이상한부분
		echo 'false';
	} else {
		$_SESSION['nickName'] = $row['nickName'];
		$_SESSION['id'] = $id;
		
	}
}
?>