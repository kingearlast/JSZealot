<?php
session_start();
extract($_GET);
include_once ('../member/callDatabase.php');

class boardInformation{
	public $index;
	public $writer;
	public $title;
	public $content;
	public $writeDay;
	public $visitCount;
}
$board = array();
$i=0;

$Board_information = "select * from `board` order by seq desc";
$result = mysql_query($Board_information);
while ($row = mysql_fetch_array($result)) {
	$boardInformation = new boardInformation;
	$boardInformation->index = $row[seq];
	$boardInformation->writer = $row[categoryId];
	$boardInformation->title = $row[title];
	$boardInformation->content = $row[content];
	$boardInformation->writeDay = $row[writeDay];
	$boardInformation->visitCount = $row[visitCount];
	$board[$i++] = $boardInformation;
}
$_SESSION['page'] = 1;	
?>


