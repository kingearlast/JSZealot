/*window.onload = initPage;

var userIdValid = false;
var passwordValid = false;

function initPage() {
	document.getElementById("userId").onblur = checkUserId;
	document.getElementById("password2").onblur = checkPassword;
	document.getElementById("joinBtn").disabled = true;
}

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
}*/