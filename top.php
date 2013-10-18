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
	</head>
	<body style="background:#FFFDD0">
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
						Families<br>
						Glamour<br>
						Weddings<br>
						Events<br>
						Personal Work
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