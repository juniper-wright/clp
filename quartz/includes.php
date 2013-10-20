<?php
	/*
	This file is part of CLPPhotoSite.

	CLPPhotoSite is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	CLPPhotoSite is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
	*/ 

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

	function create_session($admin)
	{
		$_SESSION['admin_id'] = $admin['admin_id'];
		$_SESSION['admin_name'] = $admin['admin_name'];
		setcookie('PHPSESSID', $_COOKIE['PHPSESSID'], time()+3600, '/');
	}
	
	function reArrayFiles($file_post)
	{
		$file_array = array();
		$file_keys = array_keys($file_post);
		for ($i = 0; $i < count($file_post['name']); $i++)
		{
			foreach ($file_keys as $key)
			{
				$file_array[$i][$key] = $file_post[$key][$i];
			}
		}
		return $file_array;
	}
?>