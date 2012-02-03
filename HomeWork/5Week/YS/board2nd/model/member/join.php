<?php
include_once '../../common/connect.php';
@extract($_POST);

$sql = "INSERT INTO member VALUES ('$id', '$pwd', '$name', '$email');";

$result = mysql_query($sql);
if (!$result) {
    $message  = '\nerror: ' . mysql_error() . "\n";
    $message .= 'query: ' . $sql;
    die($message);
} else {
    //echo "query OK, joined.";
    session_start();
    $_SESSION['login_ID'] = $id;
	echo "<script>
			alert('joined.');
			location.replace('../../view/index.php');
		  </script>";
}
?>