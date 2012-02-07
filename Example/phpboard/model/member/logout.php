<?php
	session_start();
	$_SESSION['loginID'] = "";
		echo "<script>
			      alert('로그 아웃');
			      location.replace('/phpboard');
			  </script>";
?>