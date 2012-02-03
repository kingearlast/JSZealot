<?php
session_start();
include_once ('./CallDatabase.php');

extract($_REQUEST);
$searchInformation = "select * from `member`";
$result = mysql_query($searchInformation);

if (!$result) {
	echo "오류";

} else {
	while ($row = mysql_fetch_array($result)) {
		if ($type == 'id') {
			if ($row['name'] == $name && $row['social_security_number'] == $SSN) {
				echo '찾으시는 아이디는 '.$row['id'] . ' 입니다 ';
				return ;
			}
		} else if ($type == 'password') {
			if($row['id']== $id && $row['name'] ==$name && $row['social_security_number'] ==$SSN )
			{
				echo '찾으시는 비밀번호는 '.$row['password'].' 입니다 ';
				return ;
			}

		}
	}
	// if (!($ok)) {
		echo '찾으시는 정보가 없습니다'  ;
	// }
}
?>