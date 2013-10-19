<?php
	session_start();
	
	define("DB_SERVER", "localhost");
	define("DB_USERNAME", "clpmysqi1");
	define("DB_PASSWORD", "CG0rkLOYY1Nr!");
	define("DB_DATABASE", "clp");
	
	mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
	mysql_select_db(DB_DATABASE);

	function create_session($admin_id)
	{
		$_SESSION['admin_id'] = $admin_id;
	}
	
	
?>