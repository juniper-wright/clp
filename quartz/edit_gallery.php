<?php include('top.php'); ?>
	<?php
		if(!isset($_GET['g']) || strlen($_GET['g']) == 0)
		{
			header("Location: index.php");
			exit;
		}
	?>
<?php include('bottom.php'); ?>