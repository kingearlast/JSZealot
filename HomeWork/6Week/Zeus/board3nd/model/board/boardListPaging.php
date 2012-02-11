1. 개시물의 총 갯수 알기.
2. 한 페이지에 표시할 목록의 갯수
3. 페이지를 이동할 수 있도록 현재 페이지 번호가 필요함
4. 검색을 포함하는 경우, 페이지를 이동했을 때 검색어에 대한 정보도 필요하다.
5. 페이지가 너무 많으면 단락별로 이동이 가능하도록 한 단락에 표시할 수 있는 페이지의 갯수도 필요

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
$result = mysql_query($query);
while($data = mysql_fetch_array($result)) {
echo '
<tr>
	<td>'.$data[seq].'</td>
	<td class="title"><a href="#" id="'.$data[seq].'">'.$data[title].'</a></td>
	<td>'.$data[writer_id].'</td>
	<td>'.$data[0].'</td>
	<td>'.$data[visit_count].'</td>
</tr>
';
} <?
$pageGroup = 5;
// 페이지 그룹 당 페이지 수
$pageGroupNum = ceil(($pageNum + 1) / $pageGroup);
// 현재 페이지 그룹
$pageStart = ($pageGroupNum - 1) * $pageGroup + 1;
$pageEnd = $pageStart + $pageGroup - 1;
$prevGroup = $pageGroupNum - 1;
// 이전 그룹
$prevStart = ($prevGroup - 1) * $pageGroup;
// 이전 페이지 그룹의 첫 페이지

/* 이전 페이지 버튼 */
if ($pageGroupNum != 1) {
	echo '<a href="' . $PHP_SELF . '?pageNum=' . $prevStart . '&category=' . $category . '&inputValue=' . $inputValue . '">...</a>';
}

/* 페이지 버튼 */
for ($i = $pageStart; $i <= $pageEnd; $i++) {
	if ($i > $totalPage)
		break;
	$j = $i - 1;
	// pageNum
	echo '<a href="' . $PHP_SELF . '?pageNum=' . $j . '&category=' . $category . '&inputValue=' . $inputValue . '"> ' . $i . ' </a>';
}

/* 다음 페이지 버튼 */
$nextGroup = $pageGroupNum + 1;
// 다음 그룹
$nextStart = ($nextGroup - 1) * $pageGroup;
// 다음 페이지 그룹의 첫 페이지
if ($totalPage > $nextStart) {
	echo '<a href="' . $PHP_SELF . '?pageNum=' . $nextStart . '&category=' . $category . '&inputValue=' . $inputValue . '">...</a>';
}
?>

----------------

<?php
$currentPage = $_REQUEST["page"];
if (!$currentPage)
	$currentPage = 1;

$totalRecord = @mysqli_num_rows(@mysqli_query($dbc, $sql_query));
// 전체 레코드수
$recordPerPage = $limit;
// 페이지 당 뿌릴 레코드 수
$pagePerBlock = 10;
// [1] ~ [10] 까지 한번에 10개씩

function handlePage($totalRecord, $recordPerPage, $pagePerBlock, $currentPage) {// 전체레코드,  페이지당 레코드수(10) , 블럭당페이지수(10), 현재페이지

	$totalNumOfPage = ceil($totalRecord / $recordPerPage);
	//16page
	$totalNumOfBlock = ceil($totalNumOfPage / $pagePerBlock);
	//2block
	$currentBlock = ceil($currentPage / $pagePerBlock);
	// 1page

	$startPage = ($currentBlock - 1) * $pagePerBlock + 1;
	// 1page
	$endPage = $startPage + $pagePerBlock - 1;
	// 10page
	if ($endPage > $totalNumOfPage)
		$endPage = $totalNumOfPage;

	//NEXT,PREV 존재 여부
	$isNext = false;
	$isPrev = false;

	if ($currentBlock < $totalNumOfBlock)
		$isNext = true;
	if ($currentBlock > 1)
		$isPrev = true;

	if ($totalNumOfBlock == 1) {
		$isNext = false;
		$isPrev = false;
	}

	if ($isPrev) {
		$goPrevPage = $startPage - $pagePerBlock;
		// 11page
		echo "<a href=\"$PHP_SELF?page=$goPrevPage\" class='page'>[PREV]</a>";
	}
	for ($i = $startPage; $i <= $endPage; $i++) {
		echo "<a href=\"$PHP_SELF?page=" . ($i - 1) . "\" class='page'>[" . $i . "]</a>";
	}
	if ($isNext) {
		$goNextPage = $startPage + $pagePerBlock;
		// 11page
		echo "<a href=\"$PHP_SELF?page=$goNextPage\" class='page'>[NEXT]</a>";
	}
}

if (!$keyword)
	handlePage($totalRecord, $recordPerPage, $pagePerBlock, $currentPage);
?>

----------------------------------------

