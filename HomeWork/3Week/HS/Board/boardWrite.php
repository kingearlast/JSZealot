<?
	session_start();
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
			
			<h1>글쓰기</h1>
			<form method="post" action="boardWriteIng.php">
			<table id="boardWrite">
				<tr>
					<th><label for="title">제목</label></th>
					<td><input type="text" name="title" id="title" /></td>
				</tr>
				<tr>
					<th><label for="content">내용</label></th>
					<td><textarea name="content"></textarea></td>
				</tr>
				<tr>
					<td colspan="2" class="button">
						<input type="submit" value="글쓰기" />
						<input type="button" value="취소" onClick="history.go(-1)" />
					</td>
				</tr>
			</table>
			</form>
		</div>
	</body>
</html>
