
<?php
	    
	$currentFile = $_SERVER["SCRIPT_NAME"];
    $parts = Explode('/', $currentFile);
    $currentFile = $parts[count($parts) - 1];
	
		$classHome ='';
		$classArrorro ='';
		$classVivo ='';
		$classCanciones ='';
		$logo = "img/logo_arrorro.gif";
		$bnr = "img/bnr_graba_tu_cancion.gif";
		$classBody = '';
		if($_SERVER['QUERY_STRING']){
			$otherLang="en/". $currentFile. "?" .  $_SERVER['QUERY_STRING'];
		} else {
			$otherLang="en/". $currentFile;
		}
					
	switch ($currentFile) {
    case "index.php":
			$classHome =' class="selected"';
			$logo="img/logo_arrorro_home.gif";
			$bnr = "img/bnr_graba_tu_cancion_home.gif";
			$classBody=' class="home"';
	        break;
    case "index2.php":
			$classHome =' class="selected"';
			$logo="img/logo_arrorro_home.gif";
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
	case "grabar2.php":
			//$classCanciones =' class="selected"';
			$classBody=' class="canciones"';
			$isGrabar=true;
	        break;
    case "player_old.php":
			$classCanciones =' class="selected"';
			$classBody=' class="canciones"';
			$isPlayer=true;
	        $srvr="";
	        $player='swf/player.swf';
			break;
    case "player.php":
			$classCanciones =' class="selected"';
			$classBody=' class="canciones"';
			$isPlayer=true;
			$player='swf/_player.swf';
			$srvr="server:'$server',";
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
<title>arrorr&oacute;: un encuentro entre culturas</title>
<meta name="MSSmartTagsPreventParsing" content="true" />
<link rel="top" title="Main" href="/" />
<link rel="Shortcut Icon" type="image/x-icon" href="html/favicon.ico" />
<meta name="keywords" content="arrorro, arrorr&oacute;, arorro, arroro, canciones, cuna, diversidad, cultural, cultura, chaco, linz, Resistencia, Maimonides, ars electronica" />
<meta name="description" content="arrorr&oacute;, es un evento en vivo que conectar&aacute; las ciudades de Linz (Austria), y Resistencia (Chaco, Argentina) con la finalidad de intercambiar canciones de cuna entre ambos países, reflejando el encuentro entre diversas comunidades, y la transmisi&oacute;n cultural a trav&eacute;s de las generaciones." />
<style type="text/css" media="screen">
	<!--/*--><![CDATA[/*><!--*/ 
	@import "css/screen.css";
	/*]]>*/-->
</style>

<link  rel="stylesheet" type="text/css" media="print" href="css/print.css" />

<? if($isGrabar){ ?>
<script src="js/functions.js" type="text/javascript"></script>

<script src="js/swfobject.js" type="text/javascript"></script>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.jqtransform.min.js" type="text/javascript"></script>
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
var swfUrl = "swf/recTest.swf";

/* Static settings. No need to alter these. */
var swfId = "videoObj";

var width = '420';
var height = '700';
var version = '9.0.115';
var xi = "swf/expressInstall.swf";
var flashvars  = {
	idMensaje: <?=$id?>, //!!!!!!! este id debe cargarse via PHP

	//mediaServer: 'arrorrolullabies.com.ar',
	mediaServer: 'pwazgwb6s9ix.rtmphost.com',
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

<script src="js/functions.js" type="text/javascript"></script>
<script src="js/swfobject.js" type="text/javascript"></script>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.jqtransform.min.js" type="text/javascript"></script>
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
var swfUrl = "<?=$player?>";

/* Static settings. No need to alter these. */
var swfId = "videoObj";

var width = '420';
var height = '357';
var version = '9.0.115';
var xi = "swf/expressInstall.swf";
var flashvars  = {
	idMensaje: <?=$idVideo?>, //!!!!!!! este id debe cargarse via PHP
    ext: '<?=$extVideo?>',
	<?=$srvr?>
	
	mediaServer: '',
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
<script src="js/functions.js" type="text/javascript"></script>
<script type="text/javascript" src="js/swfobject.js"></script>

<script type="text/javascript">
	swfobject.registerObject("player", "9.0.115", "swf/expressInstall.swf");
</script>
<? } ?>
</head>
<body <?php echo $classBody ?> >

<div id="container">
	<div id="containerInner">
		<div id="header">
			<div id="logo"><a href="./"><img src="<? echo $logo ?>"  alt="arrorr&oacute;" /></a></div>
			<div id="actionArea"><a href="grabar.php"><img src="<? echo $bnr ?>"  alt="grab&aacute; tu canci&oacute;n" /></a></div>
			<div class="clearBoth"></div>
		</div>
		<div id="menu">
			<ul id="mainMenu">
			<li<? echo $classHome ?>><a href="./" title="home">home</a></li>
				<li<? echo $classArrorro ?>><a href="proyecto.php" title="arrorr&oacute;">arrorr&oacute;</a></li>
				<li><a href="/blog" title="blog">blog</a></li>
				<li<? echo $classVivo ?>>en vivo</li>
				<li<? echo $classCanciones ?>><a href="canciones.php" title="canciones">canciones</a></li>
				<div class="clearBoth"></div>
			</ul>
			<ul id="languageMenu">
				<li>espa&ntilde;ol</li>
				<li><a href="<? echo $otherLang ?>">english</a></li>
				<div class="clearBoth"></div>
			</ul>
			<div class="clearBoth"></div>
		</div>
