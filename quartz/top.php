<html>
	<head>
		<title>Galleries Administration</title>
		<link rel="stylesheet" href="stylesheet.css">
	</head>
	<body>
		<div id="main">
			<?php echo (isset($_GET['err']) && strlen($_GET['err']) > 0 ? '<div class="messageStack Error"><img src="images/err.png"> ' . $_GET['err'] . '</div>' : ''); ?>
			<?php echo (isset($_GET['suc']) && strlen($_GET['suc']) > 0 ? '<div class="messageStack Success"><img src="images/suc.png"> ' . $_GET['suc'] . '</div>' : ''); ?>
			<div id="top" style="width:100%;">
				<a href="../"><img src="images/logo.png" width="600"></a>
			</div>
			<div style="width:100%; height:20px; background-color:#333333; margin-top:-10px;" id="topnav">
				<a href="index.php">Admin Home</a>
				|
				<a href="create_gallery.php">Create Gallery</a>
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