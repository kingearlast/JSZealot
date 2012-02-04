<? include "../../header.php"; ?>
<? include "../../model/member/getInfoUpdate.php"; ?>

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
							<input type="submit" value="Update" id="updateInfoBtn"/>
						</span>
						<span>
							<input type="button" value="Cancel" onClick="history.go(-1)" />
						</span>
					</div>
				</form>
			</div>
<script>
	$('#updateInfoBtn').click(checkInfo);
	
	function checkInfo() {
	if(($('.password').val() == "" ) || ($('.name').val() == "" ) || ($('.email').val() == "" )) {
		alert("빈 칸 없이 채워 주세요.");
		return false;
	}
};
</script>
<? include "../../footer.php"; ?>