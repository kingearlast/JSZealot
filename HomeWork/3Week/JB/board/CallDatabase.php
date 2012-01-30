<?php
	ini_set("display_errors", "1");
	$link = mysql_connect('localhost', 'root', 'apmsetup');
	$db_selected = mysql_select_db('jb', $link);
	mysql_query('set names euckr');

	
?>