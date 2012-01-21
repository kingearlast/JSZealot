$(document).ready(function() {
		$('#calBtn').click(calc);
	}
);

function calc() {
	
	var num1 = $('#num01').val() - 0;
	var num2 = $('#num02').val() - 0;
	var operator = $('#operator').val();
	
	if(isNaN(num1) || isNaN(num2)) {
		alert("숫자를 입력해 주세요");
		return;
	}

	if((operator == "div") && (num2 == 0)) {
		alert("숫자 0으로는 나누실 수 없습니당.");
		return;
	}
	
	var calculator =  {
		add : function(num1, num2) {return num1 + num2},
		sub : function(num1, num2) {return num1 - num2},
		multi : function(num1, num2) {return num1 * num2},
		div : function(num1, num2) {return num1 / num2},
	}

	$('#result').val(calculator[operator](num1,num2));
	
}