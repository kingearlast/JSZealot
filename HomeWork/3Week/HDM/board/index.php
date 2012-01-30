<?
	$path = $_SERVER[DOCUMENT_ROOT]."/board";
	session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Board</title>
	<link type="text/css" href="./resources/style/main.css" rel="stylesheet"></link>
	<script type="text/javascript" src="./resources/lib/jquery-1.6.2.js"></script>
	<script type="text/javascript" src="./resources/lib/json2.js"></script>
	<script type="text/javascript" src="./resources/script/formSubmit.js"></script>
	<script type="text/javascript" src="./resources/script/bindAjax.js"></script>
</head>
<body>
<div id="wrap">
	<div class="header">
		<div class="logo">
			<a href="/"><img src="./resources/images/logo.png" alt="logo"/></a>
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
		<form action="/board/board/search.php" method="get">
			<fieldset>
				<select name="category">
					<option>전체</option>
					<option value="bbs">게시판</option>
					<option value="alram">공지사항</option>
				</select>
				<select name="filter">
					<option>전체</option>
					<option value="writer">글쓴이</option>
					<option value="content">제목+내용</option>
				</select>
				<input name="keyword" type="text" size="45" maxlength="45" placeholder="검색어를 입력하세요."/>
				<input id="searchFormBtn" type="submit" value="검색" />
			</fieldset>
		</form>
	</div>
	<div class="aSide">
		<? require_once($path."/member/loginForm.php"); ?>
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
		<div id="content" class="content">
			<? require_once($path."/board/list.php"); ?>
		</div>
		<p><a id="boardLink" href="/board/board/index.php">글목록</a></p>
		<?
			if ( $_SESSION["isLogin"]){
			?> 
				<p><a id="writeBoardLink" href="/board/board/saveForm.php?id=<?= $_SESSION["id"]; ?>">글쓰기</a></p>
			<?		
			}
		?>		
	</div>
	<div class="footer">
		footer
	</div>
</div>
</body>
</html>

<script type="text/javascript">

	$(document).ready(function(){
					// 바인딩할 엘리먼트, 파라미터생성Fn, Ajax요청 후 실행될 콜백
		bindRequestAjax('#saveMemberLink', null, idCheckCallback); // 회원가입 ajax 바인드
		bindRequestAjax('#writeBoardLink', createIdParam, submitBoard); // 글쓰기 버튼 ajax 바인드
		bindRequestAjax('.boardList', null, updateBoardCallback); // 게시판 글목록 중 a 링크 모두 상세보기 페이지 ajax 요청 바인드
		bindRequestAjax('.pageLink', null, null); // 페이징 링크 클릭 바인드
		// $('.pageLink').delegate('', 'click', function(event){
			// event.preventDefault();
			// var url = $(this).attr('href');
			// $('#content').load(url);
		// });
		// 수정폼 불러온후 수정적용 버튼에 updateBoardCallback 로 바인드
		bindRequestAjax('#updateMemberBtn', createIdParam, submitJoin); // 회원정보 수정 ajax 바인드
		bindRequestAjax('#searchFormBtn', createSearchParam, null); // 검색 폼 바인드
		
	});
	
	
	function createIdParam(){
		var id = '<?= $_SESSION["id"]; ?>';	
		return { 'id' : id };
	} 
	
</script>


