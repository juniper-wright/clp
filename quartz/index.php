<?php include('top.php'); ?>
	<table style="width:60%; max-width:1000px;">
		<tr class="dataTableHeadingRow">
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
						' . $row['gallery_id'] . '
					</td>
					<td class="dataTableContent">
						' . $row['gallery_name'] . '
					</td>
					<td class="dataTableContent">
						' . $row['event_date'] . '
					</td>
					<td class="dataTableContent" style="text-align:right;">
						' . 'CONTROLS GO HERE' . '
				</tr>';
			}
			if(mysql_num_rows($res) == 0)
			{
				echo '<tr class="dataTableRow"><td colspan="4" style="text-align:center;" class="dataTableContent">No Galleries Exist. <a href="create_gallery.php">Create one?</a></td></tr>';
			}
		?>
	</table>
<?php include('bottom.php'); ?>