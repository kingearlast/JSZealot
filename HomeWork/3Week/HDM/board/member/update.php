<?
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	require_once($path."/db/database.php");
	require_once($path."/db/models.php");
	
	@extract($_POST);
	
	$sql = "UPDATE MEMBER SET password='$password'
			,social_number='$socialNumber'
			,name='$name'
			,tel_number='$telNumber'
			,email_id='$emailId'
			,email_domain='$emailDomain'
			where id = '$id'";
	
	$result = mysql_query($sql);
	
	if ( $result ){
		$getMemberSql = "SELECT * FROM MEMBER WHERE id = '$id'";
		$getMemberResult = mysql_query($getMemberSql);
		
		$row = mysql_fetch_array($getMemberResult);
		$member = setMember($row);
		
		echo require_once($path."/member/get.php");
	}else {
		echo require_once($path."/member/updateForm.php");
	}
	
?>