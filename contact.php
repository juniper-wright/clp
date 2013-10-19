<?php include("top.php"); ?>
	<div style="width:780px; height:520px; background:#D2D2D2; border: 3px solid #333333; float:left;">
		<div style="margin:50px;">
			<form name="contactform" method="post" action="send_form_email.php">
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