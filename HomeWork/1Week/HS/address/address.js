/**
 * @author Administrator
 */


/*
 * Comment by kingear 
 * 
 * #listBody에 html 을 붙이는 작업이 세함수에 걸쳐서 중복 되어 있음 
 * People 객체를 받아서 listBody에 붙일 html 을 만들어 주는 함수를 만드는게 더 나을것 같음
 * 
 * 전역 변수는 가급적 사용하지 않도록 하기
 * 
 * inputInfor 함수에서 text input 에서 값을 읽는 부분을 좀더 효율적으로 수정하는 것이 좋을 것 같음
 * input 요소의 ID 와 People 객체의 프로퍼티 명을 쌍으로 맞춰서 inputText 배열에 넣는 대신 바로 
 * People 객체를 만드는 방식으로 수정 가능할 듯함  
 */
$(document).ready(init);

var index = 1;
var savePeople = [];

function init()
{
	$('#btnInput').bind('click', inputInfor);
	$('#btnSch').bind('click', searchPeople);
	$('#btnTotal').bind('click', searchTotal);
}

function inputInfor()
{
	var inputText = [];
	var inputSex;
	$('#inputInfor input[type=text]').each(function(i) {
		inputText[i] = $(this).val();
		i++;
	});
	inputSex = $('#sex').val();

	var beforHtml = $('#listBody').html();
	$('#listBody').html(
		beforHtml + '<tr><td>' + index + '</td><td>' + inputText[0] + '</td><td>' 
		+ inputText[1] + '</td><td>' + (inputSex == 'M' ? "남자":"여자") + '</td><td>'
		+ inputText[2] + '</td></tr>');
	
	/* savePeople[0] = { index:1, name:... }; */
	savePeople[index - 1] = new People(index, inputText[0], inputText[1], inputSex, inputText[2]);
	index++;
}

function People(index, name, birthday, sex, phone)
{
	this.index = index;
	this.name = name;
	this.birth = birthday;
	this.sex = sex;
	this.phone = phone;
}

function searchPeople()
{
	var schName = $('#schName').val();
	var insertHtml;
	var isFind = false;

	for(var i=0; i<savePeople.length; i++) {
		if(schName == savePeople[i].name) {
			insertHtml += '<tr><td>' + savePeople[i].index + '</td><td>' + savePeople[i].name + '</td><td>' 
			+ savePeople[i].birth + '</td><td>' + (savePeople[i].sex == 'M' ? "남자":"여자") + '</td><td>'
			+ savePeople[i].phone + '</td></tr>';
			
			isFind = true;
		}
	}
	$('#listBody').html(insertHtml);
	
	if(!isFind)
		alert('존재하지 않는 이름입니다.');
}

function searchTotal()
{
	var insertHtml;
	for(var i=0; i<savePeople.length; i++) {
			insertHtml += '<tr><td>' + savePeople[i].index + '</td><td>' + savePeople[i].name + '</td><td>' 
			+ savePeople[i].birth + '</td><td>' + (savePeople[i].sex == 'M' ? "남자":"여자") + '</td><td>'
			+ savePeople[i].phone + '</td></tr>';
	}
	$('#listBody').html(insertHtml);
}
