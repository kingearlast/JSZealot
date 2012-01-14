<?php
    session_start();
	include_once('./CallDatabase.php');
	
	extract($_POST);
	$Search_information = "select * from `member`";
	$result = mysql_query($Search_information);

	if(!$result)
	{
		echo "오류";
		
	} 
	else {
		while ($row = mysql_fetch_array($result)) {
			
			if($row['name'] ==$name && $row['social_security_number'] ==$social_security_number )
			{
				echo '찾으시는 아이디는'.'</br>'.$row['id'].'입니다 '.'</br>'.
				'홈페이지로 이동합니다'."<a href = 'Login.html' >OK</a>";
				$ok=1;
							
			}
			
		}
		if(!($ok))
		{
		echo '찾으시는 아이디가 없습니다'.'</br>'.'다시입력하여주십시오'.'</br>'.
				"<a href = 'SearchPassword.html' >OK</a>";
	//	echo htmlspecialchars("{$row['id']},{$row['password']}").'</br>';
		}
	}
	
?>