<?php
session_start();
include_once ('../member/CallDatabase.php');
$Board_information = 'delete from `board` where seq =' . $_SESSION['seq'];
mysql_query($Board_information);
header('location:board.html');
?>