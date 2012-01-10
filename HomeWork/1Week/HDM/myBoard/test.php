<?
$foo = array("bob", "fred", "jussi", "jouni", "egon", "marliese");
$bar = each($foo);
print_r($bar);

echo "<br/>";
$a = array("html","css","javascript", "php", "mysql");
for($i = 0; $i < count($a); $i++){
    echo "$i : $a[$i]\n";
}

echo "<br/>";
$fruit = array("a" => "apple", "b" => "banana", "c" => "cranberry");

reset($fruit);
while (list($key, $val) = each($fruit)) {
    echo "$key => $val\n";
}

$where = "생활코딩";

echo "<br/>";
function foo($name){
	global $where;
	return "$name 님 안녕하세요.  $where 에 오신걸 환영합니다.";
}
echo foo("황대민");

echo "<br/>";
$helloArr = array("공식인사는", "꺼지세요");
echo "홈페이지 $helloArr[0] $helloArr[1] 입니다."; 
?>