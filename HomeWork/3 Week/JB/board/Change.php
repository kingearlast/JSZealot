<?php
	session_start();
	@extract($_POST);
	ini_set("display_errors", "1");
	$link = mysql_connect('localhost', 'root', 'apmsetup');
	$db_selected = mysql_select_db('jb', $link);
	
	//$Board_information = 'delete from `board` where seq ='.$_SESSION['seq'];
	
	$Rewrite_Member_information = "update member set password = $password ,password_check =$passwordcheck ,nic_name=$nickname,email=$email, phone =$phone where id =$_SESSION[id]";
	
	$_SESSION['password']= $password;
	$_SESSION['nickname']= $nickname;
	$_SESSION['email']= $email;
	$_SESSION['phone']=$phone;
	$_SESSION['password_check']=$passwordcheck;
	
	if(!(mysql_query($Rewrite_Member_information)))
	{
		echo "애러";
	}
//$Rewrite_Board_information = 'update board set write_day = now(), title='.$title.' where seq ='.$_SESSION['seq'];
	header('location:okLogin.html');

?>