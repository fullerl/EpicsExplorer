<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
	<head>
		<title>All Teams</title>
	</head>

	<body>
		<div>
			<h1> <a href = "schools.php" /> Schools <a href = "allteams.php"> All Teams </a> <a href = "team.php">Teams</a></h1>
			<p>
				<a href = "newTeam.php"> +Team </a>
				<?php
					$alphas = range('A', 'Z');
					foreach ($alphas as $char)
						print "<h2>" . $char . "</h2>" . "<hr size = '10' width = '100%' />";
					
				?>
			</p>
		</div>
	</body>
</html>