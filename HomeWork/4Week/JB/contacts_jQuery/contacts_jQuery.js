/*
 * Comment by Kingear
 *
 * 전역변수 과다 사용
 *
 * 주소록에 저장될 요소들을 각각의 배열에 넣는 것보다 객체단위로 묶어서 객체 배열에 저장하는 것이 좋을 것 같음
 *
 */
$(document).ready(start);

var people = {
	count : 0,
	information : []
};

function start() {
	$('#showTotal').bind('click', showInformation);
	$('#searchInformation').bind('click', searchInformation);
	$('#insertInformation').bind('click', insertInformation);
}

function insertInformation() {
	var insertName = $('#name').val();
	var insertBirthday = $('#birthday').val();
	var insertSex = $('#sex').val();
	var insertPhoneNumber = $('#phoneNumber').val();

	if(insertName == "" || insertBirthday == "" || insertPhoneNumber == "") {
		errorPrint("입력하실 정보를 모두 입력하시길 바랍니다.");
		return;
	}

	people.information[people.count] = {
		name : insertName,
		birthday : insertBirthday,
		sex : insertSex,
		phoneNumber : insertPhoneNumber
	};
	addListBody(people.count);

	people.count++;

}

function searchInformation() {
	var searchName = $('#schName').val();

	if(searchName == "") {
		errorPrint("검색할 이름을 입력하시기 바랍니다.");
		return;
	}

	$('#listBody').html("");
	for(var i = 0; i < people.count; i++) {
		if(people.information[i].name == searchName) {
			addListBody(i);
		}		
	}
	if($('#listBody').html() == ""){
		errorPrint("찾으시는 정보가 없습니다");	
	}
}

function showInformation() {
	$('#listBody').html("");
	for(var i = 0; i < people.count; i++) {
		addListBody(i);
	}
}

function addListBody(addOrder) {
	$('#listBody').append("<tr><td>" + (addOrder + 1) + "</td><td>" + people.information[addOrder].name + "</td><td>" + people.information[addOrder].birthday + "</td><td>" + people.information[addOrder].sex + "</td><td>" + people.information[addOrder].phoneNumber + "</td></tr>");
}

function errorPrint(errorMassage) {
	alert(errorMassage);
}

/*
 var member = {order : 0 };
 var list_number = [];
 var name = [];
 var birthday = [];
 var sex = [];
 var phonenumber = [];
 var i = 0;
 var listbody;

 function add() {
 listbody = document.getElementById("listBody");
 list_number[i] = i + 1;
 name[i] = document.getElementById("name").value;
 birthday[i] = document.getElementById("birthday").value;
 sex[i] = document.getElementById("sex").value;
 phonenumber[i] = document.getElementById("phonenumber").value;

 if(name[i] == "" || birthday[i] == "" || phonenumber[i] == "") {
 alert("정보를 모두 입력하여 주세요.");
 return;
 }

 print(i);
 i++;

 }

 function showtotal() {
 var j = 0;
 var listbody = document.getElementById("listBody");

 listbody.innerHTML = "";

 for( j = 0; j < i; j++) {
 print(j);

 }

 }

 function show() {
 var j = 0;
 var ok = 0;
 var searchName = document.getElementById("schName").value;
 var listbody = document.getElementById("listBody");

 if(searchName == "") {
 alert("검색할 이름을 입력하여 주십시오.");
 return;
 }
 listbody.innerHTML = "";
 for( j = 0; j < i; j++) {
 if(searchName == name[j]) {
 print(j);
 ok = 1;
 }
 }
 if(ok == 0)
 alert("찾으시는 정보가 없습니다.");
 }

 function print(i) {
 listbody.innerHTML += "<tr><td>" + list_number[i] + "</td><td>" + name[i] + "</td><td>" + birthday[i] + "</td><td>" + sex[i] + "</td><td>" + phonenumber[i] + "</td></tr>";
 }*/