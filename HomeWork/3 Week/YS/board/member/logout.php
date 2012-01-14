<?php
	session_start();
	$_SESSION['login_ID'] = "";
	echo "<script>
			alert('logged out');
			location.replace('../board/readList.php');
		  </script>";
?>