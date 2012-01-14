<? include "../../header.php"; ?>
			
			<div id="sub_img_member"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="memberJoin.php">Join</a></li>
		            <li> <a href="memberLogin.php">Login</a></li>
		    	</ul>   
		  	</div>

			<div id="article_join">
				<h1>Join Us</h1>
				<form method="post" action="../../model/member/join.php" id="join">
					<fieldset><legend>Basic Info</legend>
						<label>User Id</label><input name="id" type="text" class="id"><br>
						<label>Password</label><input name="password" type="text" class="password"><br>
						<label>Retype Password</label><input name="password" type="text" class="password"><br>
						<label>Name</label><input name="name" type="text" class="name"><br>
						<label>E-Mail</label><input name="email" type="text" class="email"><br>
					</fieldset>
					
					<div class="clear"></div>	
					
					<div id="buttons">
						<input type="submit" value="Comfirm" >
						<input type="reset" value="Reset" >
						<span>
							<a href="../../index.html">Cancel</a>
						</span>
					</div>
				</form>
			</div>

<? include "../../footer.php"; ?>