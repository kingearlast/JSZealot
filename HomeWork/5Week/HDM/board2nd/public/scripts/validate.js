function loginFormEmptyCheck(formEle){
	return formEle.id || form.password;
}

function joinFormEmptyCheck(){
	var id = $('#id').val();
	var password =  $('#password').val();
	var confirmPassword =  $('#confirmPassword').val();
	var socialNumber =  $('#socialNumber').val();
	var name =  $('#name').val();
	var telNumber =  $('#telNumber').val();
	var emailId =  $('#emailId').val();
	var emailDomainSelect =  $('#emailDomainSelect').val();
	
	if ( !id || !password || !confirmPassword || !socialNumber || !name || !telNumber || !emailId || !emailDomainSelect){
		return false;
	}else{
		return true;
	}
}

function passwordCheck(confirmPassword, password){
	return confirmPassword == password;			
}

function socialNumberCheck(socialNumberStr){
	/*	알고리즘 해설 : http://www.nicklib.com/bbs/board.php?bo_table=bbs_script&wr_id=67&sca=JavaScript
	 	1. 점검번호와 주민번호의 해당 위치를 서로 곱하여 더합니다.
		2. 더한 값을 11로 나누고 난 나머지를 구합니다.
		3. 나머지 값을 11에서 뺍니다.
		4. 이렇게 결과로 나온 값이 주민번호의 제일 마지막 자리와 일치하여야 정상적인 주민번호입니다.
	*/
	
	if ( isNaN(socialNumberStr) || socialNumberStr.length != 13 ){
		return false;
	}
	
	var checkSumValues = [2,3,4,5,6,7,8,9,2,3,4,5];
	var sum = null;
	$.each(checkSumValues, function(index, value){
		var num = parseInt( socialNumberStr.charAt(index) ) * value;
		sum = sum + num;
	});
	console.log('sum :' + sum);
	var modValue = sum % 11;
	modValue = 11 - modValue;
	var socialNumberLastValue = parseInt( socialNumberStr.charAt(12) );
	console.log('socialNumberLastValue:' + socialNumberLastValue);
	if ( modValue != socialNumberLastValue){
		return false;
	}
	return true;
}

function telNumberCheck(telNumber){
	if ( isNaN(telNumber) || telNumber.length < 10 ){
		return false;
	}
	return true;
}

function emailIdCheck(emailId){
	// 출처 : http://lael.be/154
	var reg_email = /^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*/;
	if ( emailId.search(reg_email) == -1 ){
		return false;
	}
	return true;
}


function appendIdDuplicateCheckBtn(){
	var duplicateCheckBtn = $('<input type="button" id="duplicateCheckBtn" />').val('ID중복체크');
	$('#id').after(duplicateCheckBtn);
	$('#id').attr('readonly', 'readonly');	
	$('#duplicateCheckBtn').click(function(){
		window.showModalDialog('/member/idDuplicateCheckForm', $('#id'),'dialogWidth:400px; dialogHeight:50px; dialogLeft:100px; dialogTop:100px; resizable:no; status:no; scroll:no; help:no; unadorned:no; edge:sunken');
	});
}
	
function bindJoinValidator(){
	
	$('#confirmPassword').change(function(){
		if ( !passwordCheck( $(this).val(), $('#password').val()) ){
			$(this).siblings('.error').text('패스워드가 일치하지 않습니다.');
			$(this).siblings('.error').show();
			joinErrorCount++;
		}else{
			$(this).siblings('.error').hide();
			if ( joinErrorCount > 0){
				joinErrorCount--;	
			}
		}
	});
	
	$('#socialNumber').change(function(){
		if ( !socialNumberCheck( $(this).val()) ){
			$(this).siblings('.error').text('주민등록 번호가 유효하지 않습니다.');
			$(this).siblings('.error').show();
			joinErrorCount++;
		}else{
			$(this).siblings('.error').hide();
			if ( joinErrorCount > 0){
				joinErrorCount--;	
			}
		}
	});
	
	$('#telNumber').change(function(){
		if ( !telNumberCheck($(this).val()) ){
			$(this).siblings('.error').text('전화번호 형식이 유효하지 않습니다.');
			$(this).siblings('.error').show();
			joinErrorCount++;
		}else{
			$(this).siblings('.error').hide();
			if ( joinErrorCount > 0){
				joinErrorCount--;	
			}
		}
	});
	
	$('#emailId').change(function(){
		if ( !emailIdCheck($(this).val()) ){
			$(this).siblings('.error').text('이메일 형식이 유효하지 않습니다.');
			$(this).siblings('.error').show();
			joinErrorCount++;
		}else{
			$(this).siblings('.error').hide();
			if ( joinErrorCount > 0){
				joinErrorCount--;	
			}
		}
	});
}