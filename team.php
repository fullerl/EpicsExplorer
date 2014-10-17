<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<link rel = "stylesheet" type = "text/css" href = "template.css">
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
  
</script>
	<head>
		<title>Team</title>
	</head>
	<?php
		$teamAcro = "WISE";
		$teamName = "Web-based Interactive Software Engineering";
		$tid = 1;
	?>

	<body>
		<div>
			<h1> <a href = "schools.php" /> Schools <a href = "allteams.php"> All Teams </a> <a href = "team.php">Teams</a></h1>
			<div>
				<?php print $teamAcro ?> <br />
				<?php print $teamName ?> <br />
				<input type = "radio" name = "status">General Information
				<input type = "radio" name = "status">Projects 
				<input type = "radio" name = "status">Skills
				<br />
				<span align = "left">General Information </span> <span style = "float:right"><button type = "button" onClick="document.getElementById('giFrame').src = 'editGeneralInformation.php?tid=<?php print $tid; ?>'" style = "background:none;border:none">edit</button></span>
				<hr />
				<iframe id = "giFrame" src = "generalInfo.php?tid=<?php print $tid; ?>" width = "100%" seamless = "seamless" scrolling = "auto" onload='javascript:resizeIframe(this);'></iframe>
				<br />
				<span align = "left">Team Information </span> <span style = "float:right" ><button type = "button" onClick="document.getElementById('tiFrame').src = 'editTeamInformation.php?tid=<?php print $tid; ?>'" style = "background:none;border:none">edit</button></span>
				<hr />
				<iframe id = "tiFrame" src = "teamInformation.php?tid=<?php print $tid; ?>" width = "100%" seamless = "seamless" scrolling = "auto" onload='javascript:resizeIframe(this);'></iframe>
				<br />
				<span align = "left">Photos</span> <span style = "float:right"><button type = "button" onClick="document.getElementById('pFrame').src = 'editPhotos.php?tid=<?php print $tid; ?>'" style = "background:none;border:none">edit</button></span>
				<hr />
				<iframe id = "pFrame" src = "photo.php?tid=<?php print $tid; ?>" width = "100%" seamless = "seamless" scrolling = "auto" onload='javascript:resizeIframe(this);'></iframe>
				
				
			</div>
		</div>
	</body>
</html>