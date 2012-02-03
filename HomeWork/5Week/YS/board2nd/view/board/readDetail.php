<?php
include_once '../../common/connect.php';
include_once '../../common/session.php';
@extract($_GET);

$sql = "SELECT * FROM board where seq = $seq";
$result = mysql_query($sql, $connect);
?>
<div>
	<h2>게시물 내용</h2>
	<table id="readTable">
		<? $list = mysql_fetch_array($result);?>
		<tr>
			<th><label for="id">작성자</label></th>
			<td><?= $list[member_id]?></td>
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
<span> <a id="seq<?= $list[seq] ?>" class="button">수정</a> </span>
<span> <a href="../model/board/delete.php?seq=<?= $list[seq] ?>" class="button">삭제</a> </span>
<script>
	$('#seq<?= $list[seq] ?>').on('click', {url: './board/updateForm.php?seq=<?= $list[seq] ?>'}, loadAjax);
</script>
<? } ?>