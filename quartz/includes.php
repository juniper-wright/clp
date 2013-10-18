<?php
	session_start();
	
	if((!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] < 1) && basename($_SERVER['SCRIPT_NAME']) != 'login.php')
	{
		header('Location: login.php');
		exit;
	}
	
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
	
	function reArrayFiles($file_post)
	{
		$file_array = array();
		$file_keys = array_keys($file_post);
		for ($i = 0; $i < count($file_post['name']; $i++)
		{
			foreach ($file_keys as $key)
			{
				$file_array[$i][$key] = $file_post[$key][$i];
			}
		}
		return $file_array;
	}
?>