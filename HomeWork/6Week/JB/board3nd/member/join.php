<?php
@session_start();
include_once ('callDatabase.php');
extract($_POST);
$phone = $phone1.$phone2.$phone3;
$email = $email1.'@'.$email2;
$addMember = " insert into member values('$id', '$password', '$name','$nickName','$email','$phone')";
$result = mysql_query($addMember);
if (!$result) {
	echo 'false';
} else {
	$_SESSION['nickName'] = $nickName;
	$_SESSION['id'] = $id;
	echo "<script>location='../index.html'</script>";
}
?>
