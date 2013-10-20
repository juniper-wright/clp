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
	along with CLPPhotoSite.  If not, see <http://www.gnu.org/licenses/>.
	*/ 

	include("top.php");
?>
	<div style="width:780px; height:520px; background:#D2D2D2; border: 3px solid #333333; float:left;">
		<div style="margin:50px;">
			<form name="contactform" method="post" action="contact.php">
				<table width="680" style="font-size: 14px; font-family: Verdana, Arial, Sans-serif;">
					<tr>
						<td valign="top">
							<label for="first_name">First Name *</label>
						</td>
						<td valign="top">
							<input  type="text" name="first_name" maxlength="50" size="30">
						</td>
						<td valign="center" align="left" rowspan="4">
							<a href="http://www.facebook.com/chelsealynphotography"><img width="56px" height="57px" src="images/facebook_icon.png" style="border:none"></a>
							<br>
							Visit me on Facebook!
						</td>
					</tr>
					<tr>
						<td valign="top"">
							<label for="last_name">Last Name *</label>
						</td>
						<td valign="top">
							<input  type="text" name="last_name" maxlength="50" size="30">
						</td>
					</tr>
					<tr>
						<td valign="top">
							<label for="email">Email Address *</label>
						</td>
						<td valign="top">
							<input  type="text" name="email" maxlength="80" size="30">
						</td>
					</tr>
					<tr>
						<td valign="top">
							<label for="telephone">Telephone Number</label>
						</td>
						<td valign="top">
							<input  type="text" name="telephone" maxlength="30" size="30">
						</td>
					</tr>
					<tr>
						<td valign="top">
							<label for="comments">Comments *</label>
						</td>
						<td valign="top" colspan="2">
							<textarea  name="comments" maxlength="1000" cols="50" rows="6"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center">
							<input type="submit" value="Submit">
							<input type="reset" value="Reset">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
<?php include("bottom.php"); ?>