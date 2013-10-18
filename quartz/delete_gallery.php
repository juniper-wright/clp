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
	
	$res = mysql_query("DELETE FROM galleries WHERE gallery_num = '" . mysql_real_escape_string($_GET['g']) . "' LIMIT 1");
	if($res === false)
	{
		header("Location: index.php?err=" . urlencode("Gallery (" . $_GET['g'] . ") could not be deleted."));
	}
	else
	{
		header("Location: index.php?suc=" . urlencode("Gallery (" . $_GET['g'] . ") deleted successfully."));
	}
?>

<?php include('top.php'); ?>	
	<form action="edit_gallery.php?action=upload" method="POST">
		Upload photos:
		<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="">
		<input type="submit" value="Submit" onclick="this.disabled='true';">
	</form>
	
	<?php
		
	?>
<?php include('bottom.php'); ?>