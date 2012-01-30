<? include "../../header.php"; ?>
<? include "../../model/member/infoView.php"; ?>
			
			<div id="sub_img_member"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="join.html">Join</a></li>
		    	</ul>   
		  	</div>

			<div id="article_join">
				<h1>InfoView</h1>
				<form id="join">
					<fieldset><legend>Basic Info</legend>
						<label>User Id</label><input name="" type="text" class="id" value="<?= $id ?>" disabled="disabled"><br>
						<label>Password</label><input name="*" type="text" class="password" value="<?= $password ?>" disabled="disabled"><br>
						<label>Name</label><input name="" type="text" class="password" value="<?= $name ?>" disabled="disabled"><br>
						<label>E-Mail</label><input name="" type="text" class="password" value="<?= $email ?>" disabled="disabled" ><br>
					</fieldset>
					
					<div class="clear"></div>	
					
					<div id="buttons">						
						<span>
							<a href="./memberInfoUpdate.php">Info Update</a>
						</span>
						<span>
							<a href="../../model/member/dropOut.php">Drop out</a>
						</span>
						<span>
							<a href="../../index.php">Go to Main</a>
						</span>
					</div>
				</form>
			</div>

<? include "../../footer.php"; ?>