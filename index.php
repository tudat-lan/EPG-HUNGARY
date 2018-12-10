<?php

ini_set('display_errors', true);

$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'pass';
$dbname = 'dbname';

 session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Lépjél csak be először";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  
 include 'functions/functions.php';
?>
<html>

<head>
<link type='text/css' rel='stylesheet' href='font-awesome.min.css'>
<style type='text/css'>
*, *::before, *::after, article, a, abbr, address, aside, hgroup, big, blockquote, b, body, x button, caption, cite, center, dl, dt, dd, details, div, del, dfn, embed, em, fieldset, figure, figcaption, footer, form, html, h1, h2, h3, h4, h5, h6, header, i, input, iframe, img, ins, kbd, li, label, legend, mark, nav, output, ol, optgroup, pre, p, q, section, span, summary, s, samp, small, strong, sub, sup, select, textarea, table, time, tbody, tfoot, thead, tr, th, td, tt, ul, u, var{
	margin:0;
	padding:0;
	border:0;
	outline:0;
	font-size:120%;
	font:inherit;
	vertical-align:baseline;
}

/* Remove text-shadow in selection highlight. These selection rule sets have to be separate */
::-moz-selection{
	background:#b3d4fc;
	text-shadow:none;
}

::selection{
	background:#b3d4fc;
	text-shadow:none;
}

/* Remove inner padding and border in Firefox 4+ */
button::-moz-focus-inner,
input::-moz-focus-inner{
	border:0;
	padding:0;
}

/* Re-set default cursor for disabled elements */
button[disabled],
html input[disabled]{
	cursor:default;
}

/* Correct button and select style inheritance in Firefox, IE 8/9/10/11 and Opera */
button,
select{
	text-transform:none;
	-webkit-appearance:none;
	overflow:visible;
	width:auto;
	/* IE7 */
	*padding-top:1px;
	*padding-bottom:1px;
	*height:auto;
}

/* Correct inability to style clickable `input` types in iOS and Improve usability and consistency of cursor style between image-type `input` and others */
button,
html input[type="button"],
input[type="reset"],
input[type="submit"]{
	-webkit-appearance:button;
	cursor:pointer;
}

/* Remove most spacing between table cells */
table{
	border-collapse:collapse;
	border-spacing:0;
}

/* Correct font and color properties not being inherited */
button,
input,
optgroup,
select,
textarea{
	resize:none;
	color:black;
	font:inherit;
	vertical-align:middle;
	/* for Opera */
	z-index:1;
}

/* Fix the cursor style for Chrome increment/decrement buttons */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button{
	height:auto;
}

/* Remove inner padding and search cancel button in Safari and Chrome on OS X */
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration{
	-webkit-appearance:none;
}

/* IE 8/9/10/11 */
article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{
	display:block;
}

/* IE 8/9/10 */
input[type="checkbox"],
input[type="radio"]{
	box-sizing:border-box;
	padding:0;
}

/* IE 8/9/10/11 */
button{
	overflow:visible;
}

/* Improve readability when focused and also mouse hovered in all browsers */
a,
a:active,
a:hover{
	outline:0;
	background-color:transparent;
	text-decoration:underline;
	color:red;
	cursor:pointer;
	white-space:nowrap;
}

ul,
ol{
	list-style:none;
}

/* Remove the gap between images and the bottom of their containers */

img{
	vertical-align:middle;
}

*,
*::before,
*::after,
html{
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
}

body,
html{
	font:20px "Ubuntu";
	font:1rem "Ubuntu";
	line-height:1.333;
	color:#02FF02;
	backround: black;
	height:100%;
	min-height:100%;
	position:relative;
}

.loading > *{
	-webkit-transition:opacity .9s ease-out;
	-moz-transition:opacity .9s ease-out;
	-o-transition:opacity .9s ease-out;
	-ms-transition:opacity .9s ease-out;
	transition:opacity .9s ease-out;
	opacity:0;
}

.loading{
	z-index:999;
	width:100%;
	height:100%;
	overflow:hidden;
}

