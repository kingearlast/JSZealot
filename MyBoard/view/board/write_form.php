<? include_once '../../common/session.php'; ?>
<div class="memberJoinForm inner">
	<form action="model/board/write.php" method="post" id="boardWriteForm">
		<table border="1">
			<tr>
				<th>제 목</th>
				<td>
					<input type="text" size="20" maxlength="30" name="title" id="title"/>					
				</td>
			</tr>
			<tr>
				<th>내 용</th>
				<td>
					<textarea name="cont"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" value="<?=$loginID?>" name="memberID" />
					<input type="submit" id="writeSubmit" value="쓰기" />
					<input type="reset" value="취소" />
				</td>
			</tr>
		</table>
	</form>
</div>	