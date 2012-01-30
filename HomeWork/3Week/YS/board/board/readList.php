<?php
include_once '../session.php';
include_once '../connect.php';

$sql = "SELECT * FROM board";//ORDER BY idx DESC
$result = mysql_query($sql, $connect);
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>List</title>
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
					<div id="boardList">
						<h3>게시물 목록</h3>
						<table id="listTable">
							<thead>
								<tr>
									<th scope="col">글번호</th>
									<th><label scope="col" for="title" >제 목</label></th>
									<th><label scope="col" for="id" >작성자</label></th>
									<th><label scope="col" for="regDate" >작성일</label></th>
									<th><label scope="col" for="visitCount" >조회수</label></th>
								</tr>
							</thead>
							<? while($list = mysql_fetch_array($result)) { ?>
							<tbody>
								<tr>
									<td><?= $list[seq] ?></td>
									<td><a href="./readDetail.php?seq=<?= $list[seq] ?>"><?= $list[title] ?></a></td>
									<td><?= $list[member_id]?></td>
									<td><?= $list[reg_date]?></td>
									<td><?= $list[read_cnt]?></td>
								</tr>
							</tbody>
							<? } ?>
						</table>
						<? if($loginID != "") { ?>
						<div> <a href="../board/createForm.php">글쓰기</a> </div>
						<? } ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>