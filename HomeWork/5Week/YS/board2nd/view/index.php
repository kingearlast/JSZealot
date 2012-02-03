<?
include_once '../common/session.php';
ini_set("display_errors", "1");
?>

<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>webBOARD</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../resources/common.css" media="screen" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="../resources/common.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#login').on('click', {url: './member/loginForm.php'}, loadAjax);
				$('#join').on('click', {url: './member/joinForm.php'}, loadAjax);
				
				$('#loginID').on('click', {url: './member/infoUpdateForm.php'}, loadAjax)
				$('#readList').on('click', function () {
					history.go(0);
				});
			});
			
			function loadAjax(event) {
				console.log(event.data.url);
				$.ajax({
					url: event.data.url,
					success: function (data) {
						$('#contents').html(data)
					}
				});
			}
		</script>
	</head>
	<body>
		<div id="wrap">
			<nav id="menu" style="float: right; background-color: skyblue;">
					<? if($loginID == "") { ?>
					<a id="login">login</a>  
					<a id="join">join</a>
					<? }?>
					<? if($loginID != "") { ?>
					<a id="loginID"> <?= $loginID ?>님 </a>
					<a id="logout" href="../model/member/logout.php">logout</a>
					<? }?>
					|| <a id="readList">readList</a>
				</ul>
			</nav>
			<header>
				<h1> <a href="./index.php"> webBOARD </a> </h1>
			</header>
			<hr />
			<div id="contents">
				<? include_once './board/readList.php'; ?>
			</div>
		</div>
	</body>
</html>