
<?php 
@session_start();
include_once('../member/CallDatabase.php');
extract($_REQUEST);

$input_information = "insert into board (title , write_id, write_day, content) values ('$title', '$_SESSION[id]',now(),'$content')";
$check = mysql_query($input_information);

if(!$check){
	echo 'false';		
}

?>


