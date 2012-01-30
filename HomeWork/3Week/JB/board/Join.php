
<?php 
include_once('./CallDatabase.php');
extract($_POST);

$input_information = " insert into member values('$id', '$password', '$passwordcheck','$name','$nickname','$email','$phone','$social_security_number')";
$check = mysql_query($input_information);

if(!$check){
	echo '중복된 아이디가 있습니다'.'</br>'.' 다시 입력하여 주시기 바랍니다'."<a href = 'Join.html' >OK</a>";	
}
else {
	echo "가입되셨습니다".'로그인창으로 이동합니다.'."<a href = 'Login.html' >OK</a>";	
}

?>
