function checkID() {
	var userID = $('#userID').val();

	$.get('model/memberIdCheck.php?userID='+userID, function(data) {
		if(data == "fail" || userID == "") {
			$('#confirm').attr('class','fail');
			$('#confirm').text('사용불가');
			checkIDBtn = false;
		}
		else {
			$('#confirm').attr('class','success');
			$('#confirm').text('사용가능');
			checkIDBtn = true;
		}
	});
}
function checkForm() {
	if($(this).val().length == 0) {
		var strID = $(this).attr('id');
		var strLabel = $('label[for='+strID+']').text();
		
		if(strID == 'userID') {
			$(this).next().next().attr('class', 'fail');
			$(this).next().next().text(strLabel + ' 미입력');
		}
		else {
			$(this).next().attr('class', 'fail'); // 요건 css로 하는게 더 좋을덧
			$(this).next().text(strLabel + ' 미입력');
		}
	}
	
	if(($(this).attr('id') == 'userPwdCon') && ($(this).val().length != 0)) {
		if($(this).val() != $('#userPwd').val()) {
			$(this).next().css('color', 'red');
			$(this).next().text('입력한 비밀번호와 일치하지 않습니다');
		}
	}
}
function clearMessage() {
	$(this).next().text("");
}

function loadMemberInfo() {
	$('#content').load('view/memberInfo.php');
}
function loadMemberDrop() {
	$('#content').load('view/memberDrop.php');
	$('#side').load('view/navy.php')
}