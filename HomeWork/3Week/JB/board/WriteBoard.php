
<?php 
@session_start();
include_once('./CallDatabase.php');
extract($_POST);

$input_information = " insert into board (title , write_id, write_day, content)
 values ('$title', {$_SESSION['nickname']},now(),'$write')";
$check = mysql_query($input_information);



if(!$check){
	echo '로그인이 필요합니다'.'</br>'.'로그인 하여주시기 바랍니다 '."<a href = 'Login.html' >OK</a>";	
}
else {
	echo '글쓰기를 완료하였습니다'.'</br>'."<a href = 'Board.html' >OK</a>";	
}

?>


