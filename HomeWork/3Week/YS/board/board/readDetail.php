<?php
include_once '../session.php';
include_once '../connect.php';
@extract($_GET);

$sql = "SELECT * FROM board where seq = $seq";
$result = mysql_query($sql, $connect);
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>new_file</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../resources/common.css" media="screen" />
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include_once '../header.php'; ?>
			</header>
			<div id="contents">
				<div>
					<h2>게시물 내용</h2>
					<table id="readTable">
						<? $list = mysql_fetch_array($result);?>
						<tr>
							<th><label for="id">작성자명</label></th>
							<td><?= $list[member_id]?></td>
							<th><label for="regDate">작성일</label></th>
							<td><?= $list[reg_date]?></td>
							<th><label for="visitCount">조회수</label></th>
							<td><?= $list[read_cnt]?></td>
						</tr>
						<tr>
							<th><label for="title">제 목</label></th>
							<td colspan="5"><?= $list[title]?></td>
						</tr>
						<tr>
							<th><label for="content">내 용</label></th>
							<td colspan="5"><?= $list[content]?></td>
						</tr>
					</table>
				</div>
				<? if($loginID == $list[member_id]) { ?>
				<span> <a href="./updateForm.php?seq=<?= $list[seq] ?>">수정</a> </span>
				<span> <a href="./delete.php?seq=<?= $list[seq] ?>">삭제</a> </span>
				<? } ?>
			</div>
		</div>
	</body>
</html>