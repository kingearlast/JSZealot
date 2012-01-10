/**
 * @author Hyosun
 */

var curMoney = 0;
var drink = [];
$(document).ready(init);
function init() {
	drink['coffee'] = {price: 500, amount: 1, isBindCheck: false};
	drink['strawberry'] = {price: 600, amount: 10, isBindCheck: false};
	drink['sikhye'] = {price: 500, amount: 10, isBindCheck: false};
	drink['vitapower'] = {price: 600, amount: 10, isBindCheck: false};
	drink['twoPercent'] = {price: 800, amount: 10, isBindCheck: false};
	drink['vitaminWater'] = {price: 1000, amount: 10, isBindCheck: false};
	
	$('#printMoney').delegate('input', 'click', inputMoney);
	$('#returnMoney').bind('click', returnMoney);
	$('#sales').bind('click', printSales);
	$('#fullDrink').bind('click', fullDrink);
}

function inputMoney() {
	var tempMoney = $(this).val();
	curMoney += tempMoney.substring(1)-0;
	$('#curMoney').val('');
	$('#curMoney').val(curMoney);
	printDrink();
}

function printDrink() {
	for(var name in drink) {
		if(drink[name].price <= curMoney && !drink[name].isBindCheck) {
			var imgSrc = "images/ok_" + name + ".png";
			$('#'+name).attr('src', imgSrc);
			$('#'+name).bind('click', getDrink);
			drink[name].isBindCheck = true;
		}
		else if(drink[name].amount > 0 && drink[name].price > curMoney && drink[name].isBindCheck) {
			var imgSrc = "images/" + name + ".png";
			$('#'+name).attr('src', imgSrc);
			$('#'+name).unbind('click');
			drink[name].isBindCheck = false;
		}
		
		if(drink[name].amount <= 0) {
			var imgSrc = "images/soldout.png";
			$('#'+name).attr('src', imgSrc);
			$('#'+name).unbind('click');
			drink[name].isBindCheck = false;
		}
		else if(drink[name].amount > 0 && drink[name].price > curMoney && !drink[name].isBindCheck) {
			var imgSrc = "images/" + name + ".png";
			$('#'+name).attr('src', imgSrc);
		}
	}
}

function returnMoney() {
	curMoney = 0;
	$('#curMoney').val("");
	$('#curMoney').val(curMoney);
	$('#getDrink img').attr('src', 'images/basic.png');
	
	printDrink();
}

function getDrink() {
	var clickDrink = $(this).attr('id');
	for(var name in drink) {
		if(name == clickDrink) {
			curMoney -= drink[name].price;
			drink[name].amount--;
			break;
		}
	}
	
	$('#getDrink img').attr('src', 'images/out_'+clickDrink+'.png');
	$('#curMoney').val(curMoney);
	printDrink();
}

function printSales() {
	$('#side div').html(
		'<p>커피 -> 남은 갯수 : '+drink['coffee'].amount+
		'<p>딸기라떼 -> 남은갯수 : '+drink['strawberry'].amount+
		'<p>식혜 -> 남은갯수 : '+drink['sikhye'].amount+
		'<p>비타500 -> 남은갯수 : '+drink['vitapower'].amount+
		'<p>2%부족할 때 -> 남은갯수 : '+drink['twoPercent'].amount+
		'<p>비타민워터 -> 남은갯수 : '+drink['vitaminWater'].amount
	);
	$('#side div').attr('class', 'sales');
}

function fullDrink() {
	$('#side div').html(
		'<p>커피<input type="text" value="0" size="4" class="coffee" /></p>'+
		'<p>딸기라떼<input type="text" value="0" size="4" class="strawberry" /></p>'+
		'<p>식혜<input type="text" value="0" size="4" class="sikhye" /></p>'+
		'<p>비타500<input type="text" value="0" size="4" class="vitapower" /></p>'+
		'<p>2%부족할 때<input type="text" value="0" size="4" class="twoPercent" /></p>'+
		'<p>비타민워터<input type="text" value="0" size="4" class="vitaminWater" /></p>'+
		'<input type="button" value="채우기" id="full" /></p>'
	);
	$('#full').bind('click', full);
}
function full() {
	var fullDrinkName;
	var fullDrinkAmount
	$('#side div input[type=text]').each(function(i) {
		fullDrinkName = $(this).attr('class');
		fullDrinkAmount = $(this).val()-0;
		drink[fullDrinkName].amount += fullDrinkAmount;
		i++;
	});
	
	$('#side div input[type=text]').val('0');
	printDrink();
}
