<?
	session_start();
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
			
			<h1>내용</h1>
			<table id="boardRead">
			<?
				include_once('./connect.php');
				$query = "UPDATE board SET visit_count = visit_count+1 WHERE seq=".$no;
				mysql_query($query);
				
				$query = "SELECT FROM_UNIXTIME(reg_date,'%Y.%m.%d %h:%i'), seq, title, content, writer_id, visit_count
							FROM board WHERE seq=".$no;
				$result = mysql_query($query);
				$data = mysql_fetch_array($result);
			?>
				<tr>
	        		<td colspan="6" class="line"></td>
	        	</tr>
				<tr>
					<th>작성자명</th>
					<td><?=$data[writer_id]?></td>
					<th class="date">작성일</th>
					<td class="writer"><?=$data[0]?></td>
					<th class="count">조회수</th>
					<td><?=$data[visit_count]?></td>
				</tr>
				<tr>
					<th>제 목</th>
					<td colspan="5"><?=$data[title]?></td>
				</tr>
				<tr>
					<th>내 용</th>
					<td colspan="5">
						<?=$data[content]?>
					</td>
				</tr>
				<tr>
	        		<td colspan="6" class="line2"></td>
	        	</tr>
				<tr>
					<td colspan="6" class="button">
					<?
						if(($logon[0] == "admin") || ($data[writer_id] == $logon[0])) {
					?>
							<a href="boardModi.php?modi=ok&no=<?=$data[seq]?>">수정</a>
							<a href="boardModi.php?delete=ok&no=<?=$data[seq]?>">삭제</a>
					<?
						}
					?>
						<a href="boardList.php">목록</a>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
