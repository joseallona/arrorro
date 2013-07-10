
<?php
	    
	$currentFile = $_SERVER["SCRIPT_NAME"];
    $parts = Explode('/', $currentFile);
    $currentFile = $parts[count($parts) - 1];
	
		$classHome ='';
		$classArrorro ='';
		$classVivo ='';
		$classCanciones ='';
		$logo = "../img/logo_arrorro.gif";
		$bnr = "../img/bnr_graba_tu_cancion_en.gif";
		$classBody = '';
		if($_SERVER['QUERY_STRING']){
			$otherLang="../". $currentFile. "?" .  $_SERVER['QUERY_STRING'];
		} else {
			$otherLang="../". $currentFile;
		}
				
	switch ($currentFile) {
    case "index.php":
			$classHome =' class="selected"';
			$logo="../img/logo_arrorro_home.gif";
			$bnr = "../img/bnr_graba_tu_cancion_home_en.gif";
			$classBody=' class="home"';
	        break;
    case "index2.php":
			$classHome =' class="selected"';
			$logo="../img/logo_arrorro_home.gif";
			$classBody=' class="home"';
	        break;
    case "proyecto.php":
			$classArrorro =' class="selected"';
			$classBody=' class="que-es-arrorro"';
	        break;
    case "80plus1.php":
			$classArrorro =' class="selected"';
	        $classBody=' class="que-es-arrorro"';
			break;
    case "equipo.php":
			$classArrorro =' class="selected"';
			$classBody=' class="que-es-arrorro"';
	        break;
    case "envivo.php":
			$classVivo =' class="selected"';
	        break;
    case "canciones.php":
			$classCanciones =' class="selected"';
			$classBody=' class="listado"';
	        break;
    case "grabar.php":
			//$classCanciones =' class="selected"';
			$classBody=' class="canciones"';
			$isGrabar=true;
	        break;
    case "player.php":
			$classCanciones =' class="selected"';
			$classBody=' class="canciones"';
			$isPlayer=true;
	        break;
    case "origenes.php":
			$classCanciones =' class="selected"';
			$classBody=' class="listado"';
			$isPlayer=true;
	        break;
    case "idiomas.php":
			$classCanciones =' class="selected"';
			$classBody=' class="listado"';
			$isPlayer=true;
	        break;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="en" />
<title>arrorr&oacute; lullabies</title>
<meta name="MSSmartTagsPreventParsing" content="true" />
<link rel="top" title="Main" href="/" />
<link rel="Shortcut Icon" type="image/x-icon" href="html/favicon.ico" />
<meta name="keywords" content="arrorro, arrorr&oacute;, arorro, arroro, songs, craddle, diversity, cultural, culture, chaco, linz, Resistencia, Maimonides, ars electronica, lullabies" />
<meta name="description" content=" Linz, Austria and Resistencia, Argentina will be united by an online connection with the purpose of exchanging lullabies that are sung in both countries; this will be a celebration of how people can meet and communicate." />
<style type="text/css" media="screen">
	<!--/*--><![CDATA[/*><!--*/ 
	@import "../css/screen.css";
	/*]]>*/-->
</style>

<link  rel="stylesheet" type="text/css" media="print" href="../css/print.css" />
<? if($isGrabar){ ?>
<script src="js/functions.js" type="text/javascript"></script>

<script src="../js/swfobject.js" type="text/javascript"></script>
<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.jqtransform.min.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
$(function() {
	//find all for,s and apply the plugin
	$("form").jqTransform();
	// hide the inline form
	//$("body").addClass("jsEnabled");
});

function enableSend(){
		var sendBtn = $('.inputButton');
		sendBtn.attr('src', sendBtn.attr('src').replace('disabled','normal'));
		sendBtn.removeAttr("disabled");

	}
	
	
/* Main SWF file. Relative to the location of this HTML page */
var swfUrl = "../swf/recTest_en.swf";

/* Static settings. No need to alter these. */
var swfId = "videoObj";

var width = '420';
var height = '700';
var version = '9.0.115';
var xi = "../swf/expressInstall.swf";
var flashvars  = {
	idMensaje: <?=$id?>, //!!!!!!! este id debe cargarse via PHP

	mediaServer: 'arrorrolullabies.com.ar',
	allowPlay: "0"
};
var params = {
	allowscriptaccess: 'always',
	allowfullscreen: 'true'
};
var attributes = {};


swfobject.embedSWF(swfUrl, swfId, width, height, version, xi, flashvars, params, attributes);


-->
</script>

<script language="JavaScript" type="text/javascript">
    function formAlert(msg) {
        alert(msg);
    }
</script>

<? }elseif($isPlayer){ ?>

<script src="../js/functions.js" type="text/javascript"></script>
<script src="../js/swfobject.js" type="text/javascript"></script>
<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../js/jquery.jqtransform.min.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
$(function() {
	//find all for,s and apply the plugin
	$("form").jqTransform();
	// hide the inline form
	//$("body").addClass("jsEnabled");
});

function enableSend(){
		var sendBtn = $('.inputButton');
		sendBtn.attr('src', sendBtn.attr('src').replace('disabled','normal'));
		sendBtn.removeAttr("disabled");

	}
	
	
/* Main SWF file. Relative to the location of this HTML page */
var swfUrl = "../swf/player.swf";

/* Static settings. No need to alter these. */
var swfId = "videoObj";

var width = '420';
var height = '357';
var version = '9.0.115';
var xi = "../swf/expressInstall.swf";
var flashvars  = {
	idMensaje: <?=$idVideo?>, //!!!!!!! este id debe cargarse via PHP
    ext: '<? print($extVideo); ?>',
	mediaServer: 'arrorrolullabies.com.ar',
	allowPlay: "0"
};
var params = {
	allowscriptaccess: 'always',
	allowfullscreen: 'true'
};
var attributes = {};


swfobject.embedSWF(swfUrl, swfId, width, height, version, xi, flashvars, params, attributes);


-->
</script>

<script language="JavaScript" type="text/javascript">
    function formAlert(msg) {
        alert(msg);
    }
</script>

<? }else{ ?>
<script src="../js/functions.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/swfobject.js"></script>

<script type="text/javascript">
	swfobject.registerObject("player", "9.0.115", "../swf/expressInstall.swf");
</script>
<? } ?>
</head>
<body <?php echo $classBody ?> >

<div id="container">
	<div id="containerInner">
		<div id="header">
			<div id="logo"><a href="./"><img src="<? echo $logo ?>"  alt="arrorr&oacute;" /></a></div>
			<div id="actionArea"><a href="grabar.php"><img src="<? echo $bnr ?>"  alt="Record your lullaby" /></a></div>
			<div class="clearBoth"></div>
		</div>
		<div id="menu">
			<ul id="mainMenu">
			<li<? echo $classHome ?>><a href="./" title="home">home</a></li>
				<li<? echo $classArrorro ?>><a href="proyecto.php" title="arrorr&oacute;">arrorr&oacute;</a></li>
				<li<? echo $classCanciones ?>><a href="canciones.php" title="lullabies">lullabies</a></li>
				<div class="clearBoth"></div>
			</ul>
			<ul id="languageMenu">
				<li><a href="<? echo $otherLang ?>">espa&ntilde;ol</a></li>
				<li>english</li>
				<div class="clearBoth"></div>
			</ul>
			<div class="clearBoth"></div>
		</div>
