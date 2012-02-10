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
	
	$pagePerNumber = 10;
	
	$countSql = "select count(*) from brd_cont";
	$countResult = mysql_query($countSql, $connect);
	$countResultSet = mysql_fetch_row($countResult);
	$contsCount = $countResultSet[0];
	$pageCount = ($contsCount != 0)?ceil($contsCount / $pagePerNumber):0;
	
	$startIndex = ($page - 1) * 10;
	$contsSql = "select * from brd_cont limit $startIndex, $pagePerNumber";
	$contsResult = mysql_query($contsSql, $connect);
	$contArray = array();
	$i = 0;
	
	while($contsResultSet = mysql_fetch_row($contsResult)) {
		$boardCont = new BoardCont;
		$boardCont->index = $contsResultSet[0];
		$boardCont->writer = $contsResultSet[1];
		$boardCont->title = $contsResultSet[2];
		$boardCont->cont = $contsResultSet[3];	
		$contArray[$i++] = $boardCont;
	}
?>