<div>
	<form action="/board/get.php" method="post">
		<fieldset>
			<input name="writerId" type="hidden"/>
			<input name="category" type="hidden"/>
			<input id="bbsSubject" name="bbsSubject" type="text" size="50" maxlength="50" placeholder="글제목을 입력하세요" autofocus="true" /><br/>
			<textarea id="bbsContent" name="bbsContent" cols="50" rows="20" placeholder="글내용을 입력하세요"></textarea><br/><!-- width height 조정필요-->		
			<input type="submit" value="확인" />
		</fieldset>
	</form>
</div>