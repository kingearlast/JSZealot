
<?php 
@session_start();
include_once('../member/callDatabase.php');
extract($_REQUEST);

$input_information = "insert into board (title , writeId, writeDay, content,categoryId) values ('$title', '$_SESSION[id]',now(),'$content','$_SESSION[nickName]')";
$check = mysql_query($input_information);

if(!$check){
	echo 'false';		
}

?>


