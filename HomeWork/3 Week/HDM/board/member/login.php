<?
	session_start();
	
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	extract($_POST);
	
	require_once($path."/db/database.php");
	
	$loginSql = "SELECT * FROM MEMBER where id = '$id' and password = '$password'";
	$result = mysql_query($loginSql);
	$memberCount = mysql_num_rows($result);
	
	if ( $memberCount == 1 ){
		//echo $row["name"];
		// 세션에 심고 리다이렉트 index.php
		$row = mysql_fetch_array($result);
		$_SESSION["isLogin"] = true;
		$_SESSION["id"] = $id;
		$_SESSION["name"] = $row["name"]; 
	}
	header("location:/index.php");
?>