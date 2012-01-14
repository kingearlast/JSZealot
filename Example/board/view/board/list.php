<? include_once '../../common/session.php'; ?>
<? include_once '../../model/board/read_list.php'; ?>
<div class="board inner">
	<table>
		<tr>
			<th>번 호</th>
			<th>작성자</th>
			<th>제 목</th>
		</tr>
		<? for($j = 0; $j < count($contArray); $j++) { ?>
		<tr>
			<td><a><?= $contArray[$j]->index ?></a></td>
			<td><a><?= $contArray[$j]->writer ?></a></td>
			<td><a href="/board/view/board/detail.php?seq=<?=$contArray[$j]->index?>"><?= $contArray[$j]->title ?></a></td>
		</tr>
		<? } ?>
	</table>
	<? if($loginID != "") { ?>
	<input type="button" value="글쓰기" id="writeLinkBtn" />
	<? } ?>
</div>