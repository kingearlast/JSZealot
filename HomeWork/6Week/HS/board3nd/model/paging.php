<?
	$pageGroup = 5;	// 페이지 그룹 당 페이지 수
	$pageGroupNum = ceil(($pageNum + 1) / $pageGroup);	// 현재 페이지 그룹
	$pageStart = ($pageGroupNum - 1) * $pageGroup + 1;
	$pageEnd = $pageStart + $pageGroup - 1;
	
	/* 이전 페이지 버튼 */
	$prevGroup = $pageGroupNum - 1; // 이전 그룹
	$prevStart = ($prevGroup - 1) * $pageGroup; // 이전 페이지 그룹의 첫 페이지
	if($pageGroupNum != 1) { 
		echo '<a href="#" class="pageGroup" id='.$prevStart.'">...</a>';
	}
	
	/* 페이지 버튼 */
	for($i=$pageStart; $i<=$pageEnd; $i++) { 
		if($i > $totalPage) break;
		$j = $i - 1;	// pageNum
		echo '<a href="#" id="'.$j.'"> '.$i.' </a>';
	}
	
	/* 다음 페이지 버튼 */
	$nextGroup = $pageGroupNum + 1; // 다음 그룹
	$nextStart = ($nextGroup - 1) * $pageGroup; // 다음 페이지 그룹의 첫 페이지	
	if($totalPage > $nextStart) { 
		echo '<a href="#" class="pageGroup" id="'.$nextStart.'">...</a>';
	} 
?>