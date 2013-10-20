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
	if(!file_exists('../galleries/' . $_GET['g']))
	{
		mkdir('../galleries/' . $_GET['g'], 0777, true);
	}
	
	$i = 0;
	$j = 0;
	$dir = '../galleries/' . $_GET['g'] . '/';
	$dir_handle = opendir('../galleries/' . $_GET['g']);
	if($dir_handle !== false)
	{
		while (($file = readdir($dir_handle)) !== false)
		{
			if(!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
			{
				$i++;
			}
		}
		closedir($dir_handle);
		$dir_handle = opendir('../galleries/' . $_GET['g']);
	}
	else
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
			if(strlen($file['tmp_name']) > 0 && getimagesize($file['tmp_name']) !== false)
			{
				move_uploaded_file($file['tmp_name'], $dir . $file['name']);
				$i++;
				$j++;
			}
		}
		$_GET['suc'] = urlencode($j .' files successfully uploaded!');
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
				if(file_exists('../galleries/' . $_GET['g'] . '/' . $filename))
				{
					unlink('../galleries/' . $_GET['g'] . '/' . $filename);
				}
			}
			$_GET['suc'] = urlencode('Successfully deleted files.');
		}
	}

$title = "Edit Gallery: " . $row['gallery_num'];

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
						Upload Photos: <span style="font-size:12px;" id="limit">(limit <?php echo ini_get('max_file_uploads'); ?>)</span><br><br>
						<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" onchange="updateFiles(<?php echo ini_get('max_file_uploads'); ?>);">
						<ul id="fileList"></ul>
						<input type="submit" value="Submit" id="uploadsubmit">
					</form>
				</div>
			</td>
			<td valign="top">
				<form action="edit_gallery.php?g=<?php echo $_GET['g']; ?>&action=delete" method="POST">
					<?php
						if($i > 0)
						{
							echo '<script src="../jquery.js"></script>';
							echo '<label for="selectall">Select All</label><input type="checkbox" name="selectall" onchange="selectAll(this); return false;"><input type="Submit" value="Delete Selected" style="margin-left:30px;">' . "\r\n";
							echo '<br>';
						}
						while($filename = readdir($dir_handle))
						{
							if(!in_array($filename, array('.', '..')) && !is_dir($dir.$filename) && strpos($filename, 't_') === false) 
							{
								echo '<div class="imagebox"><input type="checkbox" name="delete[]" value="' . $filename . '"><span>' . $filename . '</span><img src="../galleries/' . $_GET['g'] . '/' . $filename . '"></div>' . "\r\n";
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