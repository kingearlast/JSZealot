<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<title>join</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="../resources/common.css" media="screen" />
	</head>
	<body>
		<div id="wrap">
			<header>
				<?php include_once '../header.php'; ?>
			</header>
			<div id="contents">
				<h3>회원 가입</h3>
				<div>
					<form action="./join.php" method="post">
						<label for="id">ID</label> : <input type="text" name="id" value="" /> <br />
						<label for="pwd">password</label> : <input type="password" name="pwd" value="" /> <br />
						<label for="pwdConfirm">password Confirm</label> : <input type="password" name="pwdConfirm" value="" /> <br />
						<label for="name">name</label> : <input type="text" name="name" value="" /> <br />
						<label for="email">email</label> : <input type="email" name="email" /> <br />
						<input type="submit" value="Join" /> 
					</form>
				</div>
			</div>
		</div>
	</body>
</html>