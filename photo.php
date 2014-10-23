<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
	<head>
		<title>General Information</title>
	</head>
	<?php
		$tid = $_GET['tid'];
		$teams = array(array(0,0,0,0), array(link, "Date: 08/10/2013", "This is a photo about the team working in the coordinates of the event Photo by Samuel Sommer."));
		$photoLink = $teams[$tid][0];
		$photoDate = $teams[$tid][1];
		$photoSummary = $teams[$tid][2];
	?>

	<body>
		
	</body>
</html>
		