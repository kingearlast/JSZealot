<?
	@extract($_REQUEST);
	include_once('../common/connect.php');
	
	$query = "SELECT count(id) FROM member WHERE id='$userID'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	
	if($row[0] > 0) {
		echo 'fail';
	}
	else {
		echo 'success';
	}
?>