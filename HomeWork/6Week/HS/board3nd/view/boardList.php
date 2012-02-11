<?
	session_start();
	@extract($_REQUEST);
	$logon = $_SESSION['logon'];
?>
<h1>글 목록</h1>
<table id="boardList">
	<thead>
		<tr>
    		<td colspan="5" class="line"></td>
    	</tr>
		<tr>
			<th class="no">No.</th>
			<th class="title">제 목</th>
			<th class="writer">작성자</th>
			<th class="date">작성일</th>
			<th class="count">조회</th>
		</tr>
	</thead>
	<tbody>	
	<?
		include_once('../model/boardListSelect.php');	
		$result = mysql_query($query);
		while($data = mysql_fetch_array($result)) {
	?>
		<tr>
			<td><?=$data[seq]?></td>
			<td class="title"><a href="#" id="<?=$data[seq]?>"><?=$data[title]?></a></td>
			<td><?=$data[writer_id]?></td>
			<td><?=$data[0]?></td>
			<td><?=$data[visit_count]?></td>
		</tr>
	<?
		}
	?>
		<tr>
    		<td colspan="8" class="line2"></td>
    	</tr>
    <?
    	if($logon[0]) {
    ?>
    	<tr>
    		<td colspan="8" class="boardWrite"><input type="button" id="boardWriteBtn" value="글쓰기" /></td>
    	</tr>
	<?
		}
	?>
    	
	</tbody>
</table>

<div id="pageGroup">
<?
	include_once('../model/paging.php');
?>
</div>

<div id="search">
	<form id="searchForm">
		<select name="category" id="category">
			<option value="boardTitle">제목</option>
			<option value="boardWirter">작성자</option>
		</select>
		<input type="text" name="inputValue" id="inputValue" />
		<input type="submit" value="검색">
	</form>
</div>


