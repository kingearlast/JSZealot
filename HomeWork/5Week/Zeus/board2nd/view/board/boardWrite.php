<? include "../../header.php"; ?>
			
			<div id="sub_img"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="./boardList.php">Board</a></li>
		    	</ul>   
		  	</div>

			<div id="article_contents">
				<h1>Write</h1>
				<form action="../../model/board/write.php" method="post">
					<table id="writeBoard">
					   <tr>
							<th>
								<label for="writer">Writer</label>
							</th>
							<td>
								<input type="text" name="nickname" id="writer" value="<?= $_SESSION['nickname'] ?>" disabled="disabled" />
								<input type="hidden" name="writer" id="writer" value="<? $_SESSION['id'] ?>" />	
							</td>
						</tr>
						<tr>
							<th>
								<label for="title">Title</label>
							</th>
							<td>
								<input type="text" name="title" id="title" value=" " size="64" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="content">content</label>
							</th>
							<td>
								<textarea name="content" id="content"  cols="50" rows="9"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								
							</td>
							<td>
								<input type="submit" value="Write" id="writeBtn" />
								<span>
									<a href="./boardList.php">Cancel</a>
								</span>
							</td>
						</tr>             
					</table>
				</form>
			</div>
<script>
	$('#writeBtn').click(checkWrite);
	
	function checkWrite() {
	if(($('#title').val() == "" ) || ($('#title').val() == " " )) {
		alert("제목을 입력해주세요");
		return false;
	} else {
		alert("글 작성 완료");
		return true;
	}
};
</script>
<? include "../../footer.php"; ?>