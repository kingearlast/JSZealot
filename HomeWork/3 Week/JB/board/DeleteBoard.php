<?php
	session_start();
	ini_set("display_errors", "1");
	$link = mysql_connect('localhost', 'root', 'apmsetup');
	$db_selected = mysql_select_db('jb', $link);
	
	if($_SESSION['write_id'] != $_SESSION['id'])
	{
		echo '자신의 글외에는 삭제 할수없습니다'.'</br>'.'홈페이지로 이동합니다'."<a href = 'ReadBoard.php' >OK</a>";
	}
	else {
		$Board_information = 'delete from `board` where seq ='.$_SESSION['seq'];
		mysql_query($Board_information);
		header('location:Board.html');
		
	}
	
	

?>