<?php
    session_start();
	include_once('./CallDatabase.php');
	
	extract($_POST);
	$Login_information = "select * from `member`";
	$result = mysql_query($Login_information);
	
	if(!$result)
	{
		echo "오류";	
	} 
	else {
		while ($row = mysql_fetch_array($result)) {
			

			if($row['id']== $id && $row['password'] ==$password )
			{
				$_SESSION['nickname'] = $row['nic_name'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['password_check'] = $row['password_check'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['phone'] = $row['phone'];
				$_SESSION['social_security_number'] = $row['social_security_number'];
				header('Location:okLogin.html');					
			}
			
		}
		echo "로그인실패".'</br>';
	}
	
?>