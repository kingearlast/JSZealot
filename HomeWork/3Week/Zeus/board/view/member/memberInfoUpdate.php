<? include "../../header.php"; ?>
<?php 
	session_start();
	include_once('../../common/db.php');
	
	$id = $_SESSION['id'];
	
	$sql = "SELECT * from member where id = '$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$password = $row['password'];
	$name = $row['name'];
	$email = $row['email'];
?>
	
			
			<div id="sub_img_member"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="join.html">Join</a></li>
		    	</ul>   
		  	</div>

			<div id="article_join">
				<h1>InfoView</h1>
				<form id="join" action="http://localhost/model/member/infoUpdate.php" method="POST">
					<fieldset><legend>Basic Info</legend>
						<label>User Id</label><input name="id" type="text" class="id" value="<?= $id ?>" disabled="disabled" ><br>
						<label>Password</label><input name="password" type="text" class="password" value="<?= $password ?>" ><br>
						<label>Name</label><input name="name" type="text" class="password" value="<?= $name ?>" ><br>
						<label>E-Mail</label><input name="email" type="text" class="password" value="<?= $email ?>"><br>
					</fieldset>
					
					<div class="clear"></div>	
					
					<div id="buttons">						
						<span>
							<!--<a href="memberStatus.html">Confirm</a>-->
							<input type="submit" value="Update" />
						</span>
						<span>
							<!--<a href="memberInfoView.html">Cancel</a>-->
							<input type="button" value="Cancel" onClick="history.go(-1)" />
						</span>
					</div>
				</form>
			</div>

<? include "../../footer.php"; ?>