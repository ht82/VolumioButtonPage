<!doctype html>

<html>
<head>
<?php
  $boeseZeichen = array(";", "&", ">", "<", "/", "\\", "[", "]", "$", "!", "\"", ":", ".", "#", "~", "'");
  $guteZeichen =  array("" , "" , "" , "" , "" , ""  , "" , "" , "" , "!", ""  , ":", "" , "" , "",  "" );

  $volumioIP =  preg_replace('/[^0-9.]/', '', $_GET["volumioIP"] ?? '0.0.0.0');

  $playpause = boolval($_GET["playpause"] ?? '1');
  $skip = boolval($_GET["skip"] ?? '1');
  $volume = boolval($_GET["volume"] ?? '1');
  $random = boolval($_GET["random"] ?? '1');
  $repeat = boolval($_GET["repeat"] ?? '1');
  $playlistString = trim(str_replace($boeseZeichen, $guteZeichen, $_GET["playlists"] ?? ''));
  $playlists = explode(":",$playlistString);

	echo "	<title> Volumio Control </title>\n";
?>
	<meta http-equiv="language" content="deutsch, de">
	<meta http-equiv="expires" content="0">
	<meta name="robots" content="noindex, nofollow">
	<meta name="copyright" content="Hannes Trapp">
	<link rel="icon" type="image/png" href="favicon.png" />
	<link href="stylesheet.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="apple-touch-icon" href="favicon.png">
</head>

<body>
  <div id="wrapper">
<?php
    if ($playpause) {
      echo "    <div id=\"playpause\" class=\"hugebutton\">\n";
      echo "      <a href=\"http://$volumioIP/api/v1/commands/?cmd=toggle\" target=\"steuerframe\">⏯️</a>\n";
      echo "    </div> <!-- Ende playpause -->\n";
    }

    if ($skip) {
      echo "    <div id=\"skip\" class=\"hugebutton\">\n";
      echo "      <div id=\"skipZurueck\">\n";
      echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=prev\" target=\"steuerframe\">⏮️</a>\n";
      echo "      </div> <!-- Ende skipZurueck -->\n";
      echo "      <div id=\"skipVor\">\n";
      echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=next\" target=\"steuerframe\">⏭️</a>\n";
      echo "      </div> <!-- Ende skipVor -->\n";
      echo "    </div> <!-- Ende skip -->\n";
    }

    if ($volume) {
      echo "    <div id=\"volume\" class=\"hugebutton\">\n";
      echo "      <div id=\"volumeRunter\">\n";
      echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=volume&volume=minus\" target=\"steuerframe\">🔈</a>\n";
      echo "      </div> <!-- Ende volumeRunter -->\n";
      echo "      <div id=\"volumeHoch\">\n";
      echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=volume&volume=plus\" target=\"steuerframe\">🔊</a>\n";
      echo "      </div> <!-- Ende volumeHoch -->\n";
      echo "    </div> <!-- Ende volume -->\n";
    }

    echo "    <div id=\"rand-rep\">\n";
    if ($random) {
      echo "      <div id=\"random\" class=\"bigbutton\">\n";
      echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=random\" target=\"steuerframe\">🔀</a>\n";
      echo "      </div> <!-- Ende random -->\n";
    }
    if ($repeat) {
      echo "      <div id=\"repeat\" class=\"bigbutton\">\n";
      echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=repeat\" target=\"steuerframe\">🔁</a>\n";
      echo "      </div> <!-- Ende repeat -->\n";
    }
    echo "    </div> <!-- Ende rand-rep -->\n";

    if ($playlistString != "") {
      echo "    <div id=\"playlists\">\n";
      echo "      <table>\n";
      echo "        <tr>\n";
      foreach ($playlists as $key => $playlist) {
        echo "          <td>\n";
        echo "            <a href=\"http://$volumioIP/api/v1/commands/?cmd=playplaylist&name=$playlist\" target=\"steuerframe\">$playlist</a>\n";
        echo "          </td>\n";
      }
      // foreach ($playlists as $key => $playlist) {
      //   echo "      <div id=\"playlist" . ($key+1) . "\">\n";
      //   echo "        <a href=\"http://$volumioIP/api/v1/commands/?cmd=playplaylist&name=$playlist\" target=\"steuerframe\">$playlist</a>\n";
      //   echo "      </div> <!-- Ende playlist" . ($key+1) . " -->\n";
      // }
      echo "        </tr>\n";
      echo "      </table>\n";
      echo "    </div> <!-- Ende playlists -->\n";
    }
?>

    <iframe name="steuerframe" src="steuerframe.htm"></iframe>

  </div> <!-- Ende wrapper -->
</body>
</html>
