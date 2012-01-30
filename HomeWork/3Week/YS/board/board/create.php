<?php
include_once '../connect.php';
include_once '../session.php';

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
			location.replace('../board/readList.php');
		  </script>";
}

?>