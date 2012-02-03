<?php
include_once '../common/connect.php';

$sql = "SELECT * FROM board"; //ORDER BY idx DESC
$result = mysql_query($sql, $connect);
?>

<div id="board">
	<div id="boardList">
		<h3>게시물 목록</h3>
		<table id="listTable">
			<thead>
				<tr>
					<th scope="col">글번호</th>
					<th><label scope="col" for="title" >제 목</label></th>
					<th><label scope="col" for="id" >작성자</label></th>
				</tr>
			</thead>
			<? while($list = mysql_fetch_array($result)) { ?>
			<tbody>
				<tr>
					<td><?= $list[seq] ?></td>
					<td><a id="seq<?= $list[seq] ?>"><?= $list[title] ?></a></td>
					<td><?= $list[member_id]?></td>
<script>
	$('#seq<?= $list[seq] ?>').on('click', {url: './board/readDetail.php?seq=<?= $list[seq] ?>'}, loadAjax);
</script>
				</tr>
			</tbody>
			<? } ?>
		</table>
		<? if($loginID != "") { ?>
		<div> <a id="create" class="button">글쓰기</a> </div>
		<? } ?>
	</div>
</div>

<script>
	$('#create').on('click', {url: './board/createForm.php'}, loadAjax);
</script>