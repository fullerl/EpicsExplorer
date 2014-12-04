<?php
	require_once "dbconnect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>General Information</title>
	</head>
	<?php
		$tid = $_GET['tid'];
		$sql = "SELECT * FROM team where TID = $tid";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$teams = mysql_fetch_assoc($result);
		//$teams = array(array(0,0,0,0), array("WISE","Web-based Interactive Software Engineering", "https://engineering.purdue.edu/EPICS/Projects/Teams/viewTeam?teamid=58", "This team is creating web based applications meant to coordinate and inform project partners, members, and volunteers. The applications have to be easy to use while still implementing all of the requested functionality. This provides vaule to the users by simplifying and expanding current outdated processes without overwhelming them."));
		$teamName = $teams['Name'];
		$teamAcro = $teams['Acronym'];
		$teamWeb = $teams['Website'];
		$teamDes = $teams['Description'];
	?>

	<body>
		<label>Name</label><br>
		<?php print $teamName; ?><br>
		<label>Acronym</label><br>
		<?php print $teamAcro; ?><br>
		<label>Website</label><br>
		<?php print "<a href = " . $teamWeb . ">" . $teamWeb . "</a>"; ?><br>
		<label>Description</label><br>
		<?php print $teamDes; ?>
	</body>
</html>
		