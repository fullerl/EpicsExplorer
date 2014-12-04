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
		foreach($instructors as $instructor) {
			$instName= $instructor['Name'];
			$instEmail = $instructor['Email'];
			$instPhone = $instructor['Phone'];
		}
		foreach($tas as $ta) {
		//$sql = "SELECT * FROM teacher_assistant where TAID = $TAID";
		//$result = mysql_query($sql, $conn) or die(mysql_error());
		//$ta = mysql_fetch_assoc($result);
			$taName = $ta['Name'];
			$taEmail = $ta['Email'];
			$taPhone = $ta['Phone'];
		}
	?>

	<body>
		<label>Instructor</label><br>
		<?php print $instName; ?><br>
		<label>Instructor Email</label><br>
		<?php print $instEmail; ?><br>
		<label>Instructor Phone</label><br>
		<?php print $instPhone; ?><br>
		<label>Teaching Assistant</label><br>
		<?php print $taName; ?><br>
		<label>Teaching Assistant Email</label><br>
		<?php print $taEmail; ?><br>
		<label>Teaching Assistant Phone</label><br>
		<?php print $taPhone; ?>
	</body>
</html>
		