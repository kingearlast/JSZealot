<h1>webBOARD</h1>
<nav id="menu">
	<ul>
		<? if($loginID == "") { ?>
		<li> <a href="../Member/loginForm.php">login</a> </li>
		<li> <a href="../Member/joinForm.php">join</a> </li>
		<? }?>
		<? if($loginID != "") { ?>
		<li> <a href="../Member/logout.php">logout</a> </li>
		<? }?>
		<li> <a href="../Board/readList.php">readList</a> </li>
	</ul>
</nav>