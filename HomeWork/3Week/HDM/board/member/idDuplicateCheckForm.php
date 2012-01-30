<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ID중복체크</title>
	<style>
		.errorMsg{
			color: red;
		}
		.okMsg{
			color: #0080C0;
		}
	</style>
	<script type="text/javascript" src="../resources/lib/jquery-1.6.2.js"></script>
</head>
<body>
	<input id="id" name="id" type="text" size="15" maxlength="15" placeholder="ID" autofocus="true" /><button id="idDuplicateCheckBtn">ID중복확인</button><br/>
	<span id="message" class="errorMsg"></span><br/>
	<button id="applyBtn">ID사용하기</button><br/>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		var isValid = false;
		var idVal = '';
		
		$('#applyBtn').click(function(event){
			event.preventDefault();
			var parentIdInputElement = dialogArguments;
			
			if ( isValid ){
				$(parentIdInputElement).val(idVal);
				window.close();	
			}else{
				$('#message').text('ID 가 적합하지 않습니다. \n중복체크를 다시하세요.').removeClass('okMsg').addClass('errorMsg');
			}
			
		});	
		
		// DB로 중복확인 요청 날림
		$('#idDuplicateCheckBtn').click(function(){
			
			idVal = $('#id').val();
			var url = '/member/idDuplicateCheck.php?id=' + idVal;
			console.log('request url: ' + url); 
			$.get(url, function(result){
				console.log('response result : ' + result);
				if ( result == true){
					isValid = true;
					$('#message').text('사용해도 좋은 ID 입니다.').removeClass('errorMsg').addClass('okMsg');	
				}else{
					isValid = false;
					$('#message').text('사용할 수 없는ID입니다.').removeClass('okMsg').addClass('errorMsg');
				}
			});
		});
	
		$('#id').change(function(){
			idValid = false;
		});
		
	});
</script>







