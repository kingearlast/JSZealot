<? include "../../header.php"; ?>
<? include "../../model/board/read.php"; ?>

			
			<div id="sub_img"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="./boardList.php">Board</a></li>
		    	</ul>   
		  	</div>

			<div id="article_contents">
				<h1>Read</h1>
				<table id="readBoard">
				  	<tr>
				  		<th><label for="seq">Seq</label></th>
				  		<td><?= $seq ?></td>
						<th><label for="writer">Writer</label></th>
						<td><?= $NAME ?></td>
						<th><label for="regDate">Date</label></th>
						<td><?= $DATE ?></td>
						<th><label for="visitCount">Read</label></th>
						<td><?= $COUNT ?></td>
					</tr>
					<tr>
						<th><label for="title">Title</label></th>
						<td colspan="5"><?= $TITLE ?></td>
					</tr>
					<tr>
						<th><label for="content">Content</label></th>
						<td colspan="5">
							<?= $CONTENT ?>
						</td>
					</tr>
					<tr id="ButtonRead">
						<td>	
							<span>
								<a href="./boardList.php">ViewList</a>
							</span>						
						</td>
						<?php
							if($_SESSION['id'] == $WRITER){
								?><td><span><?php echo "<a href = 'http://localhost/view/board/boardUpdate.php?seq=$seq'>Update</a>";?>	</span></td>
									<td><span><?php echo "<a href = 'http://localhost/model/board/delete.php?seq=$seq'>Delete</a>";?></span></td><?
							}
						?>
						<!--<td>							
							<span><?php
								echo "<a href = 'http://localhost/view/board/boardUpdate.php?seq=$seq'>Update</a>";?>
							</span>							
						</td>
						<td>
							<span><?php
								echo "<a href = 'http://localhost/model/board/delete.php?seq=$seq'>Delete</a>";?>
							</span>	
						</td>-->
					</tr>
				</table>
			</div>

<? include "../../footer.php"; ?>