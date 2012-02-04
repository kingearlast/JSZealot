<? include_once 'common/mainSession.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Doo HomePage</title>
		<link href="http://localhost/resources/css/default.css" rel="stylesheet" type="text/css">
		<link href="http://localhost/resources/css/front.css" rel="stylesheet" type="text/css">
		<link href="http://localhost/resources/css/subpage.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<!--<script type="text/javascript" src="http://localhost/resources/scripts/joinVali.js"></script>-->
		<!--<script type="text/javascript" src="http://localhost/resources/scripts/checkForm.js"></script>-->
		<script type="text/javascript" src="http://localhost/resources/scripts/utils.js"></script>
	</head>
	<body>
		<div id="wrap">			
			<div id="header">
				<div id="login">
					<?php include("view/viewLogin.php"); ?>
					<!--<a href="view/member/memberLogin.html">login<a> | <a href="view/member/memberJoin.html">Join</a>-->
				</div>
				
				<div class="clear"></div>
				
				<div id="logo">
					<img src="http://localhost/resources/images/logo.gif" width="265" height="62" alt="Fun Web">
				</div>
				<div id="nav">
					<ul>
						<li><a href="http://localhost/index.php">HOME</a></li>
						<li><a href="http://localhost/view/aboutMe/welcome.php">About Me</a></li>
						<li><a href="http://localhost/view/board/boardList.php">BOARD</a></li>
					</ul>
				</div>
			</div>
			
			<div class="clear"></div>