
$(document).ready(init);

var nRandCom = [];
var nInputPeo = [];
var playCount = 0;

function init() {
	$('#inputNumber').bind('click', inputNumber);
	$('#num1').bind('keyup', function() {
		$('#num2').focus();
	});
	$('#num2').bind('keyup', function() {
		$('#num3').focus();
	});
	
	makeRandNumber();
	$('#content input[type=text]:first').focus();
}

function makeRandNumber() {
	for(var i=0; i<3; i++) {	// 0~9 사이의 난수 발생
		nRandCom[i] = Math.ceil(Math.random() * 10) - 1;
		for(var j=0; j<3; j++) {	// 중복검사
			if(nRandCom[i]==nRandCom[j] && i!=j) {
				i--;
				break;
			}
		}
	}
}

function inputNumber() {
	$('#content input[type=text]').each(function(i) {// 사용자 입력 값 얻기
		nInputPeo[i] = $(this).val();
		i++;
	});
	
	if(nInputPeo[0]=="" || nInputPeo[1]=="" || nInputPeo[2]=="") {
		alert('모두 입력해 주세요.');
	}
	else if(isNaN(nInputPeo[0]) || isNaN(nInputPeo[1]) || isNaN(nInputPeo[2])) {
		alert('숫자만 입력해 주세요.');
		$('#content input[type=text]').val("");
	}
	else if(nInputPeo[0]==nInputPeo[1] || nInputPeo[0]==nInputPeo[2] || nInputPeo[1]==nInputPeo[2]) {
		alert('각 다른 수를 입력해 주세요.');
	}
	else {
		playGame();	
	}
	$('#content input[type=text]').val("");	// 칸 지우기
	$('#content input[type=text]:first').focus();
}

function playGame() {	
	var ball=0, strike=0;
	playCount++;
	for(var i=0; i<nInputPeo.length; i++) {
		for(var j=0; j<nRandCom.length; j++) {
			if(i==j && nInputPeo[i]==nRandCom[j]) {
				strike++;
			}
			if(i!=j && nInputPeo[i]==nRandCom[j]) {
				ball++;
			}
		}
	}
	
	$('#header').html('<p>play count : '+ playCount +'</p>');
	if(strike==0 && ball==0) {
		$('#listResult ul li:last').after('<li>('+ nInputPeo +') out!</li>');
	}
	else if(strike == 3) {	// 게임 win
		$('#listResult').html('<p>You Win!</p>');
	}
	else {
		$('#listResult ul li:last').after('<li>('+ nInputPeo +') '
			+'Strike:'+ strike +' Ball:'+ ball +'</li>');
	}
	
	if(playCount == 10) {	// 게임 lose
		$('#listResult ul li:last').after('<li>횟수제한! 게임오버</li>');
		$('#content input[type=text]').attr('disabled', 'disabled');
		$('#inputNumber').unbind('click');
	}
}
