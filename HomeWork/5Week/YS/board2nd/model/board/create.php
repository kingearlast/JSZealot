<?php
include_once '../../common/connect.php';
include_once '../../common/session.php';

ini_set("display_errors", "1");

@extract($_POST);
$id = $loginID;

$sql = "INSERT INTO board (title, content, member_id) VALUES ('$title', '$content', '$id');";
$result = mysql_query($sql);
if (!$result) {
    $message  = 'error: ' . mysql_error() . '\n';
    $message .= 'query: ' . $sql;
    die($message);
} else {
    //echo "query OK, created.";
	echo "<script>
			alert('created.');
			location.replace('../../view/index.php');
		  </script>";
}

?>