$(document).ready(function() {
		$('#inputBtn').click(inputData);
		$('#schBtn').click(searchData);
		$('#totalBtn').click(viewTotalData);
	}
);

var personData = new Array();
var dataCnt = 0;

function inputData() {
	personData[dataCnt] = {
		name : $('#name').val(),
		birth : $('#birth').val(),
		sex : $('#sex').val(),
		phone : $('#phone').val()
	};
	innerTable(dataCnt);
	dataCnt++;
}

function searchData() {
	$('#listBody').html("");
	var tempName = $('#schName').val();
	for(var i = 0; i < dataCnt; i++) {
		if(personData[i].name == tempName) {
			innerTable(i);
		}
	}
}

function viewTotalData() {
	$('#listBody').html("");
	for(var i = 0; i < dataCnt; i++) {
		innerTable(i);
	}
}

function innerTable(cnt) {
	$('#listBody').append("<tr><td>" + ((cnt - 0 ) + 1) + "</td><td>" + personData[cnt].name + "</td><td>" + personData[cnt].birth + "</td><td>" + personData[cnt].sex + "</td><td>" + personData[cnt].phone + "</td></tr>");
}