<?
	session_start();
	$logon = $_SESSION['logon'];
?>
<h1>글쓰기</h1>
<form id="writeForm">
<table id="boardWrite" id="writeForm">
	<tr>
		<th><label for="title">제목</label></th>
		<td><input type="text" name="title" id="title" /></td>
	</tr>
	<tr>
		<th><label for="content">내용</label></th>
		<td><textarea name="content"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" class="button">
			<input type="submit" value="글쓰기" id="writeIngBtn" />
			<input type="button" value="취소" id="writeCancelBtn" />
		</td>
	</tr>
</table>
</form>
