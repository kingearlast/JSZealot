	<?php 
	session_start();
	
	if($_SESSION['nickname'] != "") { 
	?>
		<span><?php echo $_SESSION['nickname'];?> 님 Hi~</span>
		<br />
		<!--<form method="get" action="http://localhost/view/member/memberInfoView.php">
			<input type="hidden" name="id" value="<? $_SESSION['id'] ?>" />
			<input type="submit" value="ViewInfo" />
		</form>-->
		<a href="http://localhost/view/member/memberInfoView.php">ViewInfo</a>		
		<form method="post" action="http://localhost/model/member/logout.php">
			<input type="submit" value="Logout" />
		</form>
	<?php }
	else {
	?>
		<a href="http://localhost/view/member/memberLogin.php">login<a> | <a href="http://localhost/view/member/memberJoin.php" >Join</a>
	<?php }
	?>	