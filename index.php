<!doctype html>
<?php
	$language=intval($_GET["language"] ?? "2");
	$texte = json_decode(file_get_contents('translations.json'), false);
?>
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
		<h1><?php echo $texte[$language][0] ?></h1>
		<p><?php echo $texte[$language][17] ?></p>
		<p>&nbsp;</p>
		<form action="control.php" method="get">
			<h2><?php echo $texte[$language][1] ?></h2>
			<p>
				<label for="volumioIP"><?php echo $texte[$language][2] ?></label>
				<input name="volumioIP" type="text" placeholder="<?php echo $texte[$language][3] ?>">
			</p>
			<p>&nbsp;</p>
			<h2><?php echo $texte[$language][4] ?></h2>
      <p>
				<input name="playpause" id="playpauseCB" type="checkbox" value="0" unchecked>
				<label for="playpause"><?php echo $texte[$language][5] ?></label>
			</p>
      <p>
				<input name="skip" id="skipCB" type="checkbox" value="0" unchecked>
				<label for="skip"><?php echo $texte[$language][6] ?></label>
			</p>
      <p>
				<input name="volume" id="volumeCB" type="checkbox" value="0" unchecked>
				<label for="volume"><?php echo $texte[$language][7] ?></label>
			</p>
      <p>
				<input name="repeat" id="repeatCB" type="checkbox" value="0" unchecked>
				<label for="repeat"><?php echo $texte[$language][8] ?></label>
			</p>
      <p>
				<input name="random" id="randomCB" type="checkbox" value="0" unchecked>
				<label for="random"><?php echo $texte[$language][9] ?></label>
			</p>
			<p>&nbsp;</p>
			<p>
				<label for="playlists"><?php echo $texte[$language][10] ?></label>
				<input name="playlists" type="text" placeholder="<?php echo $texte[$language][11] ?>" value="">
			</p>
			<p>&nbsp;</p>
			<p><input type="submit" value="&nbsp;<?php echo $texte[$language][12] ?>&nbsp;"/></p>
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
	<div id="language">
<?php
		for ($i=1; $i < count($texte) ; $i++) {
			echo '		<a href="index.php?language=' . $i . '"';
			if ($i == $language) {
				echo ' class="active"';
			}
			echo '>' . $texte[$language][$i+12] . "</a>\n";
		}
?>
	</div> <!-- Ende language -->
	<div id="kontakt">
		<a href="dtnschtz.php?language=<?php echo $language ?>"><b><?php echo $texte[$language][15] ?></b></a> - <a href="#" onclick="showHideText('kontaktdetails'); return false;"><b><?php echo $texte[$language][16] ?></b></a>
		<div id="kontaktdetails" style="display:none;">
			<a href="#" onclick="showHideText('kontaktdetails'); return false;"><b><?php echo $texte[$language][16] ?></b></a>
			<p>&nbsp;</p>
			<?php include('kontakt.txt'); ?>
				<p>&nbsp;</p>
				<a href="#" onclick="showHideText('kontaktdetails'); return false;"><b><?php echo $texte[$language][19] ?></b></a>
			</div> <!-- Ende kontaktdetails -->
		</div> <!-- Ende kontakt -->
	</body>
</html>
