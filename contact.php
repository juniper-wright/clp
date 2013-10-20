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
	
	$disclaimer_height = 600;
	
	$error_message = "";
	if(isset($_POST['email']) && isset($_POST['jsc']))
	{
		// EDIT THE 2 LINES BELOW AS REQUIRED
		$email_to = "chelsea@chelsealynphotography.com";
		$email_subject = "Contact Form Email";
     
     
		function died($error)
		{
			// your error code can go here
//			echo "We are very sorry, but there were error(s) found with the form you submitted. ";
//			echo "These errors appear below.<br /><br />";
//			echo $error."<br /><br />";
//			echo "Please go back and fix these errors.<br /><br />";
		}
		
		$name = $_POST['name'];
		$email_from = $_POST['email'];
		$telephone = $_POST['telephone'];
		$best_time = $_POST['best_time'];
		$comments = $_POST['comments'];
		
		if(!filter_var($email_from, FILTER_VALIDATE_EMAIL))
		{
			$error_message = 'The Email Address you entered does not appear to be valid.';
		}
		if(strlen($telephone) == 0 && strlen($email_from) == 0)
		{
			$error_message = 'I need some way to contact you!';
		}
		
		$email_message = "The following was generated via the contact form on chelsealynphotography.com. If there are links in it, think twice before clicking them.\n\n";
	     
		function clean_string($string)
		{
			$bad = array("content-type","bcc:","to:","cc:","href");
			return str_replace($bad,"",$string);
		}
	     
		$email_message .= "Name: ".clean_string($name)."\n";
		$email_message .= "Email: ".clean_string($email_from)."\n";
		$email_message .= "Telephone: ".clean_string($telephone)."\n";
		$email_message .= "Best Time to Reach: ".clean_string($best_time)."\n";
		$email_message .= "Comments: ".clean_string($comments)."\n";
	     
	     
		// create email headers
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		
		$success = @mail($email_to, $email_subject, $email_message, $headers);
		if(!$success)
		{
			$error_message = 'An error occurred. Please try again.';
		}
	}
?>
	<style>.photoslider{background: #EEE;}</style>
	<div style="padding:30px; font-family: Verdana, Arial, Sans-serif; font-size:16px;">
		<?php
			if(isset($success) && $success === true)
			{
				echo 'Thanks for contacting me! I\'ll be sure to get back to you within 48 hours!';
			}
			else if(strlen($error_message) > 0)
			{
				echo '<span class="error">' . $error_message . '</span>';
			}
			else
			{
				echo 'Please use this fill out this form and tell me a little about your family or event, and I will get back to you within 48 hours.';
			}
		?>
		<br>
		<hr style="margin-top:15px;">
		<form name="contactform" method="post" action="contact.php">
			<table width="680" style="font-size: 14px; font-family: Verdana, Arial, Sans-serif;">
				<tr>
					<td valign="top">
						<label for="name">Name</label>
					</td>
					<td valign="top">
						<input  type="text" name="name" maxlength="100" size="30" tabindex="1">
					</td>
					<td valign="center" align="left" rowspan="4" width="220">
						<a href="http://www.facebook.com/chelsealynphotography" target="_blank"><img width="56" height="56" src="images/facebook_icon.png" style="border:none"></a>
						<a href="//www.etsy.com/shop/ChelseaLynPhoto?ref=offsite_badges&utm_source=sellers&utm_medium=badges&utm_campaign=en_isell_1" target="_blank"><img width="56" height="56" src="images/etsy.png"></a>
						<a href="http://chelsealynphoto.wordpress.com/" target="_blank"><img width="56" height="56" src="images/wordpress.png" style="border:none;"></a>
					</td>
				</tr>
				<tr>
					<td valign="top">
						<label for="email">Email Address</label>
					</td>
					<td valign="top">
						<input  type="text" name="email" maxlength="80" size="30" tabindex="2">
					</td>
				</tr>
				<tr>
					<td valign="top">
						<label for="telephone">Telephone Number</label>
					</td>
					<td valign="top">
						<input  type="text" name="telephone" maxlength="30" size="30" tabindex="3">
					</td>
				</tr>
				<tr>
					<td valign="top"">
						<label for="best_time">Best Time to Reach You</label>
					</td>
					<td valign="top">
						<input  type="text" name="best_time" maxlength="100" size="30" tabindex="4">
					</td>
				</tr>
				<tr>
					<td valign="top">
						<label for="comments">Comments</label>
					</td>
					<td valign="top" colspan="2">
						<textarea  name="comments" maxlength="1000" cols="50" rows="6" tabindex="5"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2" align="left">
						<input type="submit" value="Submit" tabindex="6">
					</td>
				</tr>
			</table>
			<script>document.write('<input type="hidden" style="display:none;" name="jsc" value="jsc">');</script>
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