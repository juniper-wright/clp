<?php include('includes.php'); ?>

<?php 
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
			$gallery_id = $_POST['gallery_id'];
		}
		
		$gallery_name = mysql_real_escape_string($_POST['gallery_name']);
		$event_date = mysql_real_escape_string($_POST['event_date']);
		
		$res = mysql_query("INSERT INTO galleries VALUES ('" . $gallery_num . "', '" . $gallery_id . "', '" . $gallery_name . "', '" . $event_date . "', NOW())");
		if($res !== false)
		{
			mkdir('../galleries/' . $gallery_num, 0700);
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
	<div style="width:600px; height:400px; background-color:#D2D2D2; border: 1px solid #333333; padding:10px;">
		<form action="create_gallery.php?action=create" method="POST">
			<label for="gallery_id">Gallery ID:</label><input type="text" name="gallery_id">
			<br><br>
			<label for="gallery_name">Gallery Name:</label><input type="text" name="gallery_name">
			<br><br>
			<label for="event_date">Event Date:</label><input type="text" name="event_date">
			<br><br>
			<input type="submit" value="Submit">
		</form>
	</div>
<?php include('bottom.php'); ?>