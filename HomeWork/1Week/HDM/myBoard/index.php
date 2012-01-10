<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Board</title>
	<link href="./resources/style/main.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="wrap">
	<div class="header">
		<div class="logo">
			<a href="/"><img src="resources/images/logo.png" alt="logo"/></a>
		</div>
		<div class="gnb">
			<ul>
				<li>A</li>
				<li>B</li>
				<li>C</li>
				<li>D</li>
				<li>E</li>
			</ul>
		</div>
	</div>
	<div class="search">
		<form action="/" method="get">
			<fieldset>
				<select>
					<option>전체</option>
					<option>게시판분류</option>
					<option>게시판분류</option>
				</select>
				<select>
					<option>전체</option>
					<option>글쓴이</option>
					<option>제목+내용</option>
				</select>
				<input type="text" size="45" maxlength="45" placeholder="검색어를 입력하세요."/>
				<input type="submit" value="검색" />
			</fieldset>
		</form>
	</div>
	<div class="aSide">
		<div class="login">
			<form action="/" method="post">
				<fieldset>
					<input name="id" type="text" size="10" maxlength="15" placeholder="ID" autofocus="true"/>
					<input name="saveId" id="saveId" type="checkbox" /><label for="saveId">ID저장</label>
					<input name="password" type="password" size="10" maxlength="15" placeholder="PASSWORD" />
					<input type="submit" value="로그인" />
					<input type="submit" value="로그아웃" />
				</fieldset>
			</form>
		</div>
		<div class="">
			<a href="/">ID찾기</a>
			<a href="/">PASSWORD찾기</a><br/>
			<a href="/member/save.php">회원가입</a>
			<a href="/member/update.php">정보수정</a>
		</div>
		<div class="sideMenu">
			<ul>
				<li>sideMenu</li>
				<li>sideMenu</li>
				<li>sideMenu</li>
				<li>sideMenu</li>
				<li>sideMenu</li>
				<li>sideMenu</li>
			</ul>
		</div>
	</div>
	<div class="container">
	
		<div class="content">
			content
			<p>a</p>
			<p>a</p>
			<p>a</p>
			<p>a</p>
			<p><a href="/board/save.php">글쓰기</a></p>
		</div>
		
	</div>
	<div class="footer">
		footer
	</div>
</div>
</body>
</html>

