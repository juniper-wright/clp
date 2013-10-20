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
	<div style="padding:35px; padding-bottom: 46px; background-color:#D2D2D2; font-family: Verdana, Arial, Sans-serif; font-size:16px;">
		Please use this fill out this form and tell me a little about your family or event, and I will get back to you within 48 hours.
		<br>
		<hr style="margin-top:15px;">
		<form name="contactform" method="post" action="contact.php">
			<table width="680" style="font-size: 14px; font-family: Verdana, Arial, Sans-serif;">
				<tr>
					<td valign="top">
						<label for="first_name">First Name *</label>
					</td>
					<td valign="top">
						<input  type="text" name="first_name" maxlength="50" size="30">
					</td>
					<td valign="center" align="left" rowspan="4" width="280">
						<a href="http://www.facebook.com/chelsealynphotography" target="_blank"><img width="56" height="56" src="images/facebook_icon.png" style="border:none"></a>
						<a href="//www.etsy.com/shop/ChelseaLynPhoto?ref=offsite_badges&utm_source=sellers&utm_medium=badges&utm_campaign=en_isell_1" target="_blank"><img width="56" height="56" src="images/etsy.png"></a>
						<a href="http://chelsealynphoto.wordpress.com/" target="_blank"><img width="56" height="56" src="images/wordpress.png" style="border:none;"></a>
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
					<td></td>
					<td colspan="2" align="left">
						<input type="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
		<hr>
		You can also contact me directly via:<br>
		<table>
			<tr>
				<th width="150" align="left">Email:</th>
				<td align="left"><a href="mailto:chelsea@chelsealynphotography.com">Chelsea@ChelseaLynPhotography.com</a></td>
			</tr>
			<tr>
				<th width="150" align="left">Telephone:</th>
				<td align="left">(267) 586-7254</td>
			</tr>
		</table>
		Serving Philadelphia and surrounding areas.
	</div>
<?php include("bottom.php"); ?>