<?php
	include_once('../../common/db.php');
	
	$sql = "SELECT * FROM member";	
	$result = mysql_query($sql);

	if ($_REQUEST['id'] == '') {
		echo 'denied';
	}
	while($row = mysql_fetch_array($result)){
		if($_REQUEST['id'] == $row['id']){
			echo 'denied';
			break;
		}
	}
	
	echo 'okay';
	
?>
