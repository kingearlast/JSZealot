<?php
include_once '../../common/connect.php';
include_once '../../common/session.php';
@extract($_GET);
@extract($_POST);

ini_set("display_errors", "1");

$sql = "UPDATE board SET title = '$title', content = '$content' WHERE seq = '$seq';";
$result = mysql_query($sql);
if (!$result) {
    $message  = 'error: ' . mysql_error() . '\n';
    $message .= 'query: ' . $sql;
    die($message);
} else {
    //echo "query OK, updated.";
	echo "<script>
			alert('updated.');
			location.replace('../../view/index.php');
		  </script>";
}
?>