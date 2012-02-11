<?php
session_start();
include_once ('callDatabase.php');
extract($_REQUEST);
$searchInformation = "select * from member";
$result = mysql_query($searchInformation);
if (!$result) {
	echo "오류";
} else {
	while ($row = mysql_fetch_array($result)) {
		if ($type == 'id') {
			if ($row['name'] == $name && $row['phone'] == $phone) {
				echo '찾으시는 아이디는 ' . $row['id'] . ' 입니다 (핸드폰번호로 발송)';
				return ;
			}
		} else if ($type == 'password') {
			if ($row['id'] == $id && $row['name'] == $name && $row['phone'] == $phone) {
				echo '찾으시는 비밀번호는 ' . $row['password'] . ' 입니다(핸드폰번호로 발송) ';
				return ;
			}
		}
	}
	echo '찾으시는 정보가 없습니다';
}
?>