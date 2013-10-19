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

	if(isset($_GET['action']) && $_GET['action'] == 'change')
	{
		if(!isset($_POST['username']) || strlen($_POST['username']) == 0)
		{
			$_POST['username'] = $_SESSION['admin_name'];
		}
		
		if((!isset($_POST['new_password']) || strlen($_POST['new_password']) == 0) && (!isset($_POST['conf_password']) || strlen($_POST['conf_password']) == 0))
		{
			$_POST['new_password'] = 'SKIP';
			$_POST['conf_password'] = 'SKIP';
		}
		
		if(!isset($_POST['old_password']) || strlen($_POST['old_password']) == 0)
		{
			$_GET['err'] = urlencode('Please input your old password.');
		}
		else if(!isset($_POST['new_password']) || strlen($_POST['new_password']) == 0)
		{
			$_GET['err'] = urlencode('Please input your new password.');
		}
		else if(!isset($_POST['conf_password']) || strlen($_POST['conf_password']) == 0)
		{
			$_GET['err'] = urlencode('Please confirm your new password.');
		}
		else if($_POST['new_password'] != $_POST['conf_password'])
		{
			$_GET['err'] = urlencode('Your new passwords do not match.');
		}
		else
		{
			$old_name = mysql_real_escape_string($_SESSION['admin_name']);
			$new_name = mysql_real_escape_string($_POST['username']);
			$old_pass = crypt(mysql_real_escape_string($_POST["old_password"]), '$2a$77clmclpsalt22clmclpsalt');
			$new_pass = crypt(mysql_real_escape_string($_POST["new_password"]), '$2a$77clmclpsalt22clmclpsalt');
			
			$query_extra = '';
			if($_POST['new_password'] != 'SKIP')
			{
				$query_extra = ", admin_pass = '" . $new_pass . "'";
			}
			
			$query = "UPDATE administrators SET admin_name = '" . $new_name . "'" . $query_extra . " WHERE admin_name = '" . $old_name . "' AND admin_pass = '" . $old_pass . "' LIMIT 1";
			mysql_query($query);
			if(mysql_affected_rows() == 1)
			{
				$_SESSION['admin_name'] = $new_name;
				header("Location: index.php?suc=" . urlencode('Username/password successfully changed!'));
				exit;
			}
			else
			{
				$_GET['err'] = mysql_error();
			}
		}
	}

include('top.php');
?>
	<div class="editBox">
		<script src="functions.js"></script>
		<form action="change_password.php?action=change" method="POST">
			Change User Settings:<br><br>
			<table class="editTable">
				<tr>
					<th>
						<label for="username">Username: </label>
					</th>
					<td>
						<input type="text" name="username" size="30" value="<?php echo $_SESSION['admin_name']; ?>">
					</td>
				</tr>
				<tr>
					<th>
						<label for="old_password">Old Password: </label>
					</th>
					<td>
						<input type="password" name="old_password" size="30" value="">
					</td>
				</tr>
				<tr>
					<th>
						<label for="new_password">New Password: </label>
					</th>
					<td>
						<input type="password" name="new_password" size="30" value="">
					</td>
				</tr>
				<tr>
					<th>
						<label for="conf_password">Confirm: </label>
					</th>
					<td>
						<input type="password" name="conf_password" size="30" value="">
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<input type="submit" value="Submit">
					</th>
				</tr>
			</table>
		</form>
	</div>
<?php include('bottom.php'); ?>