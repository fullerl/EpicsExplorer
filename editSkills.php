<?php
	$tid = $_GET['tid'];
?>
<html>
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<form action = "editSkills.php?tid=<?php print $tid ?>" method = "post">
	<label><a href="newSkill.php?tid=<?php print $tid ?>">+New Skill</a></label></br>
<?php
	//$v = 0;
	require_once "dbconnect.php";
	//if ($v == 0) {
		//$tid = $_GET['tid'];
		
		$sql = "SELECT COUNT(SID) FROM skill";
		$result0 = mysql_query($sql, $conn) or die(mysql_error());
		$count = mysql_fetch_field($result0);
		$checked = array($count);
		$sql = "SELECT * FROM skill";
		$result2 = mysql_query($sql, $conn) or die(mysql_error());
		$list = [];
		$sql_ = "SELECT SID FROM team_skill where TID = $tid";
		$result = mysql_query($sql_, $conn) or die(mysql_error());
		while ($depart = mysql_fetch_assoc($result)) {
			$list[] = $depart['SID'];
		}
		while ($skill2 = mysql_fetch_assoc($result2)) {
			$SID = $skill2['SID'];
			$checked[$SID] = 0;
			//echo $DID;
			//$sql = "SELECT NAME FROM skill where DID = $DID";
			//$result3 = mysql_query($sql, $conn) or die(mysql_error());
			//$field = mysql_fetch_assoc($result3);
			$name = $skill2['Name'];
			$sql2 = "SELECT SID FROM team_skill where TID = $tid";
			$result = mysql_query($sql2, $conn) or die(mysql_error());
			while ($skill = mysql_fetch_assoc($result)) {
				$SID2 = $skill['SID'];
				//echo $DID . "</br>";
				$checked[$SID2] = $SID2;
			}
			//print_r($list);
			//echo $checked[$DID];
			if ($checked[$SID] != 0) {
				echo "<div class='checkbox'><label><input type='checkbox' name='skill[]' value=$SID checked>$name</label>  <a href = deleteSkills.php?sid=".$SID."&tid=".$tid.">X</a></div></br>";
			}
			else {
				echo "<div class='checkbox'><label><input type='checkbox' name='skill[]' value=$SID>$name</label>  <a href = deleteSkills.php?sid=".$SID."&tid=".$tid.">X</a></div></br>";
			}
		}
		//$v = 1;
	//}
	//else {
		if (isset($_POST['Submit'])) {
			if (isset($_POST['skill'])) {
				$SID = $_POST['skill'];
				foreach ($SID as $d) {
					$sql = "SELECT COUNT(SID) as count from team_skill where SID = $d";
					$result4 = mysql_query($sql, $conn) or die(mysql_error());
					$cd = mysql_fetch_assoc($result4);
					//echo $cd['count'];
				
					if ($cd['count'] == 0) {
						$sql = "INSERT INTO team_skill VALUES('$tid','$d')";
						$result5 = mysql_query($sql, $conn) or die(mysql_error());
					}						
				}
				//echo $checked;
				//echo implode("|", $checked);
				//print_r($list);
				foreach ($list as $c) {
					
					if (!in_array($c, $SID)) {
						$sql = "DELETE from team_skill WHERE SID = $c";
						$result = mysql_query($sql, $conn) or die(mysql_error());
						$checked[$c] = 0;
						//header("Location: editskill.php?tid=" . $tid);
					}
				}
			}
			header("Location: skills.php?tid=" . $tid);
		}
	//}
	
?>
		<input class='form-control' class='form-control' type='submit' name='Submit' value='Save'></input>
	</form>
</html>