http://www.phpschool.com/gnuboard4/bbs/board.php?bo_table=teach&wr_id=1602&sca=&sfl=wr_subject%7C%7Cwr_content&stx=%C6%E4%C0%CC%C2%A1&sop=and

<?
$start = $_GET[start];
$total = 534;
//총 레코드수
$scale = 10;
//페이지당 출력 레코드수
$page_scale = 10;
// 화면당 출력할 페이지 수
if (!$start)
	$start = 0;
//시작 페이지 번호가 없을경우 0

$total_page = ceil($total / $scale);
//총 페이지수
$page = floor($total_page / $page_scale);
//단위블럭페이지수
$n_page = floor($start / $page_scale);
//현재 단위블럭 페이지번호

if ($n_page > 0) {
	//이전 링크 출력 조건 현재단위블럭 페이지 번호가 0보다 클경우
	$p_start = ($n_page - 1) * $page_scale;
	//현재 단위블럭 페이지 -1 * 단위블럭 페이지 출력수(page_scale)
	$link = "<a href='" . $_SERVER[PHP_SELF] . "?start=${p_start}'>";
	$link .= "이전";
	$link .= "</a>";
	echo $link . " ";
}
$is = $n_page * $page_scale;
//단위블럭 페이지 시작번호 구하기 현재 페이지 번호를 이용하여 현재 단위블럭 페이지 번호를 구하고 그 값을 이용하여 단위블럭 페이지 출력수를 곱한 값
for ($i = $is; $i < $is + $page_scale; $i++) {
	//i는 현재 단위블럭 페이지 번호*단위블럭 페이지 출력수 부터 시작하고 i는 단위블럭 페이지 출력수를 더한 값만큼만 반복하도록 지정
	if ($i < $total_page) {//i가 총 페이지수 보다 작을 동안만 출력하기 위한조건
		$link = "<a href='" . $_SERVER[PHP_SELF] . "?start=${i}'>";
		$link .= $i + 1;
		//start값이 i로 지정됨으로 화면상 출력기준을 1부터 시작하는 10진수로 맞추기 위해 +1을 연산
		$link .= "</a>";
		echo $link . " ";
	}
}

if ($n_page < $page) {//현재 단위블럭 페이지번호 보다 총 단위블럭 페이지 수가 작을 경우에만 다음 링크 출력
	$link = "<a href='" . $_SERVER[PHP_SELF] . "?start=${i}'>";
	//i는 상단 for문에서 이미 마지막 페이지 start번호보다 +1한 값을 가지고 있기 때문에 i를 그냥 출력함
	$link .= "다음";
	$link .= "</a>";
	echo $link;
}
?>
------------------------------------------------

<?php
$page = $_REQUEST["page"];
if (!$page)
	$page = 1;

$total_num = 151;
// 전체 레코드수
$pagesize = 10;
// 페이지 당 뿌릴 레코드 수
$pagePerBlock = 10;
// [1] ~ [10] 까지 한번에 10개씩
$search = "&search=문자";
//GET 방식으로 추가 문자열을 넣는다
function handlePage($total_num, $pagesize, $pagePerBlock, $page, $search) {// 전체레코드,  페이지당 레코드수(10) , 블럭당페이지수(10), 현재페이지

	$totalNumOfPage = ceil($total_num / $pagesize);
	//16page
	$totalNumOfBlock = ceil($totalNumOfPage / $pagePerBlock);
	//2block
	$currentBlock = ceil($page / $pagePerBlock);
	// 1page

	$startPage = ($currentBlock - 1) * $pagePerBlock + 1;
	// 1page
	$endPage = $startPage + $pagePerBlock - 1;
	// 10page
	if ($endPage > $totalNumOfPage)
		$endPage = $totalNumOfPage;

	//NEXT,PREV 존재 여부
	$isNext = false;
	$isPrev = false;

	if ($currentBlock < $totalNumOfBlock)
		$isNext = true;
	if ($currentBlock > 1)
		$isPrev = true;

	if ($totalNumOfBlock == 1) {
		$isNext = false;
		$isPrev = false;
	}

	if ($isPrev) {
		$goPrevPage = $startPage - $pagePerBlock;
		// 11page
		echo "<a href=\"$PHP_SELF?page=$goPrevPage$search\">◀</a>";
	} else {
		echo "◀";
	}
	for ($i = $startPage; $i <= $endPage; $i++) {
		if ($page == $i) {
			echo "<b>[" . $i . "]</b>";
		} else {
			echo "<a href=\"$PHP_SELF?page=$i$search\">[" . $i . "]</a>";
		}
	}
	if ($isNext) {
		$goNextPage = $startPage + $pagePerBlock;
		// 11page
		echo "<a href=\"$PHP_SELF?page=$goNextPage$search\">▶</a>";
	} else {
		echo "▶";
	}
}

handlePage($total_num, $pagesize, $pagePerBlock, $page, $search);
?>