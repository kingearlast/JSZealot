$(document).ready(start);

var result = ""; //결과값
var number = ""; //입력값
var check = {onechek : 0 , preOperator : 0, doubleClick :0 , error : false};
// onecheck = 한번들어온 연산자 , preOperator 이전 연산자  doubleClick 마구잡이 클릭 방지

function start() {
	$('.clickNumber').bind('click', addNumber);
	$('.clickOperator').bind('click', calculateNumber);
	$('.clickClear').bind('click', clear);

}

function addNumber() {
	var insertNumber = $(this).val();
	if(!check.error){
		number += insertNumber;
		$('#result').val(number);
	}
}

function calculateNumber() {

	var operator = $(this).val();
	
	if(check.error)
	{
		return ;
	}
	
	check.onechek ++;
	if(number=="")	{
		check.doubleClick =true;
		check.preOperator = operator;
	}
	else
		check.doubleClick =false; 

	if(check.onechek == 1  && !check.doubleClick) {
		result = number;
		check.preOperator = operator;
		number = "";
	} else if(!check.doubleClick){
		result = result - 0;
		number = number - 0;
		switch(check.preOperator) {
			case '+':
				result = result + number;
				break;
			case '-':
				result = result - number;
				break;
			case '*':
				result = result * number;
				break;
			case '/':
				if(number==0)
				{
					$('#result').val("0으로 나눌수없습니다.");
					check.error = true;
					return ;
				}
				result = result / number;
				break;
			case '=':
				break;
		}
		number ="";
		check.preOperator = operator;
		$('#result').val(result);
		check.onechek = 1;
	}

}

function clear() {
	result = "";
	number = "";
	check.error = false;
	$('#result').val("0");
}