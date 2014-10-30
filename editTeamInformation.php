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
		//$result = mysql_query("select @IID as IID", $conn) or die(mysql_error());
		$field = mysql_fetch_assoc($result);
		$IID = $field['IID'];
		
		$sql = "SELECT * FROM team where TID = $tid";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		//$result = mysql_query("select @TAID as TAID", $conn) or die(mysql_error());
		$field = mysql_fetch_assoc($result);
		$TAID = $field['TAID'];
		
		$sql = "SELECT * FROM instructor where IID = $IID";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$instructor = mysql_fetch_assoc($result);
		//$teams = array(array(0,0,0,0), array("Gary McFall","gmcfall@purdue.edu", "765-494-7804", "Radhika Bhargava", "Computer Science", "bhargavr@purdue.edu"));
		$instName= $instructor['Name'];
		$instEmail = $instructor['Email'];
		$instPhone = $instructor['Phone'];
		
		$sql = "SELECT * FROM teacher_assistant where TAID = $TAID";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		$ta = mysql_fetch_assoc($result);
		$taName = $ta['Name'];
		$taEmail = $ta['Email'];
		$taPhone = $ta['Phone'];
		
		if (isset($_POST['save'])) {
			$instName = trim($_POST['instName']);
			$instEmail = trim($_POST['instEmail']);
			$instPhone = trime($_POST['instPhone']);
			$taName = trim($_POST['taName']);
			$taEmail = trim($_POST['taEmail']);
			$taPhone = trim($_POST['taPhone']);
			
			$instName = mysql_real_escape_string($instName);
			$instEmail = mysql_real_escape_string($instEmail);
			$instPhone = mysql_real_escape_string($instPhone);
			$taName = mysql_real_escape_string($taName);
			$taEmail = mysql_real_escape_string($taEmail);
			$taPhone = mysql_real_escape_string($taPhone);
			
			$sql = "UPDATE team SET IID = '".$IID."' where TID = $tid";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			
			$sql = "UPDATE team SET TAID = '".$TAID."' where TID = $tid";
			$result = mysql_query($sql, $conn) or die(mysql_error());
			
			header("Location: teamInformation.php?tid=" . $tid);
			
		}
	?>

	<body>
	<form action = "editTeamInformation.php?tid=<?php print $tid ?>" method = "post">
		<p>Instructor</p>
		<?php print "<input type = 'text' value = '". $instName . "' name = 'instName' id = 'instName' />"; ?>
		<p>Instructor Email</p>
		<?php print "<input type = 'text' value = '". $instEmail . "' name = 'instEmail' id = 'instEmail' />"; ?>
		<p>Phone Number</p>
		<?php print "<input type = 'text' value = '". $instPhone . "' name = 'instPhone' id = 'instPhone' />"; ?>
		<p>Teaching Assistant</p>
		<?php print "<input type = 'text' value = '". $taName . "' name = 'taName' id = 'taName' />"; ?>
		<p>Teaching Assistant Email</p>
		<?php print "<input type = 'text' value = '". $taEmail . "' name = 'taEmail' id = 'taEmail' />"; ?>
		<p>Teaching Assistant Phone</p>
		<?php print "<input type = 'text' value = '". $taPhone . "' name = 'taPhone' id = 'taPhone' />"; ?>
		<br />
		<input name = "save" type = "submit" value = "Save"/>
	</form>
	</body>
</html>
		