
function joinMember(form){
	
	var id = $('#id').val();
	var password = $('#password').val(); 
	var passwordCheck = $('#passwordCheck').val();
	var socialNumber = $('#socialNumber').val();
	var name = $('#name').val();
	var telNumber = $('#telNumber').val();
	var emailId = $('#emailId').val();
	var emailDomain = $('#emailDomain').val();
	
	if ( !id ){
		return alertThrow('ID를 채워주세요');
	}
	if ( !password ){
		return alertThrow('비밀번호를 채워주세요');
	}
	if ( !passwordCheck ){
		return alertThrow('비밀번호 확인란을 채워주세요');
	}
	if ( password != passwordCheck ){
		return alertThrow('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
	}
	if ( !socialNumber ){
		return alertThrow('주민등록번호를 채워주세요');
	}
	if ( isNaN(socialNumber) ||  socialNumber < 13 ){
		return alertThrow('주민등록번호가 잘못되었습니다');
	}
	if ( !name ){
		return alertThrow('이름을 채워주세요');
	}
	if ( !emailId ){
		return alertThrow('이메일 ID를 채워주세요');
	}
	
	var url = $(form).attr('action');
	
	var data = { 
		'id':id, 
		'password'		:password, 
		'passwordCheck'	:passwordCheck, 
		'socialNumber'	:socialNumber, 
		'name'			:name,
		'telNumber'		:telNumber,
		'emailId'		:emailId,
		'emailDomain'	:emailDomain
	};
	
	$.post(url, data, function(page){
		$('#content').html(page);
	});
	
}


function alertThrow(message){
	alert(message);
	return false;
}

function writeBBS(form){
	
	var seq = form.seq? $(form.seq).val() : '';
	var id = form.id? $(form.id).val() : '';
	//var category = $(form.category).val();
	var title = $(form.title).val();
	var content = $(form.content).val();
	
	if ( !title ){
		return alertThrow('제목을 입력해주세요.');
	}
	
	var url = $(form).attr('action');
	var data = {
		'seq' : seq,
		'id' : id,
		//'category' : category,
		'title' : title,
		'content' : content,
	}
	console.log( 'id : ' + id + '\nsubject : ' + title + '\ncontent : ' + content );
	
	$.post(url, data, function(page){
		$('#content').html(page);
		// 수정 서브밋 후 getForm.php page 받음
		updateBoardCallback();
		
	});
	
}
