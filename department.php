<?php
	$tid = $_GET['tid'];
?>
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
	require_once "dbconnect.php";
	$tid = $_GET['tid'];
	$sql = "SELECT DID FROM team_department where TID = $tid";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	while ($department = mysql_fetch_assoc($result)) {
		$DID = $department['DID'];
		//echo $DID . "</br>";
	
		$sql = "SELECT Name FROM department where DID = $DID";
		$result1 = mysql_query($sql, $conn) or die(mysql_error());
		$field = mysql_fetch_assoc($result1);
		//echo implode(" ", $field);
		$name = $field['Name'];
		//echo $name;
		echo "<div class='checkbox'><label><input type='checkbox' name='department[]' value=$name checked = true>$name</label></div></br>";
	}
?>