$(document).ready(init);
var checkIDBtn = false;
function init() {
	$('#joinBtn').click(loadJoinForm);
	$('#memberInfor').click(loadMemberInfo);
	$('#memberDrop').click(loadMemberDrop);
	$('#boardMenu').click(loadBoardList);
}

/* 회원 */
function loadJoinForm() {
	$('#content').load('view/joinForm.php', function(){
		$('#checkID').click(checkID);
		$('#joinForm').delegate('input', 'blur', checkForm);
		$('#joinForm').delegate('input', 'focus', clearMessage);
		$('#joinForm').submit(function(event) {
			var checkText = true;
			$('#joinForm input[type=text]').each(function() {
				var text = $(this).val();
				if(text == "") {
					checkText = false;
				}
			});
			
			if(checkText == false) {
				alert('모든 칸을 채워주세요.');
				event.preventDefault();
			}
			else if(checkIDBtn == false) {
				alert('중복확인 버튼을 눌려주세요.');
				event.preventDefault();
			}
		});
	});
}
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

/* 게시판 */
function loadBoardList() {
	$('#content').load('view/boardList.php', function(){
		$('#boardList .title a').click(readBoard);
		$('#boardWriteBtn').click(loadBoardWrite);	
		$('#searchForm').submit(function(event) {
			event.preventDefault();
			var param = $('#searchForm').serialize();
			loadSeachList(param);
		});
	
	});
}
/* 임시 야매로........ 이방법말고 딴방법을 생각해보자 ㅠㅠㅠㅠ */
function loadSeachList(param) {
	$('#content').load('view/boardList.php?'+param, function(){
		$('#boardList .title a').click(readBoard);
		$('#boardWriteBtn').click(loadBoardWrite);
		$('#searchForm').submit(function(event) {
			event.preventDefault();
			var param = $('#searchForm').serialize();
			loadSeachList(param);
		});
	});
}
function readBoard() {
	var seq = $(this).attr('id');	// 번호에 알맞는 글 가져오기
	$('#content').load('view/boardRead.php?no='+seq, function() {
		$('#modiBoard').click(function() {
			$('#content').load('view/boardModi.php?no='+seq, modiBoard);
		});
		$('#dropBoard').click(function() {
			$('#content').load('model/boardDrop.php?no='+seq, loadBoardList);
		});
		$('#listBoard').click(loadBoardList);
	});				
}
function modiBoard(seq) {
	$('#modiForm').submit(function(event) {
		event.preventDefault();	
		var param = $('#modiForm').serialize(); 
		$.get('model/boardModiResult.php?'+param, loadBoardList);
	});

	$('#writeCancelBtn').click(function() {
		loadBoardList();
	});
	
}

function loadBoardWrite() {
	$('#content').load('view/boardWrite.php', function(){
		
		/* Q. 이런식으로 빼서 하고싶은데
		 * 	$('#writeForm').submit([event], boardWrite);
		 * 	이렇게하면 submit 취소가 안되서 페이지이동이 되버려서 함수가 호출안됨..
		 * 	어떻게 해야하나요~~~~~~~~ㅠㅠㅠㅠㅠ
		 *  */
		
		$('#writeForm').submit(function(event) {
			event.preventDefault();	// form submit 이벤트 없애기
			var param = $('#writeForm').serialize(); // form 값 가져오기
			$.get('model/boardWriteIng.php?'+param, loadBoardList);
		});
		$('#writeCancelBtn').click(loadBoardList);
	});
}

