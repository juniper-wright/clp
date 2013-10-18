<?php
	include('includes.php');
	$title = "Admin Home";
	include('top.php');
?>
	<table style="width:60%; max-width:1000px;">
		<tr class="dataTableHeadingRow">
			<th class="dataTableHeadingContent">Gallery Number</th>
			<th class="dataTableHeadingContent">Gallery ID</th>
			<th class="dataTableHeadingContent">Gallery Name</th>
			<th class="dataTableHeadingContent">Event Date</th>
			<th class="dataTableHeadingContent">Controls</th>
		</tr>
		<?php
			$res = mysql_query('SELECT * FROM galleries');
			while($row = mysql_fetch_assoc($res))
			{
				echo '
				<tr class="dataTableRow">
					<td class="dataTableContent">
						' . $row['gallery_num'] . '
					</td>
					<td class="dataTableContent">
						' . $row['gallery_id'] . '
					</td>
					<td class="dataTableContent">
						' . $row['gallery_name'] . '
					</td>
					<td class="dataTableContent">
						' . $row['event_date'] . '
					</td>
					<td class="dataTableContent">
						<a href="../gallery.php?g=' . $row['gallery_num'] . '">View</a> | <a href="edit_gallery.php?g='. $row['gallery_num'] . '">Edit</a> | <a href="delete_gallery.php?g=' . $row['gallery_num'] . '" onclick="return confirm(\'Are you sure you want to delete Gallery ' . $row['gallery_num'] . '?\');">Delete</a>
				</tr>';
			}
			if(mysql_num_rows($res) == 0)
			{
				echo '<tr class="dataTableRow"><td colspan="5" class="dataTableContent">No Galleries Exist. <a href="create_gallery.php">Create one?</a></td></tr>';
			}
		?>
	</table>
<?php include('bottom.php'); ?>