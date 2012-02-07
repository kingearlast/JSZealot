<?php
	session_start();
	@extract($_POST);
    include_once '../../common/connect_db.php';
	
	class BoardCont {
		public $index;
		public $writer;
		public $title;
		public $cont;
	}
	
	$sql = "select * from brd_cont";
	$result = mysql_query($sql, $connect);
	
	$contArray = array();
	$i = 0;
	
	while($resultSet = mysql_fetch_row($result)) {
		$boardCont = new BoardCont;
		$boardCont->index = $resultSet[0];
		$boardCont->writer = $resultSet[1];
		$boardCont->title = $resultSet[2];
		$boardCont->cont = $resultSet[3];	
		$contArray[$i++] = $boardCont;
	}
?>