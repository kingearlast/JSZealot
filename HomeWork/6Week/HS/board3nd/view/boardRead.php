<?
	session_start();
	@extract($_REQUEST);
	$logon = $_SESSION['logon'];
?>
			
<h1>내용</h1>
<table id="boardRead">
<?
	include_once('../common/connect.php');
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
			<?=$data[content] = nl2br($data[content]);?>
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
				<a href="#" id="modiBoard">수정</a>
				<a href="#" id="dropBoard">삭제</a>
		<?
			}
		?>
			<a href="#" id="listBoard">목록</a>
		</td>
	</tr>
</table>

