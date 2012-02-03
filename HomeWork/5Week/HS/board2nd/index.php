<?
	session_start();
	$logon = $_SESSION['logon'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="resources/lib/960.css" />
		<link type="text/css" rel="stylesheet" href="resources/style/board.css" />
		<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="resources/script/common.js"></script>
		<title>Welcome</title>
	</head>
	<body>
		<div class="container_12">
			
			<div id="header" class="grid_12">
				<h1><a href="index.php">JSZealot</a></h1>
			</div>
			<div id="side" class="grid_4">
				<? include('./view/navy.php'); ?>
			</div>
			<div id="content" class="grid_8">
				<img class="mainImg" src="resources/images/main_image.png" />
			</div>
			<div id="footer" class="grid_12">
				&copy;copyright 
			</div>
			
		</div>
	</body>
</html>
