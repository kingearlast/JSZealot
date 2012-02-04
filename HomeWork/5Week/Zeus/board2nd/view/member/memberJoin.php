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
			<input type="submit" value="Comfirm" id="joinBtn">
			<input type="reset" value="Reset" >
			<span> <a href="../../index.html">Cancel</a> </span>
		</div>
	</form>
</div>
<script>
	var userIdValid = false;
	var passwordValid = false;

	document.getElementById("userId").onblur = checkUserId;
	document.getElementById("password2").onblur = checkPassword;
	document.getElementById("joinBtn").disabled = true;

	function checkUserId() {
		document.getElementById("userId").className = "searching";
		request = createRequest();
		if(request == null)
			alert("Unable to create request");
		
		else {
			var theName = document.getElementById("userId").value;
			var id = escape(theName);
			var url = "http://localhost/model/member/checkId.php?id=" + id;
			request.onreadystatechange = showUserIdStatus;
			request.open("GET", url, true);
			request.send(null);
		}
	}

	function checkPassword() {
		var password1 = document.getElementById("password1");
		var password2 = document.getElementById("password2");
		password1.className = "searching";

		if((password1.value == "") || (password1.value != password2.value)) {
			password1.className = "denied";
			return;
		}

		password1.className = "approved";
		passwordValid = true;
		checkFormStatus()
	}

	function showUserIdStatus() {
		if(request.readyState == 4) {
			if(request.status == 200) {
				if(request.responseText == "okay") {
					document.getElementById("userId").className = "approved";
					userIdValid = true;
				} else {
					document.getElementById("userId").className = "denied";
					document.getElementById("userId").focus();
					document.getElementById("userId").select();
					userIdValid = false;
				}
				checkFormStatus();
			}
		}
	}

	function checkFormStatus() {
		if(userIdValid && passwordValid) {
			document.getElementById("joinBtn").disabled = false;
		} else {
			document.getElementById("joinBtn").disabled = true;
		}
	}

	function createRequest() {
		try {
			request = new XMLHttpRequest();
		} catch (tryMS) {
			try {
				request = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (otherMS) {
				try {
					request = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (failed) {
					request = null;
				}
			}
		}
		return request;
	}
</script>
<?
	include "../../footer.php";
?>