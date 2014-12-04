<?php
	require_once "dbconnect.php";
	$tid = $_GET['tid'];
	$did = $_GET['did'];
	$sql = "DELETE FROM department where DID = $did";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	header("Location: editDepartment.php?tid=" . $tid);
	
?>