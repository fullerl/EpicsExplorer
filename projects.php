<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
	<head>
		<title>Projects</title>
	</head>
	<?php
		//$tid = $_GET['tid'];
		$teams = array(array("EPICS", "Fall 2012", "Tool that helps students to select a team.", 10), array("EPICS", "Fall 2012", "Tool that helps students to select a team.", 90));
		$count = 1;
		print "<body>";
		foreach ($teams as $project) {
			print "<p>Project " . $count . "</p>";
			print $project[0];
			print "<p>Initial period</p>";
			print $project[1];
			print "<p>Description</p>";
			print $project[2];
			print "<p>Progress</p>";
			print "<progress value = " . $project[3] . " max = '100'></progress> " . $project[3] . "%";
			print "<hr>";
			$count++;
		}
		print "</body>";
	?>
</html>
		