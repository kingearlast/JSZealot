<?
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	extract($_GET);
	
	$sql = "SELECT * FROM BOARD WHERE seq = '$seq'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$board = setBoard($row);
?>
<form action="/board/update.php" method="post">
	<fieldset>
		<input name="seq" type="hidden" value="<?= $board->seq; ?>"/>
		<input name="title" type="text" size="50" maxlength="50" placeholder="글제목을 입력하세요" autofocus="true" value="<?= $board->title; ?>"/><br/>
		<textarea name="content" cols="50" rows="10" placeholder="글내용을 입력하세요"><?= $board->content; ?></textarea><br/><!-- width height 조정필요-->		
		<input type="submit" value="수정" />
	</fieldset>
</form>
<span><a href="/index.php">홈으로..</span>
