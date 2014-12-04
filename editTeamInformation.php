<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>General Information</title>
	</head>
	<?php
		require_once "dbconnect.php";
		$tid = $_GET['tid'];
		$sql = "SELECT FID FROM team_faculty where TID = $tid and End IS NULL";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		//$result = mysql_query("select @IID as IID", $conn) or die(mysql_error());
		while($entry = mysql_fetch_assoc($result)) {
			//$FID = $field['FID'];
			//$faculty = array();
			//$instructors = array();
			//$tas = array();
			//$instructor = array();
			//$ta = array();
			//echo $FID['FID'];
			$f = $entry['FID'];
				
			$sql = "Select * From faculty where FID = $f";
			$result1 = mysql_query($sql, $conn) or die(mysql_error());
			$field = mysql_fetch_assoc($result1);
			if ($field['Type'] == 0) {
				$instructors[] = $field;
			}
			elseif ($field['Type'] == 1) {
				$tas[] = $field;
			}
		}
		//$sql = "SELECT * FROM team where TID = $tid";
		//$result = mysql_query($sql, $conn) or die(mysql_error());
		//$result = mysql_query("select @TAID as TAID", $conn) or die(mysql_error());
		//$field = mysql_fetch_assoc($result);
		//$TAID = $field['TAID'];
		
		//$sql = "SELECT * FROM instructor where IID = $IID";
		//$result = mysql_query($sql, $conn) or die(mysql_error());
		//$instructor = mysql_fetch_assoc($result);
		//$teams = array(array(0,0,0,0), array("Gary McFall","gmcfall@purdue.edu", "765-494-7804", "Radhika Bhargava", "Computer Science", "bhargavr@purdue.edu"));
		$instructorList = "";
		$countInst = 0;
		foreach($instructors as $instructor) {
			$IID = $instructor['FID'];
			$instName= $instructor['Name'];
			$instEmail = $instructor['Email'];
			$instPhone = $instructor['Phone'];
			$instructorList .= "<option value = " . $countInst . ">" . $instName . "</option>";
			$countInst ++;
			//print $instName;
		}
		foreach($tas as $ta) {
		//$sql = "SELECT * FROM teacher_assistant where TAID = $TAID";
		//$result = mysql_query($sql, $conn) or die(mysql_error());
		//$ta = mysql_fetch_assoc($result);
			$TAID = $ta['FID'];
			$taName = $ta['Name'];
			$taEmail = $ta['Email'];
			$taPhone = $ta['Phone'];
		}
		if (isset($_POST['save'])) {
			$instName = trim($_POST['instName']);
			$instEmail = trim($_POST['instEmail']);
			$instPhone = trim($_POST['instPhone']);
			$taName = trim($_POST['taName']);
			$taEmail = trim($_POST['taEmail']);
			$taPhone = trim($_POST['taPhone']);
			//echo $taName;
			$instName = mysql_real_escape_string($instName);
			$instEmail = mysql_real_escape_string($instEmail);
			$instPhone = mysql_real_escape_string($instPhone);
			$taName = mysql_real_escape_string($taName);
			$taEmail = mysql_real_escape_string($taEmail);
			$taPhone = mysql_real_escape_string($taPhone);
			//echo $taName;
			$sql = "UPDATE team_faculty SET FID = '".$IID."' where TID = $tid";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			
			$sql = "UPDATE team_faculty SET FID = '".$TAID."' where TID = $tid";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			
			header("Location: teamInformation.php?tid=" . $tid);
			
		}
	?>

	<body>
	<form action = "editTeamInformation.php?tid=<?php print $tid ?>" method = "post">
		<label>Instructor</label>
		<?php print "<input class='form-control' class='form-control' class='form-control' class='form-control' type = 'text' value = '". $instName . "' name = 'instName' id = 'instName' />"; ?>
		<label>Instructor Email</label>
		<?php print "<input class='form-control' class='form-control' class='form-control' class='form-control' type = 'text' value = '". $instEmail . "' name = 'instEmail' id = 'instEmail' />"; ?>
		<label>Phone Number</label>
		<?php print "<input class='form-control' class='form-control' class='form-control' class='form-control' type = 'text' value = '". $instPhone . "' name = 'instPhone' id = 'instPhone' />"; ?>
		<label>Teaching Assistant</label>
		<?php print "<input class='form-control' class='form-control' class='form-control' class='form-control' type = 'text' value = '". $taName . "' name = 'taName' id = 'taName' />"; ?>
		<label>Teaching Assistant Email</label>
		<?php print "<input class='form-control' class='form-control' class='form-control' class='form-control' type = 'text' value = '". $taEmail . "' name = 'taEmail' id = 'taEmail' />"; ?>
		<label>Teaching Assistant Phone</label>
		<?php print "<input class='form-control' class='form-control' class='form-control' class='form-control' type = 'text' value = '". $taPhone . "' name = 'taPhone' id = 'taPhone' />"; ?>
		<br />
		<input class='form-control' name = "save" type = "submit" value = "Save"/>
	</form>
	</body>
</html>

<script>
function changeInst() {
	var x = document.getElementById("instructors").value;
	var instructors = $.parseJSON(<?php print json_encode(json_encode($instructors)); ?>);
	document.write(instructors);
}
</script>

		