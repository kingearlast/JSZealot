exports.joinValidate = function(req, res, next){
	var postData = req.body;
	var errors = createErrorsForMember();
	if ( !postData.id ){
		errors.id = 'id 를 입력하세요.';
		errors.count++;
	}
	console.log( 'typeof postData.beforePassword : ' + typeof postData.beforePassword  );
	console.log( 'postData.beforePassword : ' + postData.beforePassword );
	if ( postData.beforePassword != undefined && !postData.beforePassword ){
		console.log('beforePassword 파라미터 넘어옴');
		errors.beforePassword = 'beforePassword 를 입력하세요.';
		errors.count++;
	}
	if ( !postData.password ){
		errors.password = 'password 를 입력하세요.';
		errors.count++;
	}
	if ( !postData.confirmPassword ){
		errors.confirmPassword = 'confirmPassword 를 입력하세요.';
		errors.count++;
	}
	if ( !postData.socialNumber ){
		errors.socialNumber = 'socialNumber 를 입력하세요.';
		errors.count++;
	}
	if ( !postData.name ){
		errors.name = 'name 를 입력하세요.';
		errors.count++;
	}
	if ( !postData.telNumber ){
		errors.telNumber = 'telNumber 를 입력하세요.';
		errors.count++;
	}
	if ( !postData.emailId || !postData.emailDomainSelect  ){
		errors.emailDomainSelect = 'email 을 입력하세요.';
		errors.count++;
	}
	
	req.errors = errors;
	next();
		
}


var createErrorsForMember = exports.createErrorsForMember = function(){
	var errors = {
		id : '',
		beforePassword : '',
		password : '',
		confirmPassword : '',
		socialNumber : '',
		name : '',
		telNumber : '',
		emailId : '',
		//emailDomain : '',
		emailDomainSelect : '',
		count : 0	
	};
	
	return errors;
}

