<?
	$path = $_SERVER[DOCUMENT_ROOT];
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	extract($_POST);
	/*
	 * 	var id = $('#id').val();
	var password = $('#password').val(); 
	var passwordCheck = $('#passwordCheck').val();
	var socialNumber = $('#socialNumber').val();
	var name = $('#name').val();
	var telNumber = $('#telNumber').val();
	var emailId = $('#emailId').val();
	var emailDomain = $('#emailDomain').val();
	 */
	$sql = "INSERT INTO MEMBER VALUES('$id', '$password', '$socialNumber', '$name', '$telNumber', '$emailId', '$emailDomain')";
	$result = mysql_query($sql);
	
	if ( $result ){
		$getMemberSql = "SELECT * FROM MEMBER WHERE id = '$id'";
		$getMemberResult = mysql_query($getMemberSql);
		
		$row = mysql_fetch_array($getMemberResult);
		$member = setMember($row);
		echo require_once($path."/member/get.php");
	}else {
		// header 를 이용하여 리다이렉트 시키키전에 echo 로 찍으면 안된다. 이유는 ? 
		//header("location:".$path."/member/saveForm.php");
		echo require_once($path."/member/saveForm.php");
	}
	
?>