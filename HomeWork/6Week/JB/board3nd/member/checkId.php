<?php
@extract($_REQUEST);
   include_once("callDatabase.php");
   $check = "SELECT count(id) FROM member WHERE id ='$id'";
   $result = mysql_query($check);
   $row = mysql_fetch_array($result);
   if($row[0] <= 0) {
		echo 'false';
	}
?>
