$(document).ready(init);
var checkIDBtn = false;
function init() {
	$('#joinBtn').click(loadJoinForm);
	$('#memberInfor').click(loadMemberInfo);
	$('#memberDrop').click(loadMemberDrop);
	$('#boardMenu').on('click', {page: 'init'}, loadBoardList);
}

/* 회원 */
function loadJoinForm() {
	$('#content').load('view/joinForm.php', function(){
		$('#checkID').click(checkID);
		$('#joinForm').on('blur', 'input', checkForm);
		$('#joinForm').on('focus', 'input', clearMessage);
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
		$('#confirm').attr('class',data);
		if(data == "fail" || userID == "") {
			$('#confirm').text('사용불가');
			checkIDBtn = false;
		}
		else {
			$('#confirm').text('사용가능');
			checkIDBtn = true;
		}
	});
}
function checkForm() {
	var strID = $(this).attr('id');
	var strLabel = $('label[for='+strID+']').text();
	var strValue = $(this).val();
	$(this).siblings('span').attr('class', 'fail');
	
	if(strValue.length == 0) {
		$(this).siblings('span').text(strLabel + ' 미입력');
	}
	if((strID == 'userPwdCheck') && (strValue.length != 0)) {
		if(strValue != $('#userPwd').val()) {
			$(this).siblings('span').text('비밀번호 불일치');
		}
	} 
	if((strID == 'email') && (strValue.length != 0)) {
		if(!emailCheck(strValue)) {
			$(this).siblings('span').text('잘못 된 이메일 형식');
		}
	}
}
function emailCheck(str) {
	var re=/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i; 
	if(re.test(str)) {
		return true;
	}
	else {
		return false;
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
var board = {
	category: null, 
	inputVal: null,
	pageNum: null
};
function loadBoardList(event) {
	if(event != null && event.data != null && event.data.page == "init") {
		board.category = null;
		board.inputVal = null;
		board.pageNum = null;
	}
	$('#content').load('view/boardList.php', 
		{pageNum: board.pageNum, category: board.category ,inputValue: board.inputVal}, function(){
			$('#boardList .title a').click(readBoard);
			$('#boardWriteBtn').click(loadBoardWrite);
			$('#pageGroup').on('click', 'a', paging);
			$('#searchForm').submit(function(event) {
				board.pageNum = null;
				board.category = $('#category').val();
				board.inputVal = $('#inputValue').val();
				event.preventDefault();
				loadBoardList();
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
function paging() {
	var pageGroupVal = $(this).attr('class');
	var pageVal = $(this).attr('id');
	
	// 이전 페이지 또는 이후페이지 일 때 페이지번호만 새로 load
	if(pageGroupVal == "pageGroup") {
		$('#pageGroup').load('view/boardList.php #pageGroup',
		{pageNum: pageVal}, function() {
			$('#pageGroup').on('click', 'a', paging);
		});
	}
	// 페이지 번호에 알맞는 글 목록 load
	else {
		$('#boardList').load('view/boardList.php #boardList', 
			{pageNum: pageVal, category: board.category ,inputValue: board.inputVal},
			function() {
				board.pageNum = pageVal;
				$('#boardList .title a').click(readBoard);
				$('#boardWriteBtn').click(loadBoardWrite);
		});
	}
}

function modiBoard(seq) {
	$('#modiForm').submit(function(event) {
		event.preventDefault();	
		var param = $('#modiForm').serialize(); 
		$.get('model/boardModiResult.php?'+param, loadBoardList);
	});

	$('#writeCancelBtn').click(loadBoardList);
}

function loadBoardWrite() {
	$('#content').load('view/boardWrite.php', function(){	
		$('#writeForm').submit(writeBoard);	// 글쓰기
		$('#writeCancelBtn').click(loadBoardList);	// 글쓰기 취소
	});
}
function writeBoard(event) {
	event.preventDefault();	// form submit 이벤트 없애기
	var param = $('#writeForm').serialize(); // form 값 가져오기
	$.get('model/boardWriteIng.php?'+param, loadBoardList);
}
