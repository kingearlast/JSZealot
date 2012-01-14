<table border="1" summary="상세보기">
	<caption>상세보기</caption>
	<tr>
		<th>번호 : </th>
		<td><?= $board->seq; ?></td>
		<th>제목 : </th>
		<td><?= $board->title; ?></td>
		<th>분류 : </th>
		<td><?= $board->categoryId; ?></td>
		<th>작성자ID : </th>
		<td><?= $board->writerId; ?></td>
	</tr>
	<tr>
		<th>내용 : </th>
		<td colspan="7">
			<?= $board->content; ?>
		</td>
	</tr>
	<tr>
		<th >작성일자 : </th>
		<td colspan="3"><?= $board->regDate; ?></td>
		<th>조회수 : </th>
		<td colspan="3"><?= $board->visitCount; ?></td>
	</tr>
	<?
	if ( $_SESSION["isLogin"] && ($board->writerId == $_SESSION["id"]) ){
	?>
	<tr>
		<th colspan="8"><a id="updateBoardFormLink" href="/board/board/updateForm.php?seq=<?= $board->seq; ?>">수정</a> || <a id="deleteBoardLink" href="/board/board/delete.php?seq=<?= $board->seq; ?>">삭제</a></th>
	</tr>
	<?		
	}
	?>
	<tr>
		<th colspan="8"><a href="/board/index.php">홈으로..</a></th>
	</tr>
	
</table>
