<?php
	$tid = $_GET['tid'];
?>
<html>
	<form action = "newDepartment.php?tid=<?php print $tid ?>" method = "post">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	require_once "dbconnect.php";
	$name = "";
	if (isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$sql = "INSERT INTO department VALUES(null, '$name')";
		$result = mysql_query($sql, $conn) or die(mysql_error());
		echo "Department Added </br>";
	}
	
	if (isset($_POST['GoBack'])) {
		header("Location: editDepartment.php?tid=" . $tid);
	}
	
?>
	Name: <input class='form-control' type="text" maxlength="50" name = "name" id = "name" value=<?php print $name ?>>
	</br>
	<input class='form-control' type="submit" name = "Submit">
	<input class='form-control' type="submit" name = "GoBack" value = "Go Back">
	</form>
</html>