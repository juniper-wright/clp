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
	
	if(get_magic_quotes_gpc())
	{
		$_GET = stripslashes_deep($_GET);
		$_POST = stripslashes_deep($_POST);
	}
	
	function stripslashes_deep($in)
	{
		if(is_array($in))
		{
			foreach($in as $key => $value)
			{
				$in[$key] = stripslashes_deep($value);
			}
		}
		else
		{
			$in = stripslashes($in);
		}
		return $in;
	}
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		<title>Chelsea Lyn Photography | <?php echo str_replace('_','',substr(ucwords(basename($_SERVER['SCRIPT_NAME'])),0,strpos(basename($_SERVER['SCRIPT_NAME']),'.'))); ?></title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<div id="main">
			<?php echo (isset($_GET['err']) && strlen($_GET['err']) > 0 ? '<div class="messageStack Error" onclick="this.style.display=\'none\';" style="cursor:pointer;"><img src="images/err.png"> ' . urldecode($_GET['err']) . '</div>' : ''); ?>
			<?php echo (isset($_GET['suc']) && strlen($_GET['suc']) > 0 ? '<div class="messageStack Success" onclick="this.style.display=\'none\';" style="cursor:pointer;"><img src="images/suc.png"> ' . urldecode($_GET['suc']) . '</div>' : ''); ?>
			<div id="top" style="width:100%;">
				<a href="../"><img src="images/logo.png" width="600"></a>
			</div>
			<div style="" id="topnav">
				<a href="index.php">Admin Home</a>
				|<a href="create_gallery.php">Create Gallery</a>
				|<a href="change_password.php">Change Username/Password</a>
			</div>
			<div class="content" style="padding:15px;">
			<?php
				if(!isset($title))
				{
					$title = basename($_SERVER['SCRIPT_NAME']);
					$title = ucwords(str_replace('_', ' ', $title));
					$title = substr($title, 0, strrpos($title, '.'));
				}
			?>
			<h4><?php echo $title; ?></h4>