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
	
	include('includes.php');

	if(!isset($_GET['g']) || strlen($_GET['g']) == 0)
	{
		header("Location: index.php");
		exit;
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