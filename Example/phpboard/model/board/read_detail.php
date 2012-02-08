<?php
	session_start();
	@extract($_GET);
    include_once '../../common/connect_db.php';
	
	class BoardCont {
		public $index;
		public $writer;
		public $title;
		public $cont;
	}
	
	$sql = "select * from brd_cont where brd_cont_seq = '$seq'";
	$result = mysql_query($sql, $connect);

	$resultSet = mysql_fetch_row($result);
	$boardCont = new BoardCont;
	$boardCont->index = $resultSet[0];
	$boardCont->writer = $resultSet[1];
	$boardCont->title = $resultSet[2];
	$boardCont->cont = $resultSet[3];	
?>