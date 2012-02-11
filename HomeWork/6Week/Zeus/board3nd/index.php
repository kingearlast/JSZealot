<? include "./header.php"; ?>
<? include_once './common/db.php'; ?>

			<div id="main_img">
				<img src="resources/images/main_img1.jpg" width="971" height="282">
			</div>
			
			<div id="article_front">
				<div id="solution">
					<div id="hosting">
						<h3>HTML5</h3>
							<p>HTML5 is a language for structuring and presenting content for the World Wide Web, 
								and is a core technology of the Internet originally proposed by Opera Software</p>
					</div>
					<div id="security">
						<h3>CSS3</h3>
							<p>Cascading Style Sheets (CSS) is a style sheet language used to describe the presentation semantics
								of a document written in a markup language. 
							</P>
					</div>
					<div id="payment">
						<h3>JavaScript</h3>
							<p>JavaScript is a prototype-based scripting language that is dynamic, weakly typed and has first-class functions. 
								It is a multi-paradigm language, supporting object-oriented, imperative, and functionalprogramming styles.</p>
					</div>
				</div>
				
				<div class="clear"></div>
			
				<div id="visitTable">
					<h3><span class="orange">Visited</span> Members</h3>
					<table>
							<tr>
								<td>N a m e</td>
								<td>V i s i t   C o u n t</td>
							</tr>
							<?php
							  $query = "SELECT * from member ORDER BY visit_count desc limit 5";
							  $result = mysql_query($query);
							  while($row = mysql_fetch_array($result)) {
							   $id = $row['id'];
							   $visitCount = $row['visit_count'];
							   ?><tr>
							   		<td class="contxt"><?=$id?></a></td>
							   		<td><?=$visitCount?></td>
							   	</tr>
							   <?
							  }
 				 			?>
						</table>
				</div>
				
				<div id="news_notice">
					<h3 class="brown">News &amp; Notice</h3>
						<table>
							<tr>
								<td>T i t l e</td>
								<td>D a t e</td>
							</tr>
							<?php
							  //$query = "SELECT * FROM board ORDER BY seq DESC";
							  $query = "SELECT * from board ORDER BY reg_date desc limit 5";
							  $result = mysql_query($query);
							  while($row = mysql_fetch_array($result)) {
							   $seq = $row['seq'];
							   $title = $row['title'];
							   $date = $row['reg_date'];
							   ?><tr>
							   		<td class="contxt"><a href = 'http://localhost/view/board/boardRead.php?seq=<?=$seq?>'><?=$title?></a></td>
							   		<td><?=$date?></td>
							   	</tr>
							   <?
							  }
 				 			?> 
						</table>
				</div>
			</div>
			
<? include "./footer.php"; ?>