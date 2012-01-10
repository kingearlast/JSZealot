/**
 * @author Administrator
 */

/*
 * Comment by kingear 
 * 
 * 특별히 언급할만한 내용은 없음 
 * 
 */

$(document).ready(init);
function init() {
	$('#calcButton').bind('click', calculation);
	$('#clearButton').bind('click', clear);
	clear();
}

function clear() {
	$('#num01').val("");
	$('#num02').val("");
	$('#result').val("");
}

function calculation() {
	var operator = $('#operator').val();
	var num1 = $('#num01').val() - 0;
	var num2 = $('#num02').val() - 0;

	if(isNaN(num1) || isNaN(num2)) {
		alert('숫자만 입력해 주세요.');
		clear();
		return;
	}
	switch(operator) {
		case '+':
			$('#result').val(num1 + num2);
			break;
		case '-':
			$('#result').val(num1 - num2);
			break;
		case '*':
			$('#result').val(num1 * num2);
			break;
		case '/':
			$('#result').val(num1 / num2);
			break;
	}
	if(!isFinite($('#result').val())) {
		alert('정의되지않은 결과입니다.');
		clear();
		return;
	}
}