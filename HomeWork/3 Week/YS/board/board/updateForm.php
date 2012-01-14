<?php
include_once '../session.php';
include_once '../connect.php';
@extract($_GET);

$sql = "SELECT * FROM board WHERE seq = $seq";
$result = mysql_query($sql, $connect);

$list = mysql_fetch_array($result);
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>update</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include_once '../header.php'; ?>
			</header>
			<div id="contents">
				<div>
					<h2>게시물 수정</h2>
					<form action="./update.php?seq=<?= $seq ?>" method="POST">
						<table id="writeTable">
							<tr>
								<th>
									<label for="title">제목</label>
								</th>
								<td>
									<input type="text" name="title" id="title" value="<?= $list[title] ?>" size="64" />
								</td>
							</tr>
							<tr>
								<th>
									<label for="content">내용</label>
								</th>
								<td>
									<textarea name="content" id="content"  cols="44" rows="9">
										<?= $list[content] ?>
									</textarea>
								</td>
							</tr>
							<tr>
								<td >
									<input type="submit" value="수정" />
									<a href="../board/readList.php">취소</a>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>