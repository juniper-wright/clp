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
	
	$gallery_num = mysql_real_escape_string($_GET['g']);
	$res = mysql_query("SELECT * FROM galleries WHERE gallery_num = '" . $gallery_num . "'");
	
	if($res === false)
	{
		header("Location: index.php?err=" . urlencode("Gallery (" . $_GET['g'] . ") could not be found."));
	}
	$row = mysql_fetch_assoc($res);
	
	if(isset($_GET['action']) && $_GET['action'] == 'upload' && isset($_FILES['filesToUpload']) && count($_FILES['filesToUpload']) > 0)
	{
		$files = reArrayFiles($_FILES['filesToUpload']);
		foreach($files as $file)
		{
			if(getimagesize($file['tmp_name']) !== false)
			{
				move_uploaded_file($file['tmp_name'], '../galleries/' . $_GET['g'] . '/' . $file['name']);
			}
		}
		$_GET['suc'] = urlencode('Successfully uploaded!');
		$dir_handle = opendir('../galleries/' . $_GET['g']);
	}
	else if(isset($_GET['action']) && $_GET['action'] == 'upload')
	{
		$_GET['err'] = urlencode('File upload has failed. You probably tried to upload too-large images (>' . ini_get('upload_max_filesize') . '/ea, or >' . ini_get('post_max_size') . ' total).');
	}
	else if(isset($_GET['action']) && $_GET['action'] == 'edit')
	{
		$gallery_id = mysql_real_escape_string($_POST['gallery_id']);
		$gallery_name = mysql_real_escape_string($_POST['gallery_name']);
		$event_date = mysql_real_escape_string($_POST['event_date']);
		mysql_query("UPDATE galleries SET gallery_id = '" . $gallery_id . "', gallery_name = '" . $gallery_name . "', event_date = '" . $event_date . "' WHERE gallery_num = '" . $gallery_num . "' LIMIT 1");
		if(mysql_affected_rows() > 0)
		{
			header("Location: index.php?suc=" . urlencode("Gallery (" . $_GET['g'] . ") successfully updated."));
		}
		else
		{
			$_GET['err'] = urlencode("Failed to update Gallery " . $_GET['g'] . ". Please try again.");
		}
	}
	else if(isset($_GET['action']) && $_GET['action'] == 'delete')
	{
		if(isset($_POST['delete']))
		{
			foreach($_POST['delete'] as $filename)
			{
				unlink('../galleries/' . $_GET['g'] . '/' . $filename);
				$_GET['suc'] = urlencode('Successfully deleted files.');
			}
		}
	}

$title = "Edit Gallery: " . $row['gallery_name'];

include('top.php');

?>
	<table width=100%>
		<tr>
			<td valign="top" width="500">
				<div class="editBox">
					<script src="functions.js"></script>
					<form action="edit_gallery.php?action=edit&g=<?php echo $_GET['g']; ?>" method="POST">
						Modify Gallery Settings:<br><br>
						<table class="editTable">
							<tr>
								<th>
									<label for="gallery_id">Gallery ID: </label>
								</th>
								<td>
									<input type="text" name="gallery_id" size="30" value="<?php echo $row['gallery_id']; ?>">
								</td>
							</tr>
							<tr>
								<th>
									<label for="gallery_id">Gallery Name: </label>
								</th>
								<td>
									<input type="text" name="gallery_name" size="30" value="<?php echo $row['gallery_name']; ?>">
								</td>
							</tr>
							<tr>
								<th>
									<label for="event_date">Event Date: </label>
								</th>
								<td>
									<input type="text" name="event_date" size="30" value="<?php echo $row['event_date']; ?>">
								</td>
							</tr>
							<tr>
								<th colspan="2">
									<input type="Submit" value="Submit">
								</th>
							</tr>
						</table>
					</form>
				</div>
				<div class="editBox">
					<form action="edit_gallery.php?action=upload&g=<?php echo $_GET['g']; ?>" method="POST" enctype="multipart/form-data">
						Upload Photos:<br><br>
						<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" onchange="updateFiles();">
						<ul id="fileList"></ul>
						<input type="submit" value="Submit" onclick="this.disabled='true';">
					</form>
				</div>
			</td>
			<td>
				<form action="edit_gallery.php?g=<?php echo $_GET['g']; ?>&action=delete" method="POST">
					<input type="Submit" value="Delete Selected"><br>
					<?php
						while($filename = readdir($dir_handle))
						{
							if($filename != '.' && $filename != '..')
							{
								echo '<div class="imagebox"><input type="checkbox" name="delete[]" value="' . $filename . '" style="margin-left:-13px;"><img src="../galleries/' . $_GET['g'] . '/' . $filename . '"></div>' . "\r\n";
							}
						}
					?>
				</form>
			</td>
		</tr>
	</table>
	<?php
		
	?>
<?php include('bottom.php'); ?>