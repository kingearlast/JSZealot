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
				
				header('Location: ../../index.php');
				exit;
				}
		}
			 
	}
	echo '로그인 하지 못했습니다.'; 
/*
	ini_set("display_errors", "1"); 
	include_once('./dbcon.php'); 
	
	if(!empty($_POST['name'])) {
		$sql = 'INSERT INTO `codingeverybody` (`name`, `create`) 
			VALUES (\''.mysql_real_escape_string($_POST['name']).'\', NOW())';     
		$result = mysql_query($sql);     
		if (!$result) {
			$message  = '오류: ' . mysql_error() . "\n";
			$message .= '쿼리: ' . $sql;
			die($message);
	    }  
	} 
	
	$ID = $_POST['id'];
	$PASSWORD = $_POST['password'];
	$sql = "SELECT * FROM member";
	
	$result = mysql_query($sql);     
	if (!$result) {
		$message  = '오류: ' . mysql_error() . "\n";
		$message .= '쿼리: ' . $sql;
		die($message);
    }

	while($row = mysql_fetch_array($result)) {
	 $correct = 0;
	 $dbid = $row['id'];
	 $dbpassword = $row['password'];
	
	 if($ID == $dbid) { 
	  if($dbpassword == $PASSWORD) {
	   $correct=1;
	   break;
	  }
	 }
	}
	
	 if($correct == 0) {

		?>
		<script language = "javascript">	
			window.location ="login.html";
			alert("아이디 or 패스워드 잘못 입력하셨습니다.");
		</script>
		<?php
	}
	else
		echo("로그인 완료");
		?>*/
?>

