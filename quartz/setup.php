<?php
	$link = mysql_connect('LOCALHOST', 'clpmysqi1', 'CG0rkLOYY1Nr!');
	mysql_select_db('clp', $link);
	mysql_query("INSERT INTO administrators (admin_name, admin_pass) VALUES ('clm', '" . crypt('password', 'clmclpsalt') . "')");

?>