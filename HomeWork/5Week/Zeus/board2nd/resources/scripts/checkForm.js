$(document).ready(function() {
	$('#loginBtn').click(checkLogin);
	$('#joinBtn').click(checkJoin);
	$('#writeBtn').click(checkWrite);
	$('#updateInfoBtn').click(checkInfo);
});
function checkWrite() {
	if(($('#title').val() == "" ) || ($('#title').val() == " " )) {
		alert("제목을 입력해주세요");
		return false;
	} else {
		alert("글 작성 완료");
		return true;
	}
};

function checkInfo() {
	if(($('.password').val() == "" ) || ($('.name').val() == "" ) || ($('.email').val() == "" )) {
		alert("빈 칸 없이 채워 주세요.");
		return false;
	} else {
		alert("변경완료");
		return true;
	}
};

function checkJoin() {
	if(($('.name').val() == "" ) || ($('.email').val() == "" )) {
		alert("빈 칸 없이 채워 주세요.");
		return false;
	} else {
		alert("회원가입 완료");
		return true;
	}
};