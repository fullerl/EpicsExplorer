<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>Projects</title>
	</head>
	<?php
		require_once "dbconnect.php";
		$tid = $_GET['tid'];
		//$teams = array(array("EPICS", "Fall 2012", "Tool that helps students to select a team.", 10), array("EPICS", "Fall 2012", "Tool that helps students to select a team.", 90));
		$count = 1;
		//print "<body>";
		$sql = "SELECT PJID from team_project where TID = '$tid' and end IS NULL";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		while ($pjid = mysql_fetch_assoc($result)['PJID']) {
			$sql = "SELECT * from project where PJID = '$pjid'";
			$result1 = mysql_query($sql, $conn) or die(mysql_error());
			while($project = mysql_fetch_assoc($result1)) {
				print "<label>Project " . $count . "</label><br>";
				print $project['Name']."<br>";
				print "<label>Initial period</label><br>";
				print $project['Start']."<br>";
				print "<label>Description</label><br>";
				print $project['Description']."<br>";
				print "<label>Progress</label><br>";
				print "<div class='progress'><div class='progress-bar' role='progress-bar' area-valuenow = " . $project['Progress'] . " aria-valuemin='0' area-valuemax = '100' style='width: ". $project['Progress']."%;'>".$project['Progress']."%</div></div>";
				print "<hr>";
				$count++;
			}
		}
		//print "</body>";
	?>
</html>
		