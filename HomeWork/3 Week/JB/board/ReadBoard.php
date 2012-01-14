<?php
	@extract($_GET);
	echo $seq; 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>New Web Project</title>
	</head>
	<body>
		<h1>글쓰기</h1>
				<?php 
		@session_start();
		if($_SESSION['id']!=NULL)
		{
			echo "<a href='okLogin.html'>홈으로</a>";
		}
		else{
			echo "<a href='Login.html'>홈으로</a>";
		}	
?>

<?php
	ini_set("display_errors", "1");
	session_start();
	$link = mysql_connect('localhost', 'root', 'apmsetup');
	$db_selected = mysql_select_db('myboard', $link);
	
	$Board_information = "select * from `board` order by seq desc";
	$result = mysql_query($Board_information);
	
	while ($row = mysql_fetch_array($result)) {
							
				if($seq==$row['seq'])
				{
					$_SESSION['seq'] = $row['seq'];
					$_SESSION['title'] = $row['title'];
					$_SESSION['content'] = $row['content'];
					$_SESSION['write_id'] = $row['write_id'];
					
					break;
				}		
			}

?>

		<table border="1">
			
			

			<tr>
				<th>제목</th>
				<td><?php  echo $_SESSION['title'];   ?></td>
			</tr>
			<tr>
				<th>내용</th>
				<td width="300" height="300" ><?php  echo $_SESSION['content']; ?></td>
			</tr>
			<tr>
			<td colspan="2">
				<form action="Board.html" method="get"><input type="submit" value="목록"/></form>
				<form action="ReWrite.html"  method="get" accept-charset="utf-8">  <input type="submit" value="수정"/></form>
				<form action="DeleteBoard.php"  method="get" accept-charset="utf-8">   <input type="submit" value="삭제"/></form>
		
			</td>
			</tr>
		</table>
		
	</body>
</html>
