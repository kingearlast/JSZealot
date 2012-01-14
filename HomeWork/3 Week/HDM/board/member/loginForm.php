<?
	if ( isset($_SESSION["isLogin"])){ 
	?>
		<div class="login">
			<form action="/board/member/logout.php" method="get">
				<fieldset>
					<span><?= $_SESSION["name"] ?> 님</span>
					<input type="submit" value="로그아웃" />
				</fieldset>
			</form>
		</div>
		<div class="">
			<form action="/board/member/updateForm.php" method="get">
				<fieldset>
					<input id="updateMemberBtn" type="submit" value="정보수정"/>
				</fieldset>
			</form>
		</div>
	<?	
	}else { 
	?>
		<div class="login">
			<form action="/board/member/login.php" method="post">
				<fieldset>
					<input name="id" type="text" size="10" maxlength="15" placeholder="ID" autofocus="true"/>
					<input name="saveId" id="saveId" type="checkbox" /><label for="saveId">ID저장</label>
					<input name="password" type="password" size="10" maxlength="15" placeholder="PASSWORD" />
					<input type="submit" value="로그인" />
				</fieldset>
			</form>
		</div>
		<div class="">
			<a href="/board/member/findIdForm.php">ID찾기</a>
			<a href="/board/member/findPasswordForm.php">PASSWORD찾기</a><br/>
			<a id="saveMemberLink" href="/board/member/saveForm.php">회원가입</a>
		</div>
	<? 	
	}
?>





