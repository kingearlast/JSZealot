<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>login</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../resources/common.css" media="screen" />
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include_once '../header.php'; ?>
			</header>
			<div id="contents">
				<div>
					<form action="./login.php" method="post">
						<label for="id">ID</label> : <input type="text" name="id" value="" /> <br />
						<label for="pwd">password</label> : <input type="password" name="pwd" value="" /> <br />
						<input type="submit" value="login" />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>