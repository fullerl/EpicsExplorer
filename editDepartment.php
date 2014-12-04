<?php
	$tid = $_GET['tid'];
?>
<html>
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<form action = "editDepartment.php?tid=<?php print $tid ?>" method = "post">
	<label><a href="newDepartment.php?tid=<?php print $tid ?>">+New Department</a></label></br>
<?php
	//$v = 0;
	require_once "dbconnect.php";
	//if ($v == 0) {
		//$tid = $_GET['tid'];
		
		$sql = "SELECT COUNT(DID) FROM department";
		$result0 = mysql_query($sql, $conn) or die(mysql_error());
		$count = mysql_fetch_field($result0);
		$checked = array($count);
		$sql = "SELECT * FROM department";
		$result2 = mysql_query($sql, $conn) or die(mysql_error());
		$list = [];
		$sql_ = "SELECT DID FROM team_department where TID = $tid";
		$result = mysql_query($sql_, $conn) or die(mysql_error());
		while ($depart = mysql_fetch_assoc($result)) {
			$list[] = $depart['DID'];
		}
		while ($department2 = mysql_fetch_assoc($result2)) {
			$DID = $department2['DID'];
			$checked[$DID] = 0;
			//echo $DID;
			//$sql = "SELECT NAME FROM department where DID = $DID";
			//$result3 = mysql_query($sql, $conn) or die(mysql_error());
			//$field = mysql_fetch_assoc($result3);
			$name = $department2['Name'];
			$sql2 = "SELECT DID FROM team_department where TID = $tid";
			$result = mysql_query($sql2, $conn) or die(mysql_error());
			while ($department = mysql_fetch_assoc($result)) {
				$DID2 = $department['DID'];
				//echo $DID . "</br>";
				$checked[$DID2] = $DID2;
			}
			//print_r($list);
			//echo $checked[$DID];
			if ($checked[$DID] != 0) {
				echo "<div class='checkbox'><label><input type='checkbox' name='department[]' value=$DID checked>$name</label>  <a href = deleteDepartment.php?did=".$DID."&tid=".$tid.">X</a></div></br>";
			}
			else {
				echo "<div class='checkbox'><label><input type='checkbox' name='department[]' value=$DID>$name</label>  <a href = deleteDepartment.php?did=".$DID."&tid=".$tid.">X</a></div></br>";
			}
		}
		//$v = 1;
	//}
	//else {
		if (isset($_POST['Submit'])) {
			if (isset($_POST['department'])) {
				$DID = $_POST['department'];
				foreach ($DID as $d) {
					$sql = "SELECT COUNT(DID) as count from team_department where DID = $d";
					$result4 = mysql_query($sql, $conn) or die(mysql_error());
					$cd = mysql_fetch_assoc($result4);
					//echo $cd['count'];
				
					if ($cd['count'] == 0) {
						$sql = "INSERT INTO team_department VALUES('$tid','$d')";
						$result5 = mysql_query($sql, $conn) or die(mysql_error());
					}						
				}
				//echo $checked;
				//echo implode("|", $checked);
				//print_r($list);
				foreach ($list as $c) {
					
					if (!in_array($c, $DID)) {
						$sql = "DELETE from team_department WHERE DID = $c";
						$result = mysql_query($sql, $conn) or die(mysql_error());
						$checked[$c] = 0;
						//header("Location: editDepartment.php?tid=" . $tid);
					}
				}
			}
			header("Location: department.php?tid=" . $tid);
		}
	//}
	
?>
		<input class='form-control' type='submit' name='Submit' value='Save'></input>
	</form>
</html>
