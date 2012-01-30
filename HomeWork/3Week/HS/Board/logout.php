<?	
	/* Q. 이런 너무 짧은건 새로운 파일에 넣지 않고 하는 방법은...? */
	session_start();
	session_destroy();
	header('Location:./index.php');
?>