<?php
@session_start();
include_once ('CallDatabase.php');
extract($_REQUEST);

$input_information = " insert into member values('$id', '$password', '$passwordCheck','$name','$nickName','$email','$phone','$SSN')";
$check = mysql_query($input_information);

if (!$check) {
	echo 'false';
} else {
	$_SESSION['nickName'] = $nickName;
	$_SESSION['id'] = $id;
	$_SESSION['password'] = $password;
	$_SESSION['passwordCheck'] = $passwordCheck;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	$_SESSION['phone'] = $phone;
	$_SESSION['SSN'] = $SSN;
}
?>
