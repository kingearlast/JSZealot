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
				<!--
				<form id="login" method="post" action="../../model/member/login.php">-->
				<form id="login">
					<fieldset>
						<label>User Id</label><input type="text" name="id" class="id"><br>
						<label>Password</label><input type="password" name="password" class="password"><br>
					</fieldset>
					
					<div class="clear"></div>	
					
					<div id="buttons">
						<input type="button" value="Login" id="loginBtn">
						<span>
							<a href="../../index.php">Cancel</a>	
						</span>
					</div>
				</form>
			</div>
<script>
	$('#loginBtn').click(checkLoginId);
	
	function checkLoginId(){
		$.ajax({
			url: 'http://localhost/model/member/login.php',
			type: "POST",
			data: {id : $(".id").val(),
				   password : $(".password").val()},
			success: function (data) {
				if(data == 'okay') {
					location.replace('../../index.php');
				} else {
					alert("Id or Password를 확인해주세요.");
				}
			}
			
		})
	}
	
</script>
<? include "../../footer.php"; ?>   