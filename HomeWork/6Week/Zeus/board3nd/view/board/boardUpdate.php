<? include "../../header.php"; ?>
<? include "../../model/board/getUpdate.php"; ?>

		<div id="sub_img"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="./boardList.php">Board</a></li>
		    	</ul>   
		  	</div>

			<div id="article_contents">
				<h1>DataChange</h1>
				<form action="../../model/board/setUpdate.php?seq=<?=$seq?>" method="post">
					<table id="readBoard">
					  	<tr>
					  		<th><label for="seq">Seq</th>
					  		<td><?=$seq?><input type="hidden" name="seq" value="<?=$seq?>" /></td>
							<th><label for="Writer_id">Writer</label></th>
							<td><?=$WRITER?></td>
							<th><label for="reg_date">Date</label></th>
							<td><?=$DATE?></td>
							<th><label for="read_count">Read</label></th>
							<td><?=$COUNT?></td>
						</tr>
						<tr>
							<th>
								<label for="title">Title</label>
							</th>
							<td>
								<input type="text" name="title" id="title" value="<?=$TITLE?>" size="64" />
							</td>
						</tr>
						<tr>
							<th>
								<label for="content">content</label>
							</th>
							<td>
								<textarea name="content" id="content"  cols="50" rows="9"><?=$CONTENT?></textarea>
							</td>
						</tr>
						<tr>
							<td>							
							</td>
							<td id="ButtonUpdate">
								<input type="submit" value="Update" onclick="checkWrite();"/>
								<input type="button" value="Cancel" onClick="history.go(-1)" />
							</td>
						</tr>
					</table>
				</form>
			</div>

<? include "../../footer.php"; ?>