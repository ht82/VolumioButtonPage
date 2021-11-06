<html>
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
	<meta name="author" content="Hannes" >
	<meta http-equiv="language" content="deutsch, de">
	<meta http-equiv="expires" content="0">
	<meta name="robots" content="noindex, nofollow">
	<title> Hinweise zum Dаtеnѕсһutz </title>
	<link rel="icon" type="image/png" href="favicon.png" />
	<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />
	<style type="text/css">@import url(stylesheet_mobile.css) (max-width: 2px);</style>
	<script type="text/javascript">
	function showHideText(innen, aussen){
		if(document.getElementById(innen).style.display == 'none'){
			document.getElementById(innen).style.display = 'block';
		}else{
			document.getElementById(innen).style.display = 'none';
		}
	}
	</script>
</head>
<body>

	<div id="setup">
		<h1>Hinweise zum Dаtеnѕсһutz</h1>
<?php include('dtnschtz.txt'); ?>
		<p>&nbsp;</p>
		<p>&nbsp;</p>

	</div> <!-- Ende eventinfos -->
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
		<a href="javascript:history.back()"><b>schließen</b></a> - <a href="#" onclick="showHideText('kontaktdetails'); return false;"><b>Kontakt / Impressum</b></a>
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
