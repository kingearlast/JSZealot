<?php
include_once '../../common/connect.php';
include_once '../../common/session.php';

$id = $loginID;

$sql = "SELECT * FROM member WHERE id = '$id'";
$result = mysql_query($sql, $connect);

$list = mysql_fetch_array($result);
?>


<h3>회원 정보</h3>
<div>
	<form action="../model/member/infoUpdate.php" method="post">
		<label for="id">ID</label> : <input id="id" name="id" type="text" value="<?= $list[id] ?>" disabled="disabled" /><br />
		<label for="pwd">password</label> : <input id="pwd" name="pwd" type="password"  value="" required="required" /> <br />
		<label for="pwdConfirm">password Confirm</label> : <input id="pwdConfirm" name="pwdConfirm" type="password" value="" required="required" />
		<span id="checkPWD" style="color: red;"></span>  <br />
		<label for="name">name</label> : <input id="name" name="name" type="text" value="<?= $list[name] ?>" required="required" /> <br />
		<label for="email">email</label> : <input id="email" name="email" type="email" value="<?= $list[email] ?>"required="required" /> <br />
		<input type="submit" value="Update" class="button" /> 
	</form>
</div>

<script>
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