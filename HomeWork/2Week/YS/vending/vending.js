var money = 0;
var buyCnt = 0;
var bought = "";

function select(product,pay){
	if(money>=pay){
		if(buyCnt>=12){
			alert("물건 나오는 곳이 꽉 찼네요 !\n확인을 누르면 아래에서 물건을 받고, 새 물건이 나옵니다.");
			clear_box();
		}
		buyCnt++;
		money -= pay;
		bought += product + " ";
		document.getElementById("currentMoney").value = money;
		document.getElementById("receiveBox").innerHTML +=
			"<span>" + product + " </span>";
	} else{
		document.getElementById("inputMoney").placeholder = pay;
	}
}

function clear_box() {
	if (buyCnt!=0) {
		buyCnt = 0;
		bought += "을 꺼냈습니다.";
		alert(bought);
		bought = "";
		document.getElementById("receiveBox").innerHTML = "";
	} else{
		alert("아무 것도 없습니다.");
	}
}

function insert_money(){
	tmpMoney = document.getElementById("inputMoney").value-0;
	if(!isNaN(tmpMoney)) {
		money += tmpMoney;
		document.getElementById("currentMoney").value = money;
		document.getElementById("inputMoney").value = "";
		document.getElementById("inputMoney").placeholder = "";
	} else {
		document.getElementById("inputMoney").value = "";
		document.getElementById("inputMoney").placeholder = "";
		//console.log(tmpMoney);
	}
}

function receive_money(){
	document.getElementById("currentMoney").value = "0";
	document.getElementById("inputMoney").value = "";
	document.getElementById("inputMoney").placeholder = "0";
	document.getElementById("change").value = money;
}

function clear_moneybox(){
	if(money>0){
		document.getElementById("change").value = "";
		alert(money+"원을 받았습니다.")
			money = 0;
	}
}