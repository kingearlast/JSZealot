<? include "../../header.php"; ?>
			
			<div id="sub_img"> </div>
			
			<div class="clear"></div>
			
			<div id="nav_sub_menu">
		        <ul>
		            <li> <a href="./memberJoin.php">Join</a></li>
		    	</ul>   
		  	</div>

			<div id="article_login">
				<h1>Login</h1>
				<form id="login" method="post" action="../../model/member/login.php">
					<fieldset>
						<label>User Id</label><input type="text" name="id" class="id"><br>
						<label>Password</label><input type="password" name="password" class="password"><br>
					</fieldset>
					
					<div class="clear"></div>	
					
					<div id="buttons">
						<input type="submit" value="Login" id="loginBtn">
						<span>
							<a href="../../index.php">Cancel</a>	
						</span>
					</div>
				</form>
			</div>

<? include "../../footer.php"; ?>   