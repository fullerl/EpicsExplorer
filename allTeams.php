<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	require_once "includes.php";
?>
	<head>
		<title>All Teams</title>
	</head>

	<body>
		<div class = "container">
			<?php
				require_once "dbconnect.php";
				$did = $_GET['did'];
			?>
			<ul class="nav nav-tabs">
				<li role="navigate"><a href = "schools.php"> Schools </a></li>
				<li role="navigate"><a href = "allteams.php?did=<?php print $did; ?>"> All Teams </a></li><span style = "float:right"><label><a href="newTeam.php?did=<?php print $did;?>">+New Team</a></label></span>
			</ul>
			<label>
				
				<?php
					//<a href = "newTeam.php"> +Team </a>
					
					$sql = "SELECT TID from team_department where DID = '$did'";
					$result = mysql_query($sql, $conn) or die(mysql_error());
					while ($team = mysql_fetch_assoc($result)) {
						$tid = $team['TID'];
						$sql1 = "SELECT * from team where TID = '$tid'";
						$result2 = mysql_query($sql1, $conn) or die(mysql_error());
						$teaminfo = mysql_fetch_assoc($result2);
						$name = $teaminfo['Name'];
						print "<a href = team.php?tid=".$tid."&did=".$did.">".$name."</a></br>";
					}
				?>
		</div>
	</body>
</html>