<? include_once '../session.php'; ?>

<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>create</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../resources/common.css" media="screen" />
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include_once '../header.php'; ?>
			</header>
			<div id="contents">
				<div id="board">
					<h2>게시물 작성</h2>
					<form action="./create.php" method="POST">
						<table id="createTable">
							<tr>
								<th><label for="title">제목</label></th>
								<td><input type="text" name="title" id="title" value="" size="64" /></td>
							</tr>
							<tr>
								<th><label for="content">내용</label></th>
								<td>
									<textarea name="content" id="content" cols="44" rows="9"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" value="작성" />
									<a href="./board/readList.php">취소</a>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>