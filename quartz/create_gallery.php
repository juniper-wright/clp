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

	if(isset($_GET['action']) && $_GET['action'] == 'create' && isset($_POST['gallery_name']) && isset($_POST['event_date']))
	{
		do
		{
			$gallery_num = str_pad(mt_rand(0,999999999), 9, "0");
			$res = mysql_query("SELECT * FROM galleries WHERE gallery_num = '" . $gallery_num . "'");
			$row = mysql_fetch_assoc($res);
		}
		while($row !== false);
		
		$gallery_id = $gallery_num;
		
		if(isset($_POST['gallery_id']) && strlen($_POST['gallery_id']) > 0)
		{
			$res = mysql_query("SELECT * FROM galleries WHERE gallery_id = '" . $_POST['gallery_id'] . "'");
			if(mysql_fetch_assoc($res) !== false)
			{
				header("Location: create_gallery.php?err=" . urlencode("Sorry, that gallery ID already exists. Please try again."));
				exit;
			}
			$gallery_id = $_POST['gallery_id'];
		}
		
		$gallery_name = mysql_real_escape_string($_POST['gallery_name']);
		$event_date = mysql_real_escape_string($_POST['event_date']);
		
		$res = mysql_query("INSERT INTO galleries VALUES ('" . $gallery_num . "', '" . $gallery_id . "', '" . $gallery_name . "', '" . $event_date . "', NOW())");
		if($res !== false)
		{
			mkdir('../galleries/' . $gallery_num, 0777);
			header("Location: edit_gallery.php?g=" . $gallery_num);
			exit;
		}
		else
		{
			$error_message = "Failed to create the gallery. Please try again.";
		}
	}
?>

<?php include('top.php'); ?>
	<div class="editBox">
		<form action="create_gallery.php?action=create" method="POST">
			<table class="editTable">
				<tr>
					<th>
						<label for="gallery_id">Gallery ID: </label>
					</th>
					<td>
						<input type="text" name="gallery_id" size="30" value="">
					</td>
				</tr>
				<tr>
					<th>
						<label for="gallery_id">Gallery Name: </label>
					</th>
					<td>
						<input type="text" name="gallery_name" size="30" value="">
					</td>
				</tr>
				<tr>
					<th>
						<label for="event_date">Event Date: </label>
					</th>
					<td>
						<input type="text" name="event_date" size="30" value="">
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
<?php include('bottom.php'); ?>