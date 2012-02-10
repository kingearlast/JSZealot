<?
	include_once('../common/connect.php');
	if($category == "boardTitle") { // 제목 검색
		/* 글 개수 가져오기 */
		$query = "SELECT * FROM board WHERE title LIKE '%".$inputValue."%'";
		$result = mysql_query($query);
		$total = mysql_num_rows($result);	// 전체 글 수 
		$pageSet = 10;	// 페이지 당 게시물 개수
		$totalPage = ceil($total / $pageSet);	// 총 페이지 수
		$start = $pageSet * $pageNum;	// LIMIT 시작위치
		
		/* 글 목록 가져오기 */
		$query = "SELECT FROM_UNIXTIME(reg_date,'%Y.%m.%d'), seq, title, writer_id, visit_count
			FROM board WHERE title LIKE '%".$inputValue."%' 
			ORDER BY seq desc LIMIT ".$start.", ".$pageSet;
	}
	else if($category == "boardWirter") { // 작성자 검색
		/* 글 개수 가져오기 */
		$query = "SELECT * FROM board WHERE writer_id='".$inputValue."'";
		$result = mysql_query($query);
		$total = mysql_num_rows($result);	
		$pageSet = 10;	
		$totalPage = ceil($total / $pageSet);	
		$start = $pageSet * $pageNum;
	
		/* 글 목록 가져오기 */
		$query = "SELECT FROM_UNIXTIME(reg_date,'%Y.%m.%d'), seq, title, writer_id, visit_count
			FROM board WHERE writer_id='".$inputValue."' 
			ORDER BY seq desc LIMIT ".$start.", ".$pageSet;
	}
	else {	// 전체 목록
		/* 글 개수 가져오기 */
		$query = "SELECT COUNT(*) FROM board";
		$result = mysql_query($query);
		$total = mysql_result($result, 0,0);	
		$pageSet = 10;	
		$totalPage = ceil($total / $pageSet);	
		$start = $pageSet * $pageNum;	
		
		/* 글 목록 가져오기 */
		$query = "SELECT FROM_UNIXTIME(reg_date,'%Y.%m.%d'), seq, title, writer_id, visit_count
			FROM board ORDER BY seq desc LIMIT ".$start.", ".$pageSet;
	}
?>