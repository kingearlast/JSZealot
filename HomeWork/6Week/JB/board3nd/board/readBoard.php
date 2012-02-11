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
		<a href="../index.html">홈으로</a>
		<?php
		@session_start();
		extract($_GET);
		include_once ('../member/callDatabase.php');
		$Board_information = "select * from board where seq=$seq";
		$result = mysql_query($Board_information);
		$row = mysql_fetch_array($result);
		$title = $row[title];
		$content = $row[content];	
		$_SESSION['seq'] = $seq;	
		?>
		<form action="reWrite.html" method="post">
		<table border="1">
			<tr>
				<th>제목</th>
				<td><input type="text" name="title" value="<?php  echo $title;?>" disabled="yes" /></td>
			</tr>
			<tr>
				<th>내용</th>
				<td>
				<textarea style="resize: none" rows="10" cols="34" disabled="yes" name="content"><?php echo $content;?></textarea></td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="button" onclick="location='board.html?page=1'" value="목록"/>
			<?if($_SESSION['id'] == $row['writeId']){?>
				<input type="submit" value="수정"/>
				<input type="button" onclick="location='deleteBoard.php'" value="삭제"/>
			<?}?>
			</td>
			</tr>
		</table>
		</form>
	</body>
</html>