.loading::before{
	position:absolute;
	content:"";
	z-index:999;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	-webkit-transform:translate(-50%,-50%);
	-ms-transform:translate(-50%,-50%);
	width:100px;
	height:100px;
	background:url(http://koditvepg.com/images/page-loader.svg);
	background-size:contain;
	background-repeat:no-repeat;
}

.loaded > *{
	-webkit-transition:opacity .9s ease-out;
	-moz-transition:opacity .9s ease-out;
	-o-transition:opacity .9s ease-out;
	-ms-transition:opacity .9s ease-out;
	transition:opacity .9s ease-out;
	opacity:1;
}

.column{
	-webkit-flex-flow:column nowrap;
	flex-flow:column nowrap;
}

.row{
	-webkit-flex-flow:row nowrap;
	flex-flow:row nowrap;
}

.display-flex{
	display:-webkit-box;
	display:-moz-box;
	display:-moz-flex;
	display:-ms-flexbox;
	display:-webkit-flex;
	display:flex;
}

.flex-1{
	-webkit-box-flex:1;
	-moz-box-flex:1;
	-webkit-flex:1;
	-ms-flex:1;
	flex:1;
}

.flex-2{
	-webkit-box-flex:2;
	-moz-box-flex:2;
	-webkit-flex:2;
	-ms-flex:2;
	flex:2;
}

.flex-3{
	-webkit-box-flex:3;
	-moz-box-flex:3;
	-webkit-flex:3;
	-ms-flex:3;
	flex:3;
}

.flex-4{
	-webkit-box-flex:4;
	-moz-box-flex:4;
	-webkit-flex:4;
	-ms-flex:4;
	flex:4;
}

.flex-5{
	-webkit-box-flex:5;
	-moz-box-flex:5;
	-webkit-flex:5;
	-ms-flex:5;
	flex:5;
}

form > div > div:first-child,
select{
	text-align:right;
	padding-right:10px;
}
	
select{
	width:75px;
}

form{
	height:100%;
	padding-top:20px;
}

input{
	background:#EEE;
	width:50%;
}

button{
	margin:auto;
	background:black;
	color:white;
	padding:10px;
}

.version{
	position: absolute;
	right: 10px;
	font-size: 140%;
	pointer-events: none;
	bottom:10px;
}

.general, .timeout, .correction, .cache{
	position:relative;
}

.general > div:first-child, .timeout > div:first-child, .correction > div:first-child, .cache > div:first-child{
	box-shadow: 0 -1px 0 black;
}

.general:before{
	position: absolute;
	content: " Főbeállítások ";
	top: 1px;
	bottom: 0;
	left: 10px;
	right: 0;
	font-size: 140%;
	pointer-events: none;
}

.timeout:before{
	position: absolute;
	content: " Késleltetés ";
	top: 1px;
	bottom: 0;
	left: 10px;
	right: 0;
	font-size: 140%;
	pointer-events: none;
}

.correction:before{
	position: absolute;
	content: " Korrigálás: ";
	top: 1px;
	bottom: 0;
	left: 10px;
	right: 0;
	font-size: 140%;
	pointer-events: none;
}

.cache:before{
	position: absolute;
	content: " Letárolás ";
	top: 1px;
	bottom: 0;
	left: 10px;
	right: 0;
	font-size: 140%;
	pointer-events: none;
}

.green > input,
.green > select{
	background:rgba(0, 255, 0, .5);
}

.red > input,
.red > select{
	background:rgba(255, 0, 0, .5);
}

tt.required{
	position:relative;
}

tt.required:before{
	font-family: FontAwesome;
	position:absolute;
	content:"\f12a";
	right:5px;
	color:red;
}
<?php
 session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Lépjél csak be először";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

</style>
</head>
<body background="riska.png">
<?php

$tartalom1 = scandir('cache/24.hu');

$tartalom2 = scandir('cache/horizon.tv');

$tartalom3 = scandir('cache/port.hu');

$tartalom4 = scandir('cache/animare.hu');

$tartalom5 = scandir('cache/onet.pl');

$tartalom6 = scandir('cache/sms.cz');

$tartalom7 = scandir('cache/tvmustra.hu');


$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'pass';
$dbname = 'dbname';

if (strncmp('7.0', PHP_VERSION, 3)) {
    echo 'Your PHP version (' . substr(PHP_VERSION, 0, 3) . ') are not supported. Only 7.0.* version enabled.';
    die;
} $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); if (mysqli_error($link)) {
    echo 'Leszakadtál wazze.... ' . mysqli_error($link);
    die;
} if (mysqli_query($link, "SELECT * FROM epgGenerator") === FALSE) {
    $table = "CREATE TABLE `epgGenerator`(
			`apikey` varchar(255) DEFAULT NULL,
			`docroot` varchar(255) DEFAULT NULL,
			`epgroot` varchar(255) DEFAULT NULL,
			`logo_url` varchar(255) DEFAULT NULL,
			`timeout_function` tinyint(1) DEFAULT 0,
			`offset_horizon_HU` varchar(5) DEFAULT NULL,
			`offset_24hu` varchar(5) DEFAULT NULL,
			`offset_porthu` varchar(5) DEFAULT NULL,
			`offset_tvmustra` varchar(5) DEFAULT NULL,
			`delete_horizon` tinyint(1) DEFAULT 0,
			`delete_24hu` tinyint(1) DEFAULT 0,
			`delete_porthu` tinyint(1) DEFAULT 0,
			`delete_tvmustra` tinyint(1) DEFAULT 0,
			`epg_day` tinyint(1) DEFAULT 0,
			`gz_compress` tinyint(1) DEFAULT 0,
			`delete_smscz` tinyint(1) DEFAULT 0,
			`offset_smscz` varchar(5) DEFAULT NULL,
			`offset_onet` varchar(5) DEFAULT NULL,
			`delete_onet` tinyint(1) DEFAULT 0,
			`offset_animare` varchar(5) DEFAULT NULL,
			`delete_animare` tinyint(1) DEFAULT 0
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
    $datas = "INSERT INTO `epgGenerator`(
			`apikey`,
			`docroot`,
			`epgroot`,
			`logo_url`,
			`timeout_function`,
			`offset_horizon_HU`,
			`offset_24hu`,
			`offset_porthu`,
			`offset_tvmustra`,
			`delete_horizon`,
			`delete_24hu`,
			`delete_porthu`,
			`delete_tvmustra`,
			`epg_day`,
			`gz_compress`,
			`delete_smscz`,
			`offset_smscz`,
			`offset_onet`,
			`delete_onet`,
			`offset_animare`,
			`delete_animare`
		)
		VALUES(
			NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, NULL, 0
		)";
    if (!mysqli_query($link, $table)) {
        echo "Elkúrtam nem kicsit: " . mysqli_error($link);
    } else {
        if (!mysqli_query($link, $datas)) {
            echo "Bazze nem lett bedobva a bázis: " . mysqli_error($link);
        }
    }
} if (isset($_POST["appDIR"]) == true && isset($_POST["apikey"]) == false) {
    mysqli_query($link, "UPDATE epgGenerator SET docroot = '$_POST[appDIR]'");
} if (isset($_POST["appDIR"]) == true && isset($_POST["apikey"]) == true) {
    mysqli_query($link, "UPDATE epgGenerator SET
				

				offset_horizon_HU = '$_POST[HUhorOS]',
				offset_24hu = '$_POST[OS24]',
				offset_porthu = '$_POST[portOS]',
				offset_tvmustra = '$_POST[mustraOS]',
				offset_smscz = '$_POST[smsOS]',
				offset_onet = '$_POST[onetOS]',
				offset_animare = '$_POST[animareOS]',

				delete_horizon = '$_POST[horDEL]',
				delete_24hu = '$_POST[DEL24]',
				delete_porthu = '$_POST[portDEL]',
				delete_tvmustra = '$_POST[mustraDEL]',
				delete_smscz = '$_POST[smsDEL]',
				delete_animare = '$_POST[animareDEL]',
				delete_onet = '$_POST[onetDEL]'");
} $settings = mysqli_fetch_row(mysqli_query($link, "SELECT * FROM epgGenerator"));
for ($x = 0; $x < count($settings); $x++) {
    define("SETTINGS" . $x, $settings[$x]);
} if (isset($_GET["download"]) == true && SETTINGS1 !== '' && SETTINGS1 !== null) {
    $zip = new ZipArchive;
    $download = $_GET["folder"] . '.zip';
    $zip->open($download, ZipArchive::CREATE);
    foreach (glob(SETTINGS1 . 'cache/' . $_GET["folder"] . "/*.json") as $file) {
        $zip->addFile($file, $_GET["folder"] . '/' . basename($file));
    }
    $zip->close();
    header("Pragma: public");
    header("Cache-Control: private");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    header("Content-Disposition: attachment; filename = $download");
    header("Content-Length: " . filesize($download));
    ob_clean();
    flush();
    readfile(SETTINGS1 . $download);
    unlink(SETTINGS1 . $download);
} elseif (isset($_GET["upload"]) == true && SETTINGS1 !== '' && SETTINGS1 !== null) {
    $zip = new ZipArchive;
    $upload = SETTINGS1 . 'cache/' . $_GET["folder"] . '.zip';
    if (file_exists($upload)) {
        $zip->open($upload);
        $zip->extractTo(SETTINGS1 . 'cache/');
        $zip->close();
        unlink($upload);
    }
} elseif (isset($_GET["admin"]) == true || isset($_POST["admin"]) == true) {



  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Lépjél csak be először";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }

if (SETTINGS1 !== '' && SETTINGS1 !== null) {
        if (file_exists(SETTINGS1 . 'functions/functions.php')) {
            
            foreach (glob(SETTINGS1 . 'cache/*/') as $folder) {
                $fi = new FilesystemIterator($folder);
                $numFile[basename($folder)] = iterator_count($fi);
            }

            $apiClass = 'green';
            if (is_dir(SETTINGS2)) {
                $xmlClass = 'green';
            } else {
                $xmlClass = 'red';
            }
            if (SETTINGS13 > 0) {
                $dayClass = 'green';
            } else {
                $dayClass = 'red';
            }



		

?>

<center><a href="index.php?logout='1'" style="color: #00FF00;"><font size="10">Kilépés a panelból</font></a> --- <a href="index.php?country=HU" style="color: #00FF00;"><font size="10">EPG GENERÁTOR KÉZI futtatás</font></a> --- <a href="logs/generator_HU.log" style="color: #00FF00;"><font size="10">EPG folyamat lista</font></a> --- <a href="dekodolaslista.php" style="color: #00FF00;"><font size="10">Dekódoló kód lista</font></a>  --- <a href="gebax.php" style="color: #00FF00;"><font size="10">Dekódoló</font></a></center>

<form class='display-flex column'>

				<div class="flex-1 display-flex row general"><div class="flex-1"><tt class="required"></tt><font background-color="red">API kulcs licensz:</font></div>
				<div class="flex-2 green"><input value="<?php echo SETTINGS0; ?>" type="text" name="apikey"> (Nem kell ide : <a href="http:/vtmk.hu">http://vtmk.hu</a> )</div>
				</div>
				<div class="flex-1 display-flex row">
				<div class="flex-1"><tt class="required"></tt>PROGRAM mappa:</div>
				<div class="flex-2 green"><input value="<?php echo SETTINGS1; ?>" type="text" name="appDIR"> (apszolúte URL, eg.: /mindent meggeneráló/)</div></div>
				
				
				<div class="flex-1 display-flex row">
				<div class="flex-1"><tt class="required"></tt>XML mappa:</div>
				<div class="flex-2 green"><input value="<?php echo SETTINGS2; ?>" type="text" name=" appDIR">
				(apszolúte URL, eg.: /Hova rakja az xml-t/)</div></div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">Ikonok URL:</div>
				<div class="flex-2" green><input value="<?php echo SETTINGS3; ?>" type="text" name="logoURL"> (Ikon mappa, eg.: http://vtmk.hu/ikon/)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">Napok száma:</div>
				<div class="flex-2"><select name="epg_day"><?php echo options(SETTINGS13,5) ; ?></select> (Hány napot generáljon le.)</div>
				</div>
				<div class="flex-1 display-flex row">
				<div class="flex-1">Készítsen GZ:</div>
				<div class="flex-2"><select name="gz"><?php echo options(SETTINGS14,1) ; ?></select> (Nem = 0 , 1 = Igen)</div>
				</div>
				
				
				<div class="flex-1 display-flex row correction">
				<div class="flex-1">HORIZON.TV OFFSET:</div>
				<div class="flex-2"><select name="HUhorOS"><?php echo options(SETTINGS5, -1) ; ?></select> (Horizon.tv időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">24.HU OFFSET:</div>
				<div class="flex-2"><select name="OS24"><?php echo options(SETTINGS6, -1) ; ?></select> (24.hu időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">PORT.HU OFFSET:</div>
				<div class="flex-2"><select name="portOS"><?php echo options(SETTINGS7, -1) ; ?></select> (port.hu időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">TVMUSTRA.HU OFFSET:</div>
				<div class="flex-2"><select name="mustraOS"><?php echo options(SETTINGS8, -1) ; ?></select> (tvmustra tv időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">SMS.CZ OFFSET:</div>
				<div class="flex-2"><select name="smsOS"><?php echo options(SETTINGS16, -1) ; ?></select> (sms.cz tv időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">ONET.PL OFFSET:</div>
				<div class="flex-2"><select name="onetOS"><?php echo options(SETTINGS17, -1) ; ?></select> (24.hu tv időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">Animare:</div>
				<div class="flex-2"><select name="animareOS"><?php echo options(SETTINGS19, -1) ; ?></select> (animare.hu tv időeltolás órában)</div>
				</div>
				
				<div class="flex-1 display-flex row cache">
				<div class="flex-1">HORIZON CACHE <tt style="font-weight:bold"><font color="yellow"> Fájlok <? echo $numFile["horizon.tv"]; ?>  db</font></tt>:</div>
				
				<div class="flex-2"><select name="horDEL"><?php echo options(SETTINGS9); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=horizon.tv">Letöltés</a></div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">24.HU CACHE <tt style="font-weight:bold"><font color="yellow"> Fájlok <? echo $numFile["24.hu"]; ?>  db</font></tt>:</div>
				<div class="flex-2"><select name="DEL24"><?php echo options(SETTINGS10); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=24.hu">Letöltés</a></div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">PORT.HU CACHE <tt style="font-weight:bold"><font color="yellow"> Fájlok <? echo $numFile["port.hu"]; ?>  db</font></tt>:</div>
				<div class="flex-2"><select name="portDEL"><?php echo options(SETTINGS11); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=port.hu">Letöltés</a></div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">TVMUSTRA CACHE <tt style="font-weight:bold"><font color="yellow">Fájlok <? echo $numFile["tvmustra.hu"]; ?>  db</font></tt>:</div>
				<div class="flex-2"><select name="mustraDEL"><?php echo options(SETTINGS12); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=tvmustra.hu">Letöltés</a></div>
				</div>
				</div>
				
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">SMS.CZ CACHE <tt style="font-weight:bold"><font color="yellow">Fájlok <? echo $numFile["sms.cz"]; ?> db</font></tt>:</div>
				<div class="flex-2"><select name="smsDEL"><?php echo options(SETTINGS15); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=sms.cz">Letöltés</a></div>
				</div></div>
				
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">ONET.PL CACHE <tt style="font-weight:bold"> <font color="yellow">Fájlok <? echo $numFile["onet.pl"]; ?>  db</font></tt>:</div>
				<div class="flex-2"><select name="onetDEL"><?php echo options(SETTINGS18); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=onet.pl">Letöltés</a></div>
				</div>
				</div>
				
				<div class="flex-1 display-flex row">
				<div class="flex-1">ANIMARE.HU CACHE <tt style="font-weight:bold"><font color="yellow">Fájlok <? echo $numFile["animare.hu"]; ?> db</font></tt>:</div>
				<div class="flex-2"><select name="animareDEL"><?php echo options(SETTINGS20); ?></select> (Kikapcsolva = 0 , 1 = Törlés) <a href="?download&folder=animare.hu">Letöltés</a></div>
				</div>
				<div class="version">Hackelt  PROGRAM VERZIÓ: 4.5 VTMK </div>
				
				
<div class="flex-1 display-flex"><button>Beállítások mentése</button></div>


</form>


<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
// <![CDATA[
$(document).ready(function(){

	$("form").on("click", "button", function(event){
		event.preventDefault();
		var post = $.post( "index.php", $("form").serialize()+"&admin");
		$("body").empty().removeClass("loaded").addClass("loading");

		post.error(function(){
			alert("error");
		});

		post.done(function(response){
			$("body").html(response).removeClass("loading").addClass("loaded");
		});
	});
});
// ]]></script>

<?php
 } else {
            echo '
			<div class="flex-1 display-flex row">
			<div class="flex-1">Program mappa:</div>
			<div class="flex-2 red"><input value="' . SETTINGS1 . '" type="text" name="appDIR"> (Abszolút elérés URL, .: ' . $_SERVER["DOCUMENT_ROOT"] . '/generator/)</div>
			</div>
			<div class="flex-1 display-flex row" style="margin:auto">Valamit faszul adtál meg</div>';
        }
    } else {
        echo '
			<div class="flex-1 display-flex row">
			<div class="flex-1">Program mappa:</div>
			<div class="flex-2 red"><input value="" type="text" name="appDIR"> (Abszolút elérés URL, eg.: ' . $_SERVER["DOCUMENT_ROOT"] . '/generator/)</div>
			</div>';
    };
	
} elseif (isset($_GET["country"]) == true) {
    if (SETTINGS1 === '' && SETTINGS1 === null) {
        echo 'Add meg a program elérési útját.';
        die;
    }
    if (!file_exists(SETTINGS1 . 'functions/functions.php')) {
        echo 'Hibás mappa';
        die;
    }
   


    setlocale(LC_ALL, 'en_US.UTF8');
    $old_error_handler = set_error_handler("hideErrors");
    $XMLarrays = array();
    if (mb_strlen($_GET["country"]) == 2) {
        $CH_GROUP = $_GET["country"];
    } else {
        file_put_contents(SETTINGS1 . 'logs/COUNTRY_error.log', 'Invalid country code, must be 2 letter');
        die;
    }
    foreach (glob(SETTINGS1 . 'sources/*') as $sourceFile) {
        if (!is_dir(SETTINGS1 . 'cache/' . pathinfo($sourceFile)['filename'])) {
            mkdir(SETTINGS1 . 'cache/' . pathinfo($sourceFile)['filename'], 0755);
        }
    }
    if (!is_dir(SETTINGS1 . 'logs')) {
        mkdir(SETTINGS1 . 'logs', 0755);
    }
    $DAYS = SETTINGS13;
    include SETTINGS1 . 'channels/channels.php';
    $ITERATOR = 0;
    $MAX_CHANNELS = count($channels);
    if ($MAX_CHANNELS < 1) {
        file_put_contents(SETTINGS1 . 'logs/CHANNELS_error.log', 'No TVchannels in channels.php file');
        die;
    }
    $TIMEa = time();
    file_put_contents(SETTINGS1 . 'logs/generator_' . $CH_GROUP . '.log', "VTMK EPG indulas = " . date('Y-m-d H:i:s', $TIMEa) . "\r\nNapok szama = $DAYS\r\nCsatornak szama = $MAX_CHANNELS\r\n\r\n");
    foreach ($channels as $channel_name => $array) {
        foreach ($array as $site_ID) {
            $SITES = explode('|', $site_ID);
            $CHANNEL = $channel_name;
            $preTag = $SITES[0];
            $ID = $SITES[1];
            $_temp_ = explode('.', $channel_name);
            $xmlLang[$ITERATOR] = mb_strtolower(end($_temp_));
            $_temp_ = null;
            if (strpos($preTag, '~') !== false) {
                $code = explode('~', $preTag);
                $WEBSITEID = strReplace($code[0], array('/' => '.')) . '.' . $code[1];
                $WEBSITE = $code[1];
                $WEBID = $code[0];
            } else {
                $WEBSITEID = $preTag;
                $WEBSITE = $preTag;
            }
            $XMLarrays["channelName"][$ITERATOR] = trim(preg_replace('~[^A-Za-z0-9&amp;]~', ' ', $CHANNEL));
            $XMLarrays["channelID"][$ITERATOR] = preg_replace('~[^a-z0-9\.]~', '.', mb_strtolower(preg_replace('~(&amp;)~', '-', $CHANNEL)));
            $XMLarrays["channelPic"][$ITERATOR] = SETTINGS3 . preg_replace('~[^a-z0-9\.]~', '.', mb_strtolower(preg_replace('~(&amp;)~', '-', $CHANNEL))) . '.png';
            include(SETTINGS1 . 'sources/' . $WEBSITE . '.php');
            if ($ITERATOR + 1 === $MAX_CHANNELS) {
                include(SETTINGS1 . 'buildXML/buildXML.php');
                $XMLarrays = null;
                include(SETTINGS1 . 'cache/clean.php');
                $TIMEb = date('Y-m-d H:i:s', time());
                $TIMEc = gmdate("H:i:s", time() - $TIMEa);
                file_put_contents(SETTINGS1 . 'logs/generator_' . $CH_GROUP . '.log', "\r\nEpg vegzett = $TIMEb\r\nGyartasi ido = $TIMEc", FILE_APPEND | LOCK_EX);
            }
            if ($stop === false) {
                break(1);
            }
        }
        $ITERATOR++;
    }

    restore_error_handler($old_error_handler);
} else {
	
    $uri = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '/';
    echo '<br><center>Lépj be paraszt. <a href="http://' . $_SERVER["SERVER_NAME"] . $uri . '?admin">EPG ADMIN PANEL BELÉPÉS NE PÖCSÖLJ</a></center>';
 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Lépjél csak be először";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
	
} mysqli_close($link);

?>
</body></html>
