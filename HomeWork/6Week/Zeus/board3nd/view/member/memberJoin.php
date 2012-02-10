<?
include "../../header.php";
?>

<div id="sub_img_member"></div>
<div class="clear"></div>
<div id="nav_sub_menu">
	<ul>
		<li>
			<a href="memberJoin.php">Join</a>
		</li>
		<li>
			<a href="memberLogin.php">Login</a>
		</li>
	</ul>
</div>
<div id="article_join">
	<h1>Join Us</h1>
	<form method="post" action="../../model/member/join.php" id="join">
		<fieldset>
			<legend>
				Basic Info
			</legend>
			<label>User Id</label>
			<input name="id" type="text" id="userId">
			<br>
			<label>Password</label>
			<input name="password" type="password" id="password1">
			<br>
			<label>Retype Password</label>
			<input name="password2" type="password" id="password2">
			<br>
			<label>Name</label>
			<input name="name" type="text" id="name">
			<br>
			<label>E-Mail</label>
			<input name="email" type="text" id="email">
			<br>
		</fieldset>
		<div class="clear"></div>
		<div id="buttons">
			<input type="submit" value="Comfirm" id="joinBtn" disabled="false" >
			<input type="reset" value="Reset" >
			<span> <a href="../../index.html">Cancel</a> </span>
		</div>
	</form>
</div>
<script>
	var userIdValid = false;
	var passwordValid = false;
	var nameValid = false;
	
	$('#userId').change(checkUserId);
	$('#password2').change(checkPassword);
	$('#name').change(checkName);
	$('#joinBtn').attr('disabled', true);
	
	function checkUserId() {
		$('#userId').removeClass();
		$('#userId').addClass('searching');
		
		$.ajax({
			url: 'http://localhost/model/member/checkId.php',
			type: "POST",
			data: {id : $("#userId").val()},
			success: function (data) {
				if(data == "okay") {
					$('#userId').removeClass();
					$('#userId').addClass('approved');
					userIdValid = true;
				} else {
					$('#userId').removeClass();
					$('#userId').addClass('denied');
					$('#userId').focus();
					$('#userId').select();
					userIdValid = false;
				}
				checkFormStatus();
			}			
		})
	}

	function checkPassword() {		
		$('#password1').removeClass();
		$('#password2').removeClass();
		
		$('#password1').addClass('searching');
		
		if(($('#password1').val().length == 0) || ($('#password1').val() != $('#password2').val() )) {
			$('#password1').removeClass();
			$('#password1').addClass('denied');
			return;
		}

		$('#password1').removeClass();
		$('#password1').addClass('approved');
		passwordValid = true;
		checkFormStatus()
	}
	
	function checkName(){
		$('#name').removeClass();
		$('#name').addClass('searching');
		
		if($('#name').val().length == 0){
			$('#name').removeClass();
			$('#name').addClass('denied');
			nameValid = false;
		}
		else {
			$('#name').removeClass();
			$('#name').addClass('approved');
			nameValid = true;
		}
		
		checkFormStatus()
	}

	function checkFormStatus() {
		if(userIdValid && passwordValid && nameValid) {
			$('#joinBtn').removeAttr('disabled');
		} else {
			$('#joinBtn').attr('disabled', true);			
		}
	}

</script>
<?
	include "../../footer.php";
?>