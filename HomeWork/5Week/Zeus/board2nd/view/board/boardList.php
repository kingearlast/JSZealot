<? include "../../header.php"; ?>
<? include_once('../../common/db.php'); ?>
			
			<div id="sub_img"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="./boardList.php">Board</a></li>
		    	</ul>   
		  	</div>

			<div id="article_contents">
				<h1>Board</h1>
				<table id="freeBoard">
				  <tr>
				    <th scope="col" class="tno" >no.</th>
				    <th scope="col" class="ttitle" label for="title">title</th>
				    <th scope="col" class="twrite" label for="writer">writer</th>
				    <th scope="col" class="tdate" label for="date">date</th>
				    <th scope="col" class="tread" label for="readCount">read</th>
				  </tr>
				  <?php
					  //$query = "SELECT * FROM board ORDER BY seq DESC";
					  $query = "SELECT * FROM board";
					  $result = mysql_query($query);
					  while($row = mysql_fetch_array($result))
					  {
					   $seq = $row['seq'];
					   $title = $row['title'];
					   $name = $row['name'];
					   $date = $row['reg_date'];
					   $read = $row['read_count'];
					   echo(
					  	 "<tr><td>$seq</td><td><a href = 'http://localhost/view/board/boardRead.php?seq=$seq'>$title</a></td><td>$name</td><td>$date</td><td>$read</td></tr>");
					  	}
 				 ?> 				                   
				</table>
				<?php					
					if($_SESSION['nickname'] != ""){
						echo "<div id='buttonWrite'><a href='./boardWrite.php'><span>Write</span></a></div>";
					}
				?>
				<div id="search_table">
					<form>
						<span>
							<label for="kind"></label>
							<select name="kind" id="kind">
								<option value="">== select ==</option>
								<option value="title">Title</option>
								<option value="content">Content</option>
								<option value="writer">WriterName</option>								
							</select>
						</span>
						<span>
							<label for="search"></label>
							<input type="text" name="str" id="str"/>
						</span>
						<span>
							<input type="submit" value="Search" />
						</span>
					</form>
				</div>
				
			</div>

<? include "../../footer.php"; ?>