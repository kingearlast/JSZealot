<?php
include_once '../../common/connect.php';
include_once '../../common/session.php';

@extract($_POST);
$id = $loginID;

$sql = "UPDATE member SET pwd = '$pwd', name = '$name', email = '$email' WHERE id = '$id';";
$result = mysql_query($sql);

if (!$result) {
    $message  = 'error: ' . mysql_error() . '\n';
    $message .= 'query: ' . $sql;
    die($message);
} else {
	echo "<script>
			alert('updated.');
			location.replace('../../view/index.php');
		  </script>";
}
?>