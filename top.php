<html>
	<head>
		<title>Chelsea Lyn Photography</title>
		<link rel="stylesheet" href="stylesheet.css">
		<script>
			function shownav()
			{
				document.getElementById('sub-nav').style.visibility = "visible";
				document.getElementById('main').style.opacity = "0.7";
			}
			function hidenav()
			{
				document.getElementById('sub-nav').style.visibility = "hidden";
				document.getElementById('main').style.opacity = "1";
			}
		</script>
		<script src="functions.js"></script>


	</head>
	<body style="background:#FFFDD0">
		<div id="watermark"><img src="images/copyright.png" width="1024"></div>
		<div id="main">
			<div id="top" style="width:100%;">
				<img src="images/logo.png" width="600" align="right"><div style="height:150px;">&nbsp;</div>
			</div>
			<div class="nav">
				 <div class="nav">
					<a href="index.php"><img src="images/C1.png" width="204"></a>
				 </div>
				 <div class="nav" onmouseover="shownav();" onmouseout="hidenav();" style="padding-top:20px; position: relative;">
					<img src="images/C2.png" width="204">
					<div id="sub-nav" onmouseover="shownav();" onmouseout="hidenav();">
						<ul style="list-style:none; list-style-type:none; padding:0px;">
							<li><a href="gallery.php?g=families">Families<a></li>
							<li><a href="gallery.php?g=glamour">Glamour<a></li>
							<li><a href="gallery.php?g=weddings">Weddings<a></li>
							<li><a href="gallery.php?g=events">Events<a></li>
							<li><a href="gallery.php?g=personal">Personal Work<a></li>
						</ul>
					</div>
				 </div>
				 <div class="nav">
					<img src="images/C3.png" width="204">
				 </div>
				 <div class="nav">
					<img src="images/C4.png" width="204">
				 </div>
				 <div class="nav">
					<img src="images/C5.png" width="204">
				 </div>
			</div>