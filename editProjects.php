<?php
	$tid = $_GET['tid'];
?>
<html>
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<form action = "editProjects.php?tid=<?php print $tid ?>" method = "post">
	<label><a href="newProjects.php?tid=<?php print $tid ?>">+New Project</a></label></br>
<?php
	//$v = 0;
	require_once "dbconnect.php";
	$sql = "SELECT PJID FROM team_project where TID = '$tid' and end IS NULL";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	while ($pjid = mysql_fetch_assoc($result)['PJID']) {
		//echo $pjid;
		$sql = "SELECT * FROM project where PJID = '$pjid'";
		$result1 = mysql_query($sql, $conn) or die(mysql_error());
		while ($project = mysql_fetch_assoc($result1)) {
			//print_r($project);
			$name = $project['Name'];
			$start = $project['Start'];
			$description = $project['Description'];
			$progress = $project['Progress'];
			print "<label>Name: <a href = endProject.php?pjid=".$pjid."&tid=".$tid.">END</a></label><div style='text-align:justify'><input class='form-control' type = 'text' maxlength = '50' value = '".$name."' name = n".$project['PJID']."> </br></br></div>";
			print "<label>Start: </label><div style='text-align:justify'><input class='form-control' type = 'text' maxlength = '3' value = '".$start."' name = s".$project['PJID']."></br></div>";
			print "<label>Description: </label><div style='text-align:justify'><textarea class='form-control' name = d".$project['PJID'].">".$description."</textarea></br></div>";
			print "<label>Progress: </label><div style='text-align:justify'><input class='form-control' type = 'text' value = ".$progress." name = p".$project['PJID']."></br></div>";
		}
		if (isset($_POST['Submit'])) {
			$name = $_POST['n'.$pjid];
			$start = $_POST['s'.$pjid];
			$description = $_POST['d'.$pjid];
			$progress = $_POST['p'.$pjid];
			$sql = "UPDATE project SET Name = '$name', Start = '$start', Description = '$description', Progress = '$progress' where PJID = '$pjid'";
			$result2 = mysql_query($sql, $conn) or die(mysql_error());
			header("Location: projects.php?tid=" . $tid);
		}
	}
?>
	<input class='form-control' type='submit' name='Submit' value='Save'></input>
	</form>
</html>
	
	