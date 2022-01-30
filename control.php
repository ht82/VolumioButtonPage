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

  <style type="text/css" media="screen">
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      background-color: black;
    }

    iframe {
      /* display: block; */
      display: none;
    }

    .bigbutton a {
      font-size: 8vh;
      text-decoration: none;
    }

    .hugebutton a {
      font-size: 15vh;
      text-decoration: none;
    }

    #playpause {
      /* border: 1px solid green; */
      position: fixed;
      left: 40%;
      top: 31%;
      width: 20%;
      text-align: center;
      vertical-align: bottom;
    }

    #skipZurueck {
      /* border: 1px solid red; */
      position: fixed;
      left: 20%;
      top: 31%;
      width: 20%;
      text-align: right;
      vertical-align: bottom;
    }

    #skipVor {
      /* border: 1px solid blue; */
      position: fixed;
      left: 60%;
      top: 31%;
      width: 20%;
      text-align: left;
      vertical-align: bottom;
    }

    #volumeRunter {
      /* border: 1px solid black; */
      position: fixed;
      left: 40%;
      top: 54%;
      width: 20%;
      text-align: center;
      vertical-align: bottom;
    }

    #volumeHoch {
      /* border: 1px solid yellow; */
      position: fixed;
      left: 40%;
      top: 5%;
      width: 20%;
      text-align: center;
      vertical-align: bottom;
    }

    #random {
      /* border: 1px solid pink; */
      position: fixed;
      left: 75%;
      top: 61%;
      width: 20%;
      text-align: center;
      vertical-align: bottom;
    }

    #repeat {
      /* border: 1px solid deeppink; */
      position: fixed;
      left: 5%;
      top: 61%;
      width: 20%;
      text-align: center;
      vertical-align: bottom;
    }

    #playlists {
      /* border: 1px solid deeppink; */
      position: fixed;
      left: 1%;
      bottom: 5%;
      width: 98%;
      text-align: center;
      vertical-align: bottom;
      font-size: 1.4em;
    }

    #playlists table {
      /* border: 1px solid blue; */
      width: 100%;
      table-layout: fixed;
    }

    #playlists td {
      /* border: 1px solid red; */
      padding: 15px 0px;
      white-space: nowrap;
    }

    td a {
      text-decoration: none;
      background-color: #422;
      color: white;
      padding: 12px;
      border-radius: 100px;
    }
  </style>

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
        $playlist = trim($playlist);
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
