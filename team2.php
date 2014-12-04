<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<?php
	require_once "includes.php";
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/ui/1.11.3/jquery-ui.js"></script>
<script>
	function resizeIframe(obj) {
		obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
	}
	$(function() {
		$("#tabs").tabs();
	});
	
</script>
	<head>
		<title>Team</title>
	</head>
	<?php
		$teamAcro = "WISE";
		$teamName = "Web-based Interactive Software Engineering";
		$tid = $_GET['tid'];
		$GI_Status = "checked";
		$did = $_GET['did'];
		//$Projects_status = "unchecked";
		//$Skills_status = "unchecked";
	?>

	<body>
		<div class="container">
			<ul class="nav nav-tabs">
				<li role="navigate"><a href = "schools.php"> Schools </a></li>
				<li role="navigate"><a href = "allteams.php?did=<?php print $did; ?>"> All Teams </a></li>
				<li role="navigate" class="active"><a href = "#">Teams</a></li>
			</ul>
			<form action="team.php" enctype = "multipart/form-data" method="post">
				<ul class="nav nav-tabs">
					<li role="presentation"><a href = "team.php?tid=<?php print $tid; ?>&did=<?php print $did; ?>">Team</a></li>
					<li role="presentation" class="active"><a href = "">Skills</a></li>
				</ul>
				
				<?php print $teamAcro ?> <br />
				<?php print $teamName ?> <br />
				
				<br />
				<span align = "left"><label>Department</label></span> <span style = "float:right"><button type = "button" onClick="document.getElementById('dFrame').src = 'editDepartment.php?tid=<?php print $tid; ?>'" style = "background:none;border:none">edit</button></span>
				<hr />
				<iframe id = "dFrame" src = "department.php?tid=<?php print $tid; ?>" width = "100%" seamless = "seamless" scrolling = "auto" onload='javascript:resizeIframe(this);'></iframe>
				<br />
				<span align = "left"><label>Skills</label></span> <span style = "float:right"><button type = "button" onClick="document.getElementById('sFrame').src = 'editSkills.php?tid=<?php print $tid; ?>'" style = "background:none;border:none">edit</button></span>
				<hr />
				<iframe id = "sFrame" src = "skills.php?tid=<?php print $tid; ?>" width = "100%" seamless = "seamless" scrolling = "auto" onload='javascript:resizeIframe(this);'></iframe>
				<br />
			</form>
		</div>
	</body>
</html>