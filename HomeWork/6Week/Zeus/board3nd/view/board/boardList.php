<?
include "../../header.php";
?>
<?
include_once ('../../common/db.php');
?>

<div id="sub_img"></div>
<div class="clear"></div>
<div id="nav_sub_menu">
	<ul>
		<li>
			<a href="./boardList.php">Board</a>
		</li>
	</ul>
</div>
<div id="article_contents">
	<h1>Board</h1>
	<table id="freeBoard">
		<tr>
			<th scope="col" class="tno" >no.</th>
			<th scope="col" class="ttitle" label for="title">title</th>
			<th scope="col" class="twrite" label for="writer">writer</th>
			<th scope="col" class="tdate" label for="date">date</th>
			<th scope="col" class="tread" label for="readCount">read</th>
		</tr>
		<?php
		$start = $_GET[start];
		$query = "SELECT COUNT(*) FROM board";
		$result = mysql_query($query);
		//$total = mysql_result($result, 0, 0);
		$total = mysql_result($result, 0, 0);
		$page_scale = 10;
		// 화면당 출력할 페이지 수  [1] ~ [10] 까지 한번에 10개씩
		$scale = 10;
		//페이지당 출력 레코드수
		if (!$start)
			$start = 0;
		//시작 페이지 번호가 없을경우 0

		$query = "SELECT * FROM board ORDER BY seq desc LIMIT " . $start*10 . ", " . $page_scale;
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result)) {
			$seq = $row['seq'];
			$title = $row['title'];
			$name = $row['name'];
			$date = $row['reg_date'];
			$read = $row['read_count'];
			echo("<tr><td>$seq</td><td><a href = 'http://localhost/view/board/boardRead.php?seq=$seq'>$title</a></td><td>$name</td><td>$date</td><td>$read</td></tr>");
		}
		?>
	</table>
	<div id="search_table">
		<?
		$total_page = ceil($total / $scale);
		//총 페이지수
		$page = floor($total_page / $page_scale);
		//단위블럭페이지수
		$n_page = floor($start / $page_scale);
		//현재 단위블럭 페이지번호
		if ($n_page > 0) {
			//이전 링크 출력 조건 현재단위블럭 페이지 번호가 0보다 클경우
			$p_start = ($n_page - 1) * $page_scale;
			//현재 단위블럭 페이지 -1 * 단위블럭 페이지 출력수(page_scale)
			$link = "<a href='" . $_SERVER[PHP_SELF] . "?start=${p_start}'>";
			$link .= "이전";
			$link .= "</a>";
			echo $link . " ";
		}
		$is = $n_page * $page_scale;
		//단위블럭 페이지 시작번호 구하기 현재 페이지 번호를 이용하여 현재 단위블럭 페이지 번호를 구하고 그 값을 이용하여 단위블럭 페이지 출력수를 곱한 값
		for ($i = $is; $i < $is + $page_scale; $i++) {
			//i는 현재 단위블럭 페이지 번호*단위블럭 페이지 출력수 부터 시작하고 i는 단위블럭 페이지 출력수를 더한 값만큼만 반복하도록 지정
			if ($i < $total_page) {//i가 총 페이지수 보다 작을 동안만 출력하기 위한조건
				$link = "<a href='" . $_SERVER[PHP_SELF] . "?start=${i}'>";
				$link .= $i + 1;
				//start값이 i로 지정됨으로 화면상 출력기준을 1부터 시작하는 10진수로 맞추기 위해 +1을 연산
				$link .= "</a>";
				echo $link . " ";
			}
		}
		if ($n_page < $page) {//현재 단위블럭 페이지번호 보다 총 단위블럭 페이지 수가 작을 경우에만 다음 링크 출력
			$link = "<a href='" . $_SERVER[PHP_SELF] . "?start=${i}'>";
			//i는 상단 for문에서 이미 마지막 페이지 start번호보다 +1한 값을 가지고 있기 때문에 i를 그냥 출력함
			$link .= "다음";
			$link .= "</a>";
			echo $link;
		}
		?>
		
		<?php
		if ($_SESSION['nickname'] != "") {
			echo "<div id='buttonWrite'><a href='./boardWrite.php'><span>Write</span></a></div>";
		}
		?>
		<form>
			<span> <label for="kind"></label>
				<select name="kind" id="kind">
					<option value="">== select ==</option>
					<option value="title">Title</option>
					<option value="content">Content</option>
					<option value="writer">WriterName</option>
				</select> </span>
			<span> <label for="search"></label>
				<input type="text" name="str" id="str"/>
			</span>
			<span>
				<input type="submit" value="Search" />
			</span>
		</form>
	</div>
</div>
<?
include "../../footer.php";
?>