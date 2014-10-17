<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
	<head>
		<title>General Information</title>
	</head>
	<?php
		$tid = $_GET['tid'];
		$teams = array(array(0,0,0,0), array("Gary McFall","gmcfall@purdue.edu", "765-494-7804", "Radhika Bhargava", "Computer Science", "bhargavr@purdue.edu"));
		$instName= $teams[$tid][0];
		$instEmail = $teams[$tid][1];
		$instPhone = $teams[$tid][2];
		$taName = $teams[$tid][3];
		$taMajor = $teams[$tid][4];
		$taEmail = $teams[$tid][5];
	?>

	<body>
		<p>Instructor</p>
		<?php print $instName; ?>
		<p>Instructor Email</p>
		<?php print $instEmail; ?>
		<p>Phone Number</p>
		<?php print $instPhone; ?>
		<p>Teaching Assistant</p>
		<?php print $taName; ?>
		<p>Teaching Assistant Major</p>
		<?php print $taMajor; ?>
		<p>Teaching Assistant Email</p>
		<?php print $taEmail; ?>
		
	</body>
</html>
		