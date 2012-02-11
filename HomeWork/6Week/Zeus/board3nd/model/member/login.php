<?php
	session_start();
	ini_set("display_errors", "1");
	include_once('../../common/db.php');
	
	$sql = "SELECT * FROM member";	
	$result = mysql_query($sql);     
	
	if (!$result) {
		$message  = '오류: ' . mysql_error() . "\n";
		$message .= '쿼리: ' . $sql;
		die($message);
    }
		
	if(!empty($_POST['id']) && !empty($_POST['password'])){
		while($row = mysql_fetch_array($result)){
			if($_POST['id'] == $row['id'] && $_POST['password'] == $row['password']){
				$_SESSION['is_login'] = true;
				$_SESSION['nickname'] = $row['name'];
				$id = $_SESSION['id'] = $row['id'];
				$visitCount = $row['visit_count'] + 1;
				$query = "UPDATE member SET visit_count = '$visitCount' where id = '$id'";
				mysql_query($query);				
				//header('Location: ../../index.php');
				echo 'okay';
				exit;
				}
		}
			 
	}
	echo 'denied'; 

?>

