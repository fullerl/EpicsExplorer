<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<title>Schools</title>
	</head>

	<body>
		<div class="container">
			<ul class="nav nav-tabs">
				<li role="navigate" class="active"><a href = "#"> Schools </a></li>
			</ul>
			</br>
		
			<?php
				//<a href = "newSchool.php"> +New School </a>
				require_once "dbconnect.php";
				$sql = "Select * from department where 1";
				$result = mysql_query($sql, $conn) or die(mysql_error());
				while ($department = mysql_fetch_assoc($result)) {
				//sort($departments);
				//print_r($departments);
				//foreach($departments as $department) {
					//print_r($department);
					$did = $department['DID'];
					$name = $department['Name'];
					print "<label><a href = allTeams.php?did=".$did.">".$name."</a></label></br>";
				}
			?>
		</div>
	</body>
</html>