<!doctype html>

<html>
<head>
	<title> Volumio Control </title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	<meta http-equiv="language" content="deutsch, de">
	<meta http-equiv="expires" content="0">
	<meta name="robots" content="noindex, nofollow">
	<meta name="copyright" content="Hannes Trapp">
	<link rel="icon" type="image/png" href="favicon.png" />
	<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div id="setup">
		<h1>Konfiguriere Deine Volumio-Basissteuerung</h1>
		<p>&nbsp;</p>
		<form action="control.php" method="get">
			<h2>Notwendige Einstellungen</h2>
			<p>
				<label for="volumioIP">Wie lautet die <b>IP</b> Deines Volumios?</label>
				<input name="volumioIP" type="text" placeholder="1.2.3.4">
			</p>
			<p>&nbsp;</p>
			<h2>Buttons reduzieren und Playlisten hinterlegen</h2>
      <p>
				<input name="playpause" id="playpauseCB" type="checkbox" value="0" unchecked>
				<label for="playpause">Play/Pause verbergen</label>
			</p>
      <p>
				<input name="skip" id="skipCB" type="checkbox" value="0" unchecked>
				<label for="skip">Skip verbergen</label>
			</p>
      <p>
				<input name="volume" id="volumeCB" type="checkbox" value="0" unchecked>
				<label for="volume">Lautstärke verbergen</label>
			</p>
      <p>
				<input name="repeat" id="repeatCB" type="checkbox" value="0" unchecked>
				<label for="repeat">Repeat verbergen</label>
			</p>
      <p>
				<input name="random" id="randomCB" type="checkbox" value="0" unchecked>
				<label for="random">Shuffle verbergen</label>
			</p>
			<p>&nbsp;</p>
			<p>
				<label for="playlists">Sollen Playlist-Shortcuts angezeigt werden?</label>
				<input name="playlists" type="text" placeholder="Playlist-Namen bitte mit ':' trennen" value="">
			</p>
			<p>&nbsp;</p>
			<p><input type="submit" value="&nbsp;Fertig!&nbsp;"/></p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</form>
	</div>
	<!--Impressum-->
	<script type="text/javascript">
	function showHideText(innen){
		if(document.getElementById(innen).style.display == 'none'){
			document.getElementById(innen).style.display = 'block';
		}else{
			document.getElementById(innen).style.display = 'none';
		}
	}
	</script>
	<div id="kontakt">
		<a href="dtnschtz.php"><b>Dаtеnѕсһutz</b></a> - <a href="#" onclick="showHideText('kontaktdetails'); return false;"><b>Kontakt / Impressum</b></a>
		<div id="kontaktdetails" style="display:none;">
			<a href="#" onclick="showHideText('kontaktdetails'); return false;"><b>Kontakt / Impressum</b></a>
			<p>&nbsp;</p>
			<?php include('kontakt.txt'); ?>
				<p>&nbsp;</p>
				<a href="#" onclick="showHideText('kontaktdetails'); return false;"><b>Kontakt / Impressum schließen</b></a>
			</div> <!-- Ende kontaktdetails -->
		</div> <!-- Ende kontakt -->
	</body>
</html>
