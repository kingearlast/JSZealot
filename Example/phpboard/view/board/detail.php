<? include_once '../../common/session.php'; ?>
<? include_once '../../model/board/read_detail.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>New Web Project</title>
	</head>
	<body>	
	<table>
		<tr>
			<th>번 호</th>
			<td><?= $boardCont->index ?></td>
		</tr>
		<tr>
			<th>작성자</th>
			<td><?= $boardCont->writer ?></td>
		</tr>
		<tr>
			<th>제 목</th>
			<td><?= $boardCont->title ?></td>
		</tr>
		<tr>
			<th>내 용</th>
			<td><?= $boardCont->cont ?></td>
		</tr>
	</table>
	</body>
</html>	