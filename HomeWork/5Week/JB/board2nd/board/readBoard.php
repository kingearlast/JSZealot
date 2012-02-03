<?php
@extract($_GET);


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<title>New Web Project</title>
	</head>
	<body>
		<h1>글쓰기</h1>
		<?php
		@session_start();
		if ($_SESSION['id'] != NULL) {
			echo "<a href='../Index2.html'>홈으로</a>";
		} else {
			echo "<a href='../Index1.html'>홈으로</a>";
		}
		?>

		<?php
		session_start();
		include_once ('../member/CallDatabase.php');

		$Board_information = "select * from `board` order by seq desc";
		$result = mysql_query($Board_information);

		while ($row = mysql_fetch_array($result)) {

			if ($seq == $row['seq']) {
				$_SESSION['seq'] = $row['seq'];
				$_SESSION['title'] = $row['title'];
				$_SESSION['content'] = $row['content'];
				$_SESSION['write_id'] = $row['write_id'];
				//$_SESSION['visitCount'] = $row['visit_count'];
				$row[visit_count]++;
				
				$visitCountPlus= "update board set  visit_count =$row[visit_count] where seq= $seq";
				mysql_query($visitCountPlus);
				break;
			}
		}
		?>

		<table border="1">
			<tr>
				<th>제목</th>
				<td><?php  echo $_SESSION['title'];?></td>
			</tr>
			<tr>
				<th>내용</th>
				<td width="300" height="300" ><?php  echo $_SESSION['content'];?></td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="button" id="board" value="목록"/>
				<input type="button" id="reWrite" value="수정"/>
				<input type="button" id="delete" value="삭제"/>
			</td>
			</tr>
		</table>
	</body>
</html>
<script type="text/javascript">
	$('#board').click(function() {
		location.href = "board.html";
	})
	$('#reWrite').click(function() {
		var writeId = <?=$_SESSION['write_id']?>;
		var id = <?=$_SESSION['id']?>;
		if(writeId != id){
			alert("자신의 글외는 수정할수 없습니다.");
		}
		else{
			location.href = "reWrite.html";
		}		
	})
	$('#delete').click(function() {
		var writeId = <?=$_SESSION['write_id']?>;
		var id = <?=$_SESSION['id']?>;
		if(writeId != id){
			alert("자신의 글외는 삭제할수 없습니다.");
		}
		else{
			location.href = "deleteBoard.php";
		}		
		
	})
</script>




