<?php
$host = 'localhost';
$user = 'root';
$password = 'apmsetup';
$dbname = 'ys_board';

ini_set("display_errors", "1");
$connect = mysql_connect($host, $user, $password);
if (!$connect) {
	die('connect error : ' . mysql_error());
} else {
	//echo "connect success<br />";
}
$db_selected = mysql_select_db($dbname, $connect);
if (!$db_selected) {
	die('Can\'t use foo : ' . mysql_error());
} else {
	//echo "DB select success<br />";
}
?>