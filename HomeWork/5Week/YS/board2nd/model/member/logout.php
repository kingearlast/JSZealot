<?php
	session_start();
	$_SESSION['login_ID'] = "";
	echo "<script>
			alert('logged out');
			history.go(-1);
			//location.replace('../board/readList.php');
		  </script>";
?>