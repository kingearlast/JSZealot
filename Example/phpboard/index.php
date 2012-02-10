<? include_once 'common/session.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>New Web Project</title>
		<link rel="stylesheet" type="text/css" href="resources/style/common.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="resources/Scripts/common.js"></script>
		<script type="text/javascript">
			$(document).ready(init);
			
			function init() {
				bindMenuEvent();
				loadBoardList();
			}
		</script>
	</head>
	<body>
		<div class="headerWrap wrap">
			<h1>PHP Board</h1>
		</div>
		<div class="bodyWrap wrap">
			<div class="naviWrap wrap">				
				<?php include("view/navi.php");?>			
			</div>
			<div id="contWrap" class="contWrap wrap"></div>
			<div class="footerWrap wrap">
				<div class="footer inner">
					&copy;copyright 
				</div>
			</div>
		</div>
	</body>
</html>

