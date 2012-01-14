<?
	$host = "localhost";
	$userName = "root";
	$dbPassword = "apmsetup";
	$dbName = "myboard";
	$connection = mysql_connect($host, $userName, $dbPassword);
	
	if (!$connection) {
	  die("접속실패 : " . mysql_error());
	} else {
	    //echo "접속성공<br />";
	}
	$db_selected = mysql_select_db($dbName, $connection);
	mysql_query("set names utf8;"); // PHP DB연동시 한글 문제 설정
	if (!$db_selected) {
	   die ("Can\'t use myboard : " . mysql_error());
	} else {
	    //echo "DB선택성공<br />";
	}
	
?>