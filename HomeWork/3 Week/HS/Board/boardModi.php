<?
	session_start();
	@extract($_GET);
	$logon = $_SESSION['logon'];
	include_once('./connect.php');
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
			
			<?
				if($modi == "ok") {
					$query = "SELECT * FROM board WHERE seq=".$no;
					$result = mysql_query($query);
					$data = mysql_fetch_array($result);
			?>
				<h1>글수정</h1>
				<form method="post" action="boardModiResult.php?no=<?=$data[seq]?>">
				<table id="boardWrite">
					<tr>
						<th><label for="title">제목</label></th>
						<td><input type="text" name="title" id="title" value="<?=$data[title]?>" /></td>
					</tr>
					<tr>
						<th><label for="content">내용</label></th>
						<td><textarea name="content"><?=$data[content]?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" class="button">
							<input type="submit" value="수정" />
							<input type="button" value="취소" onClick="history.go(-1)" />
						</td>
					</tr>
				</table>
				</form>
			<?
				}
				else if($delete == "ok") {
					$query = "DELETE FROM board WHERE seq=".$no;
					$result = mysql_query($query);
					echo '<script>window.location="./boardList.php"</script>';
					//header('Location: ./boardList.php');
				}
			?>
		</div>
	</body>
</html>
