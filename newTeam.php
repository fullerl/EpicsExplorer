<html>
<?php
	require_once "includes.php";
	require_once "dbconnect.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<div class="container">
		<?php
			$teamName = "";
			$teamAcro = "";
			$teamWeb = "";
			$teamDes = "";
			$did = $_GET['did'];
			
			if (isset($_POST['save'])) {
				$teamName = trim($_POST['teamName']);
				$teamAcro = trim($_POST['teamAcro']);
				$teamWeb = trim($_POST['teamWeb']);
				$teamDes = trim($_POST['teamDes']);
				
				$teamName = mysql_real_escape_string($teamName);
				$teamAcro = mysql_real_escape_string($teamAcro);
				$teamWeb = mysql_real_escape_string($teamWeb);
				$teamDes = mysql_real_escape_string($teamDes);
				
				$sql = "INSERT INTO team VALUES(null,'$teamName','$teamAcro','$teamWeb','$teamDes')";
				$result = mysql_query($sql, $conn) or die(mysql_error());
				$sql = "SELECT * from team where Name = '$teamName'";
				$result = mysql_query($sql, $conn) or die(mysql_error());
				$tid = mysql_fetch_assoc($result)['TID'];
				$sql = "INSERT INTO team_department VALUES('$tid', '$did')";
				$result = mysql_query($sql, $conn) or die(mysql_error());
				header("Location: allTeams.php?did=" . $did);
			}
		?>
		<form action = "newTeam.php?did=<?php print $did;?>" method = "post">
			<label>Name</label>
			<?php print "<input class='form-control' class='form-control' class='form-control' type = 'text' value = '". $teamName . "' name = 'teamName' id = 'teamName' />"; ?>
			<label>Acronym</label>
			<?php print "<input class='form-control' class='form-control' class='form-control' type = 'text' value = '". $teamAcro . "' name = 'teamAcro' id = 'teamAcro' />"; ?>
			<label>Website</label>
			<?php print "<input class='form-control' class='form-control' class='form-control' type = 'text' value = '". $teamWeb . "' name = 'teamWeb' id = 'teamWeb' />"; ?>
			<label>Description</label>
			<?php print "<textarea name = 'teamDes' style = 'width:100%' rows = '4' cols = '50'>" . $teamDes . "</textarea>";?>
			<br />
			<input class='form-control' class='form-control' class='form-control' name = "save" type = "submit" value = "Save" />
		</form>
	</div>
</html>