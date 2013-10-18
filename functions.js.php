<?php
	header("Content-type: text/javascript");
	include('includes.php');
	
	$_GET['g'] = mysql_real_escape_string($_GET['g']);
	if(isset($_GET['g']) && strlen($_GET['g']) > 0 && !is_numeric($_GET['g']))
	{
		$dir_handle = opendir('galleries/' . $_GET['g']);
		$filename_string = '';
		while($filename = readdir($dir_handle))
		{
			if($filename != '.' && $filename != '..')
			{
				$filename_string .= '["galleries/' . $_GET['g'] . '/' . $filename . '"],';
			}
		}
		$filename_string = substr($filename_string, 0, -1);
?>


var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [780, 520], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [<?php echo $filename_string; ?>],
	displaymode: {type:'auto', pause:2500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "none",
	togglerid: ""
})
<?php 	}
	else if(isset($_GET['g']) && strlen($_GET['g']) > 0)
	{
		$res = mysql_query("SELECT gallery_num FROM galleries WHERE gallery_num = '" . $_GET['g'] . "' OR gallery_id = '" . $_GET['g'] . "'");
		$row = ($res !== false ? mysql_fetch_assoc($res) : false);
		$row = ($row !== false ? $row['gallery_num'] : false);
		if($row === false)
		{
			
		}
	}
?>

function shownav()
{
	document.getElementById('sub-nav').style.visibility = "visible";
	<!-- document.getElementById('main').style.opacity = "0.7"; -->
}
function hidenav()
{
	document.getElementById('sub-nav').style.visibility = "hidden";
	<!-- document.getElementById('main').style.opacity = "1"; -->
}

function showlogin()
{
	document.getElementById('login').style.visibility = "visible";
	document.getElementById('g').focus();
	<!-- document.getElementById('main').style.opacity = "0.7"; -->
}
function hidelogin()
{
	document.getElementById('login').style.visibility = "hidden";
	<!-- document.getElementById('main').style.opacity = "1"; -->
}