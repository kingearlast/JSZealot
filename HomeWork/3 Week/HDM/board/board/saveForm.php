<form action="/board/save.php" method="post">
	<fieldset>
		<input name="id" type="hidden" value="<?= $_GET["id"]; ?>"/>
		<input name="category" type="hidden"/>
		<input name="title" type="text" size="50" maxlength="50" placeholder="글제목을 입력하세요" autofocus="true" /><br/>
		<textarea name="content" cols="50" rows="10" placeholder="글내용을 입력하세요"></textarea><br/><!-- width height 조정필요-->		
		<input type="submit" value="작성" />
	</fieldset>
</form>
