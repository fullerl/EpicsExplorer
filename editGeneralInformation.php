<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
	<head>
		<title>General Information</title>
	</head>
	<?php
		$tid = $_GET['tid'];
		$teams = array(array(0,0,0,0), array("WISE","Web-based Interactive Software Engineering", "https://engineering.purdue.edu/EPICS/Projects/Teams/viewTeam?teamid=58", "This team is creating web based applications meant to coordinate and inform project partners, members, and volunteers. The applications have to be easy to use while still implementing all of the requested functionality. This provides vaule to the users by simplifying and expanding current outdated processes without overwhelming them."));
		$teamAcro = $teams[$tid][0];
		$teamName = $teams[$tid][1];
		$teamWeb = $teams[$tid][2];
		$teamDes = $teams[$tid][3];
	?>

	<body>
		<p>Name</p>
		<?php print "<input type = 'text' value = ". $teamName . " name = 'teamName' id = 'teamName' />"; ?>
		<p>Acronym</p>
		<?php print "<input type = 'text' value = ". $teamAcro . " name = 'teamAcro' id = 'teamAcro' />"; ?>
		<p>Website</p>
		<?php print "<input type = 'text' value = ". $teamWeb . " name = 'teamWeb' id = 'teamWeb' />"; ?>
		<p>Description</p>
		<?php print "<textarea style = 'width:100%' rows = '4' cols = '50'>" . $teamDes . "</textarea>";?>
		<br />
		<input name = "save" type = "submit" value = "Save" onclick = "location.href = 'generalInfo.php?tid=<?php print $tid; ?>'"/>
	</body>
</html>
		