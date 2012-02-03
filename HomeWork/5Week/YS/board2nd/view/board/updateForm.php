<?php
include_once '../../common/connect.php';
@extract($_GET);

$sql = "SELECT * FROM board WHERE seq = $seq";
$result = mysql_query($sql, $connect);

$list = mysql_fetch_array($result);
?>

<div>
	<h2>게시물 수정</h2>
	<form action="../model/board/update.php?seq=<?= $seq ?>" method="POST">
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
					<textarea name="content" id="content"  cols="44" rows="9"><?= $list[content] ?></textarea>
				</td>
			</tr>
			<tr>
				<td >
					<input type="submit" value="수정" class="button" />
					<a id="seq<?= $seq ?>" class="button">취소</a>
<script>
	$('#seq<?= $seq ?>').on('click', {url: './board/readDetail.php?seq=<?= $seq ?>'}, loadAjax);
</script>
				</td>
			</tr>
		</table>
	</form>
</div>