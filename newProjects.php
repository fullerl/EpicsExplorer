<?php
	$tid = $_GET['tid'];
?>
<html>
	<form action = "newProjects.php?tid=<?php print $tid ?>" method = "post">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	//$v = 0;
	require_once "dbconnect.php";
	//$sql = "SELECT PJID FROM team_project where TID = '$tid'";
	//$result = mysql_query($sql, $conn) or die(mysql_error());
	//$pjid = mysql_fetch_assoc($result)['PJID'];
	//echo $pjid;
	//$sql = "SELECT * FROM project where PJID = '$pjid'";
	//$result1 = mysql_query($sql, $conn) or die(mysql_error());
	//while ($project = mysql_fetch_assoc($result1)) {
		//print_r($project);
		$name = "";
		$start = "";
		$description = "";
		$progress = "";
		print "<label>Name: </label><div style='text-align:justify'><input class='form-control' type = 'text' maxlength = '50' value = '".$name."' name = name></br></div>";
		print "<label>Start: </label><div style='text-align:justify'><input class='form-control' type = 'text' maxlength = '3' value = '".$start."' name = start></br></div>";
		print "<label>Description: </label><div style='text-align:justify'><textarea class='form-control' name = description>".$description."</textarea></br></div>";
		print "<label>Progress: </label><div style='text-align:justify'><input class='form-control' type = 'text' value = '".$progress."' name = progress></br></div>";
	//}
	if (isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$start = $_POST['start'];
		$description = $_POST['description'];
		$progress = $_POST['progress'];
		//$sql = "UPDATE project SET Name = '$name', Start = '$start', Description = '$description', Progress = '$progress' where PJID = '$pjid'";
		$sql = "INSERT INTO project VALUES (null,'$name','$start','$description','$progress')";
		$result2 = mysql_query($sql, $conn) or die(mysql_error());
		$sql = "Select PJID from project where Name = '$name'";
		$result3 = mysql_query($sql, $conn) or die(mysql_error());
		$pjid = mysql_fetch_assoc($result3)['PJID'];
		echo $pjid;
		$sql = "INSERT INTO team_project VALUES ('$tid','$pjid','$start',null)";
		$result4 = mysql_query($sql, $conn) or die(mysql_error());
		header("Location: projects.php?tid=" . $tid);
		
		
	}
	if (isset($_POST['GoBack'])) {
		header("Location: editProjects.php?tid=" . $tid);
	}
?>
	<input class='form-control' type='submit' name='Submit'></input>
	<input class='form-control' type="submit" name = "GoBack" value = "Go Back">
	</form>
</html>
	
	