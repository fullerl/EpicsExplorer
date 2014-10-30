<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
	<head>
		<title>General Information</title>
	</head>
	<?php
		require_once "dbconnect.php";
		$tid = $_GET['tid'];
		$sql = "SELECT * FROM team where TID = $tid";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$teams = mysql_fetch_assoc($result);
		//$teams = array(array(0,0,0,0), array("WISE","Web-based Interactive Software Engineering", "https://engineering.purdue.edu/EPICS/Projects/Teams/viewTeam?teamid=58", "This team is creating web based applications meant to coordinate and inform project partners, members, and volunteers. The applications have to be easy to use while still implementing all of the requested functionality. This provides vaule to the users by simplifying and expanding current outdated processes without overwhelming them."));
		$teamName = $teams['Name'];
		$teamAcro = $teams['Acronym'];
		$teamWeb = $teams['Website'];
		$teamDes = $teams['Description'];
		if (isset($_POST['save'])) {
			$teamName = trim($_POST['teamName']);
			$teamAcro = trim($_POST['teamAcro']);
			$teamWeb = trim($_POST['teamWeb']);
			$teamDes = trim($_POST['teamDes']);
			
			$teamName = mysql_real_escape_string($teamName);
			$teamAcro = mysql_real_escape_string($teamAcro);
			$teamWeb = mysql_real_escape_string($teamWeb);
			$teamDes = mysql_real_escape_string($teamDes);
			
			$sql = "UPDATE team SET Name = '".$teamName."', Acronym = '".$teamAcro."', Website = '".$teamWeb."', Description = '".$teamDes."' where TID = $tid";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			
			header("Location: generalInfo.php?tid=" . $tid);
		}
	?>

	<body>
	<form action = "editGeneralInformation.php?tid=<?php print $tid ?>" method = "post">
		<p>Name</p>
		<?php print "<input type = 'text' value = '". $teamName . "' name = 'teamName' id = 'teamName' />"; ?>
		<p>Acronym</p>
		<?php print "<input type = 'text' value = '". $teamAcro . "' name = 'teamAcro' id = 'teamAcro' />"; ?>
		<p>Website</p>
		<?php print "<input type = 'text' value = '". $teamWeb . "' name = 'teamWeb' id = 'teamWeb' />"; ?>
		<p>Description</p>
		<?php print "<textarea name = 'teamDes' style = 'width:100%' rows = '4' cols = '50'>" . $teamDes . "</textarea>";?>
		<br />
		<input name = "save" type = "submit" value = "Save" />
	</form>
	</body>
</html>
		