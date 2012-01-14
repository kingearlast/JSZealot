<?
	$path = $_SERVER[DOCUMENT_ROOT];
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	extract($_POST);
	
	$sql = "INSERT INTO BOARD(category_id, writer_id, title, content) VALUES(null,'$id','$title','$content')";
	$result = mysql_query($sql);
	$count = mysql_affected_rows();
	
	// 방금전 세이브한 글의 seq 를 찾아서 get을 호출할때 파라미터로 넘긴다.
	$findSeqSql = "SELECT MAX(seq) as seq FROM BOARD";
	$findSeqResult = mysql_query($findSeqSql);
	$row = mysql_fetch_array($findSeqResult);
	
	if ( $count > 0 ){
		$lastSeq = $row["seq"];
		header("location:/board/get.php?seq=$lastSeq");
	}else{
		echo require_once($path."/board/saveForm.php");
	}
?>