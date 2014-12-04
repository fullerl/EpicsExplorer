<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	$tid = $_GET['tid'];
?>

<?php
	require_once "dbconnect.php";
	$tid = $_GET['tid'];
	$sql = "SELECT SID FROM team_skill where TID = $tid";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	while ($skill = mysql_fetch_assoc($result)) {
		$SID = $skill['SID'];
		//echo $DID . "</br>";
	
		$sql = "SELECT Name FROM skill where SID = $SID";
		$result1 = mysql_query($sql, $conn) or die(mysql_error());
		$field = mysql_fetch_assoc($result1);
		//echo implode(" ", $field);
		$name = $field['Name'];
		//echo $name;
		echo "<div class='checkbox'><label><input type='checkbox' name='skill[]' value=$name checked = true>$name</label></div></br>";
	}
?>