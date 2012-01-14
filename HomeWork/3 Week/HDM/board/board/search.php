<? 
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	require_once($path."/utils/page.php");
	
	$boardList = array();
	extract($_GET);
	
	$pageIndex = $pageIndex == NULL? DEFAULT_CURRENT_PAGE : $pageIndex;
	
	// $start = (($pageIndex - 1) * DEFAULT_PAGE_SIZE) + 1;
	// $end = $pageIndex * DEFAULT_PAGE_SIZE;
// 	
	// $countSql = "SELECT COUNT(*) FROM BOARD";
// 	
	// $countResult = mysql_query($countSql);
	// $countRow = mysql_fetch_array($countResult);
	// $totalCount = $countRow[0];
// 	
	// $sql = "SELECT * FROM BOARD ORDER BY reg_date LIMIT $start, $end";
	// $result = mysql_query($sql);
// 	
	// while( $row = mysql_fetch_array($result)){
		// $board = setBoard($row);
		// array_push($boardList, $board);
	// }
// 	
	// $page = @new Page($pageIndex, $totalCount);
	// echo "result : ". 16 / 11;
	// echo "pageIndex: " . $pageIndex . "<br/>";
// 	
	// echo "total Count : " . $page->totalCount;
	// echo "<br/>";
	// echo "page Size : " . $page->pageSize;
	// echo "<br/>";
	// echo "max Page : " . $page->maxPage;
	// echo "<br/>";
	// echo "begin : " . $page->beginUnitPage;
	// echo "<br/>";
	// echo "end : " . $page->endUnitPage;
	
	echo $category;
	echo "<br/>";
	echo $filter;
	echo "<br/>";
	echo $keyword;
	echo "<br/>";
?>

<table border="1" style="width: 100%;">
	<caption>게시판 글 목록</caption>
	<tr>
		<th>번호</th>
		<th>제목</th>
		<th>작성자ID</th>
		<th>작성일자</th>
		<th>조회수</th>
	</tr>
	<!-- -->
	<? 
	foreach ($boardList as $key => $board) {
	?>
	<tr>
		<td><?= $board->seq; ?></td>
		<td><a class="boardList" href="/board/get.php?seq=<?= $board->seq;?>"><?= $board->title; ?></a></td>
		<td><?= $board->writerId; ?></td>
		<td><?= substr($board->regDate, 0, 10); ?></td>
		<td><?= $board->visitCount; ?></td>
	</tr>
	<?
	}
	?>
	
</table>
<?
	//echo "start : " .$page->startUnitPage;
	//echo "<br/>";
	//echo "end : " . $page->endUnitPage;
	for ( $i = $page->startUnitPage; $i <= $page->endUnitPage; $i++ ){
	?>
		<span>
			<a class="pageLink" href="/board/list.php?pageIndex=<?= $i; ?>"><?= "   " . $i . "   "; ?></a>
		</span>
		
	<?
	}	
?>


