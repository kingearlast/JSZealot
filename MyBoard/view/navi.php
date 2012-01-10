<div id="memberMenu" class="login inner">
	<?	if($loginID != "") { ?>
	<span><?=$loginID?> 님 환영합니다.</span>
	<form action="model/member/logout.php" method="post">
		<input type="submit" value="로그아웃" id="loginoutBtn" />
	</form>
	<?}else {?>
	<form action="model/member/login.php" method="post">
		<fieldset>
			<ul>
				<li><label for="id">&nbsp; &nbsp; ID </label><input type="text" size="13" name="id" id="id" /></li>								
				<li><label for="pwd">PWD </label><input type="password" size="13" name="pwd" id="pwd" /></li>
				<li>
					<input type="submit" value="로그인" id="loginBtn" />
					<input type="button" value="회원가입" id="joinBtn" />
				</li>								
			</ul>
		</fieldset>
	</form> 
	<?}?>
</div>	
<div class="menu inner">
	<a href="#none" id="boardMenu">게시판</a>
</div>	