<?php
include_once '../../common/connect.php';
@extract($_GET);

$sql = "DELETE FROM board WHERE seq = $seq";
mysql_query($sql) or die(mysql_error());

echo "<script>
		alert('deleted.');
		location.replace('../../view/index.php');
	  </script>";
?>