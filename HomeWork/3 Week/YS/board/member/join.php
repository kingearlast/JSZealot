<?php
include_once '../connect.php';
@extract($_POST);
$level = 99;

$sql = "INSERT INTO member VALUES ('$id', '$pwd', '$name', '$email', '$level');";

$result = mysql_query($sql);
if (!$result) {
    $message  = 'error: ' . mysql_error() . "\n";
    $message .= 'query: ' . $sql;
    die($message);
} else {
    //echo "query OK, joined.";;
	echo "<script>
			alert('joined.');
			location.replace('../board/readList.php');
		  </script>";
}

?>