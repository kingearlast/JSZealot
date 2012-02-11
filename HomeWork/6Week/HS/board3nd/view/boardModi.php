<?
	session_start();
	@extract($_GET);
	$logon = $_SESSION['logon'];
	include_once('../common/connect.php');

	$query = "SELECT * FROM board WHERE seq=".$no;
	$result = mysql_query($query);
	$data = mysql_fetch_array($result);
?>
<h1>글수정</h1>
<form id="modiForm">
<table id="boardWrite">
	<input type="hidden" name="no" value="<?=$no?>" />
	<tr>
		<th><label for="title">제목</label></th>
		<td><input type="text" name="title" id="title" value="<?=$data[title]?>" /></td>
	</tr>
	<tr>
		<th><label for="content">내용</label></th>
		<td><textarea name="content"><?=$data[content]?></textarea></td>
	</tr>
	<tr>
		<td colspan="2" class="button">
			<input type="submit" value="수정" />
			<input type="button" value="취소" id="writeCancelBtn" />
		</td>
	</tr>
</table>
</form>
