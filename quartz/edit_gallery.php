<?php include('includes.php'); ?>

<?php
	if(!isset($_GET['g']) || strlen($_GET['g']) == 0)
	{
		header("Location: index.php");
		exit;
	}
	if(!file_exists('../galleries/' . $_GET['g']))
	{
		mkdir('../galleries/' . $_GET['g'], 0700, true);
	}
	$dir_handle = opendir('../galleries/' . $_GET['g']);
	if(!$dir_handle)
	{
		header("Location: index.php?err=" . urlencode("Gallery (" . $_GET['g'] . ") could not be opened."));
	}
	
	$res = mysql_query("SELECT * FROM galleries WHERE gallery_num = '" . mysql_real_escape_string($_GET['g']) . "'");
	
	if($res === false)
	{
		header("Location: index.php?err=" . urlencode("Gallery (" . $_GET['g'] . ") could not be found."));
	}
	$row = mysql_fetch_assoc($res);
	
	if(isset($_GET['action']) && $_GET['action'] == 'upload')
	{
		print_r($_POST);
		print_r($_FILES);
		if(count($_FILES['upload']['filesToUpload']))
		{
			$files = reArrayFiles($_FILES);
			print_r($files);
			die;
		}
	}
	else if(isset($_GET['action']) && $_GET['action'] == 'edit')
	{
		
	}
	
?>
	
<?php include('top.php'); ?>
	<script src="functions.js"></script>
	<div style="width:500px; height:500px; background-color:#D2D2D2;">
	<br><br>
	<form action="edit_gallery.php?action=edit&g=<?php echo $_GET['g']; ?>" method="POST">
		<input type="text" name="gallery_id" value="">
	</form>
	<br><br>
	<form action="edit_gallery.php?action=upload&g=<?php echo $_GET['g']; ?>" method="POST">
		Upload photos:
		<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" onchange="updateFiles();">
		<input type="submit" value="Submit" onclick="this.disabled='true';">
		<br><ul id="fileList"></ul>
	</form>
	</div>
	
	<?php
		
	?>
<?php include('bottom.php'); ?>