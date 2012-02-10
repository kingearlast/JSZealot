<?
	session_start();
	@extract($_POST);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome</title>
		<style>
			#wrap {
				text-align: center;
				margin-top: 3%;
				width: 700px;
				margin-left: auto;
				margin-right: auto;
			}
		</style>
	</head>
	<body>
		<div id="wrap">
		<?
			include_once('../common/connect.php');
			$query = "INSERT INTO member VALUES".
					"('$userID', '$userPwd', '$name', '$phone', '$email')";
			$result = mysql_query($query);	// query실행
			
			if($result) {
				$query = "SELECT id, name FROM member WHERE"
						."(id='".$userID."') and (password='".$userPwd."')";
				$result = mysql_query($query);
				$data = mysql_fetch_array($result);
				
				session_register('logon');
				$logon = array($data[id], $data[name]);
				echo "<script>window.location='../index.php'</script>";
			}
			else {
				echo '<h1>가입실패</h1>';
			}
		?>
		</div>
	</body>
</html>
