<?php
	require_once "dbconnect.php";
	$tid = $_GET['tid'];
	$sid = $_GET['sid'];
	$sql = "DELETE FROM skill where SID = $sid";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	header("Location: editSkills.php?tid=" . $tid);
	
?>