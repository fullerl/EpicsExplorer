<?php
	require_once "dbconnect.php";
	$date = getdate();
	$month = $date['mon'];
	$year = ($date['year'] - 2000);
	$mpre = "";
	if ($month < 8) {
		$mpre = "S";
	}
	else {
		$mpre = "F";
	}
	$end = $mpre . $year;
	$tid = $_GET['tid'];
	$pjid = $_GET['pjid'];
	$sql = "UPDATE team_project SET End = '$end' where PJID = '$pjid'";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	//echo $end . "   " . $pjid;
	header("Location: editProjects.php?tid=" . $tid);
	
?>