<h3>회원 가입</h3>
<div>
	<form action="../model/member/join.php" method="post">
		<label for="id">ID</label> : <input id="id" name="id" type="text" value="" required="required" />
		<span id="checkID" style="color: red;"></span> <br />
		<label for="pwd">password</label> : <input id="pwd" name="pwd" type="password"  value="" required="required" /> <br />
		<label for="pwdConfirm">password Confirm</label> : <input id="pwdConfirm" name="pwdConfirm" type="password" value="" required="required" />
		<span id="checkPWD" style="color: red;"></span>  <br />
		<label for="name">name</label> : <input id="name" name="name" type="text" value="" required="required" /> <br />
		<label for="email">email</label> : <input id="email" name="email" type="email" required="required" /> <br />
		<input type="submit" value="Join" /> 
	</form>
</div>

<script>
	$("#id").blur(function () {
		console.log('out id');
		$.ajax({
			url: '../model/member/checkID.php',
			type: "POST",
			data: {id : $("#id").val()},
			success: function (data) {
				$('#checkID').html(data);
			}
		})
	});
	
	$("#pwd").blur(checkPWD);
	$("#pwdConfirm").blur(checkPWD);
	
	function checkPWD() {
		var pwd = $('#pwd').val();
		var pwdConfirm = $('#pwdConfirm').val();
		console.log('out pwd');
		if (pwd == pwdConfirm) {
			$('#checkPWD').html('pwd가 일치');
		} else{
			$('#checkPWD').html('pwd가 일치안함');
		};
	}
</script>