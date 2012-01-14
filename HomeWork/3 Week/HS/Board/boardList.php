<?
	session_start();
	@extract($_POST);
	@extract($_GET);
	$logon = $_SESSION['logon'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="style/board.css" />
		<title>Board</title>
	</head>
	<body>
		<div id="wrap">
			
			<?
				include_once('./header.php');
			?>
	
			<h1>글 목록</h1>
			<table id="boardList">
				<thead>
					<tr>
		        		<td colspan="5" class="line"></td>
		        	</tr>
					<tr>
						<th class="no">No.</th>
						<th class="title">제 목</th>
						<th class="writer">작성자</th>
						<th class="date">작성일</th>
						<th class="count">조회</th>
					</tr>
				</thead>
				<tbody>	
					<?
						include_once('./connect.php');
						
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
						$result = mysql_query($query);
						while($data = mysql_fetch_array($result)) {
							echo '<tr>
									<td>'.$data[seq].'</td>
									<td class="title"><a href=boardRead.php?no='.$data[seq].'>'.$data[title].'</a></td>
									<td>'.$data[writer_id].'</td>
									<td>'.$data[0].'</td>
									<td>'.$data[visit_count].'</td></tr>';
						}	/* Q. 왜 $data[reg_date]했을땐 값이 안나올까?? */
					?>
					<tr>
		        		<td colspan="8" class="line2"></td>
		        	</tr>
		        	<tr>
		        		<td colspan="8" class="boardWrite"><a href="boardWrite.php">글쓰기</a></td>
		        	</tr>
				</tbody>
			</table>
			<?
				$pageGroup = 5;	// 페이지 그룹 당 페이지 수
				$pageGroupNum = ceil(($pageNum + 1) / $pageGroup);	// 현재 페이지 그룹
				$pageStart = ($pageGroupNum - 1) * $pageGroup + 1;
				$pageEnd = $pageStart + $pageGroup - 1;
				$prevGroup = $pageGroupNum - 1; // 이전 그룹
				$prevStart = ($prevGroup - 1) * $pageGroup; // 이전 페이지 그룹의 첫 페이지
				
				/* 이전 페이지 버튼 */
				if($pageGroupNum != 1) { 
					echo '<a href="'.$PHP_SELF.'?pageNum='.$prevStart.'&category='.$category.'&inputValue='.$inputValue.'">...</a>';
				}
				
				/* 페이지 버튼 */
				for($i=$pageStart; $i<=$pageEnd; $i++) { 
					if($i > $totalPage) break;
					$j = $i - 1;	// pageNum
					echo '<a href="'.$PHP_SELF.'?pageNum='.$j.'&category='.$category.'&inputValue='.$inputValue.'"> '.$i.' </a>';
				}
				
				/* 다음 페이지 버튼 */
				$nextGroup = $pageGroupNum + 1; // 다음 그룹
				$nextStart = ($nextGroup - 1) * $pageGroup; // 다음 페이지 그룹의 첫 페이지	
				if($totalPage > $nextStart) { 
					echo '<a href="'.$PHP_SELF.'?pageNum='.$nextStart.'&category='.$category.'&inputValue='.$inputValue.'">...</a>';
				} 
			?>
			<div id="search">
				<form action="boardList.php" method="post">
					<select name="category">
						<option value="boardTitle">제목</option>
						<option value="boardWirter">작성자</option>
						<input type="text" name="inputValue" />
					</select>
					<input type="submit" value="검색">
				</form>
			</div>
		</div> <!-- wrap -->
	</body>
</html>
