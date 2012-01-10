function bindMenuEvent() {
	$("#boardMenu").click(loadBoardList);
	$('#joinBtn').click(loadJosinForm);
}

function loadJosinForm() {
	$('#contWrap').load('view/member/join_form.php', function(){
		$('#IDCheckBtn').click(checkDuplicateID);
		$('#joinSubmit').click(joinFormValidate);
	});
}

function loadBoardList() {
	$('#contWrap').load("view/board/list.php", function(){
		$('#writeLinkBtn').click(loadWriteForm);
	});
}

function loadWriteForm() {
	$("#contWrap").load('view/board/write_form.php');
}

function joinFormValidate() {
	var isIDUseful = false;
	var errorCount = 0;
	var emptyErrorMessage = "필수 입력 항목입니다.";
	
	var $form = $('#memberJoinForm');
	
	if($('#memberID').parent().find(".message").text() != "사용 가능") {
		errorCount++;
		$('#memberID').parent().find(".message").text("아이디 중복 체크를 해주세요.");
	}
	
	if($form.find('#pwd').val() != $form.find('#pwdConfirm').val()) {
		errorCount++;
		$form.find('#pwdConfirm').next('.message').text("비밀번호와 동일한 값을 입력해야 합니다.");
	}
	
	$form.find('.notNull').each(function(){
		if($(this).val() == "") {
			errorCount++;
			$(this).next('.message').text(emptyErrorMessage);
		}
	});
	
	if(errorCount > 1) {
		return false;	
	}
	return true;
}

function checkDuplicateID() {
	var $memberID = $('#memberID');
	var id = $memberID.val();
	$.get('model/member/check_id.php?id='+id, function(data){
		if(data == "success") {
			$memberID.parent().find(".message").text("사용 가능");
		}else {
			$memberID.parent().find(".message").text("사용 불가능");
		}
	});
}
