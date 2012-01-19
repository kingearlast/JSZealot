$(document).ready(init);

var index = 0;
var people = [];
function init() {
	$('#btnInput').bind('click', inputInfo);
	$('#btnSch').bind('click', searchPeople);
	$('#btnTotal').bind('click', searchTotal);
}

function inputInfo() {
	people[index] = {
		name : $('#name').val(),
		birth : $('#birthday').val(),
		sex : $('#sex').val(),
		phone : $('#phone').val()
	};
	inputList(index);
	index++;	
}

function searchPeople() {
	var schName = $('#schName').val();
	var isFind = false;
	var count = 0;
	
	$('#listBody, #list p').html('');
	for(var i=0; i<people.length; i++) {
		if(schName == people[i].name) {
			inputList(i);
			isFind = true;
			count++;
		}
	}
	$('#list h3').after('<p>총 ' + count + '명</p>');
					
	if(!isFind)
		alert('존재하지 않는 이름입니다.');
}

function searchTotal() {
	$('#listBody, #list p').html('');
	for(var i=0; i<people.length; i++) {
			inputList(i);
	}
	$('#list h3').after('<p>총 ' + i + '명</p>');
}

function inputList(index) {
	$('#listBody').append(
		'<tr><td>' + (index+1) + '</td><td>' + people[index].name + '</td><td>' 
		+ people[index].birth + '</td><td>' + (people[index].sex == 'M' ? "남자":"여자") + '</td><td>'
		+ people[index].phone + '</td></tr>');	
}
