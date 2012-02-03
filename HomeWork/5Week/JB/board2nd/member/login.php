<?php
    session_start();
	include_once('./CallDatabase.php');
	extract($_GET);
	
	$Login_information = "select * from `member`";
	$result = mysql_query($Login_information);
	if(!$result){
		echo "오류";	
	} 
	else {
		while ($row = mysql_fetch_array($result)) {
			if($row['id']== $id && $row['password'] ==$password ){
				$_SESSION['nickName'] = $row['nic_name'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['passwordCheck'] = $row['password_check'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['SSN'] = $row['social_security_number'];
			//	header('Location:../Index2.html');
				return ;		
			}
		}
		echo "false";
	}
	
?>