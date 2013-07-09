<?
include("func.php");


$res = mysql_query("INSERT INTO videos (titulo, idioma, lugar, nombre) VALUES ('', '', '', '')") or die("Error Consulta");
$id = mysql_insert_id();

$isPost=0;

$queryLast = "SELECT DISTINCT idioma FROM videos";
$resultLast = mysql_query($queryLast) or die();



if ($_POST){
	$videoId=$_REQUEST['id'];
	$titulo = $_REQUEST['title'];
	$language = $_REQUEST['language'];
	$otherLanguage = $_REQUEST['otherLanguage'];
	if($otherLanguage == ''){
		$idioma= $language;
	}else{
		$idioma= $otherLanguage;
	}
	$lugar = $_REQUEST['origin'];
	$nombre = $_REQUEST['name'];
	$extension = $_REQUEST['extension'];
	$fecha = date('Y-m-d');
	$update = "UPDATE videos
				SET titulo='$titulo',idioma='$idioma', lugar='$lugar', nombre='$nombre', fecha='$fecha',visible=0, form = 1, extension='$extension' 
				WHERE id=$videoId";
	//echo $update;
	$res3 = mysql_query($update)or die();
	$isPost=1;

}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="es" />
<title>proyecto. arrorr&oacute;: un encuentro entre culturas</title>
<meta name="MSSmartTagsPreventParsing" content="true" />
<link rel="top" title="Main" href="/" />
<link rel="Shortcut Icon" type="image/x-icon" href="html/favicon.ico" />
<meta name="keywords" content="arrorro, arrorr&oacute;, arorro, arroro, canciones, cuna, diversidad, cultural, cultura, chaco, linz, Resistencia, Maimonides, ars electronica" />
<meta name="description" content="arrorr&oacute;, es un evento en vivo que conectar&aacute; las ciudades de Linz (Austria), y Resistencia (Chaco, Argentina) con la finalidad de intercambiar canciones de cuna entre ambos paÃ­ses, reflejando el encuentro entre diversas comunidades, y la transmisi&oacute;n cultural a trav&eacute;s de las generaciones." />
<style type="text/css" media="screen">
	<!--/*--><![CDATA[/*><!--*/ 
	@import "css/screen.css";
	@import "css/uploadify.css";
	/*]]>*/-->
</style>
<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
<script src="js/functions.js" type="text/javascript"></script>

<script src="js/swfobject.js" type="text/javascript"></script>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.jqtransform.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadify.js" type="text/javascript"></script>
<script type="text/javascript">
<!--

var isPost=<?=$isPost?>;

// 
$(document).ready(function() {
//$(function() {
	//find all for,s and apply the plugin
	$("form").jqTransform();
	
	$('#fileInput').fileUpload ({
		uploader  : 'swf/uploader.swf',
		script    : 'upload.php',
		cancelImg : 'img/cancel.png',
		auto      : true,
		folder    : 'vids',
		fileExt   : '*.mov;*.flv;',
		width	  : '184',
		buttonText: 'SELECCIONAR TESTIMONIO',
		buttonImg : 'img/btn/seleccionar.png',
		scriptData : {videoId:<?=$id?>}
	});
	if (isPost){
		showThanks();
	}
	
});
	

function enableSend(){
		var sendBtn = $('.inputButton');
		sendBtn.attr('src', sendBtn.attr('src').replace('disabled','normal'));
		sendBtn.removeAttr("disabled");

	}
function showThanks(){
		var msg = $('#formGracias');
		msg.css("display", "block"); 
	}
	
	
//enableSend();	

/* Main SWF file. Relative to the location of this HTML page */
var swfUrl = "swf/rec.swf";

/* Static settings. No need to alter these. */
var swfId = "videoObj";

var width = '420';
var height = '357';
var version = '8.0.0';
var xi = "swf/expressInstall.swf";
var flashvars  = {
	//idMensaje: <?=$id?>, //!!!!!!! este id debe cargarse via PHP

	mediaServer: 'arrorrolullabies.com.ar',
	allowPlay: "0"
};

var params = {
	allowscriptaccess: 'always',
	allowfullscreen: 'true'
};
var attributes = {};


//swfobject.embedSWF(swfUrl, swfId, width, height, version, xi, flashvars, params, attributes);


-->
</script>

</head>
<body class="canciones">

<div id="container">
	<div id="containerInner">
		<div id="header">

			<div id="logo"><a href="./"><img src="img/logo_arrorro.gif"  alt="arrorr&oacute;" /></a></div>
			<div id="actionArea"></div>
			<div class="clearBoth"></div>
		</div>
		<div id="menu">
			<ul>
				<li><a href="./" title="home">home</a></li>
				<li><a href="proyecto.htm" title="arrorr&oacute;">arrorr&oacute;</a></li>

				<li><a href="/blog" title="blog">blog</a></li>
				<li>en vivo</li>
				<li  class="selected"><a href="#">canciones</a></li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="subMenu" class="canciones">

			<ul>
				<!--<li><a href="#">grabar</a></li>-->
				<li class="selected">grabar</li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">

				<div class="mainContent">
					<h1>Sub&iacute; tu canci&oacute;n de cuna</h1>
					<p class="highlighted">S&eacute; parte del proyecto arrorr&oacute;. Grabate con tu c&aacute;mara  convert&iacute; el archivo a flv y particip&aacute; del proyecto.</p>
					<div id="record">
						<form method="post" action="subir.php" class="jqtransform">
                        <div id="formError">
                        	<ul>
                            	<li>Te faltó llenar el t&iacute;tulo</li>
                            	<li>No agregaste el idioma</li>
                            </ul>
                        </div>
                        <div id="formGracias">
                        	<ul>
                            	<li>Gracias! Subiste el video con exito.</li>
                            </ul>
                        </div>
							<div class="fieldWrapper">
								<input type="file" name="fileInput" id="fileInput" />
							</div>
							<div class="fieldWrapper">
								<div class="">
									<label>Tipo de archivo</span></label>
									<select name="extension">
										<option value="mov">MOV - h.264</option>
										<option value="flv">FLV</option>
									</select><br />

								</div>
							</div>

							<div class="fieldWrapper">
								<label>T&iacute;tulo de la canci&oacute;n <span>(Si no lo sab&eacute;s, valoramos tu creatividad)</span></label>
								<input type="text" name="title" class="inputText" />
							</div>

							<div class="sameLine">
								<div class="fieldWrapper sel">
									<div class="select">
										<label>Idioma</span></label>
										<select name="language" id="language" >
											<?
											while ($row = mysql_fetch_array($resultLast,MYSQL_ASSOC)) {
												if ($row["idioma"]!="") {
													echo '<option value="'.$row["idioma"].'">'. $row["idioma"] .'</option>';
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="fieldWrapper">
									<label>Otros</span></label>

									<input type="text" name="otherLanguage" class="inputText" />
								</div>
								<div class="clearBoth"></div>
							</div>
							<div class="fieldWrapper">
								<label>Lugar de Origen <span>  (Ej. Rosario, Uruguay, Chaco)</span></label>
								<input type="text" name="origin" class="inputText" />

							</div>
							<div class="fieldWrapper">
								<label>Tu nombre <span>(Ej. Agustin, Pepe, Maria)</span></label>
								<input type="text" name="name" class="inputText" />
							</div>
							<input type="hidden" name="id" value="<?=$id?>"  />
							<div class="submitField">
								<!--<input type="image" src="img/btn/subir_video_disabled.gif" class="inputButton" disabled="disabled" />-->
								<input type="image" src="img/btn/subir_video_normal.gif" class="inputButton" />
							</div>

						
						</form>
					</div><!-- End #record -->
				</div><!-- End #MainContent -->
                
			</div><!-- End #contentInner -->

		</div><!-- End #content -->
	</div><!-- End #containerInner -->
</div><!-- End #container -->
<div id="footer">
	<div id="footerInner">
        <div id="legales">
            <h3>Legales</h3>
            <p>Importante: No subas programas de TV, videos musicales, conciertos o anuncios sin permiso, a menos que se trate de contenido creado completamente por ti. Tampoco subas videos que incluyan a otras personas sin tener debida autorizaci&oacute;n.</p>

            <p><a href="legales.htm">Seguir leyendo legales &raquo;</a></p>
        </div><!-- End #legales -->
        
        <div id="sponsors">
            <h3>Sponsors</h3>
            <ul>
                <li><a href="http://www.80plus1.org/" target="_blank" title="80+1"><img src="img/logo_80plus1.gif" alt="80+1" /></a></li>
                <li><a href="http://www.linz09.at/en/index.html" target="_blank" title="Linz 2009"><img src="img/logo_linz2009.gif" alt="Linz 2009" /></a></li>    
                <li><a href="http://www.aec.at/index_en.php" target="_blank" title="Ars Electronica"><img src="img/logo_arsElectronica.gif" alt="Ars Electronica" /></a></li>

                <li><a href="http://www.voestalpine.com/ag/en.html" target="_blank" title="voestalpine"><img src="img/logo_voestalpine.gif" alt="voestalpine" /></a></li>    
            </ul>
        </div><!-- End #sponsors -->
        <div id="clearBoth"></div>
	</div><!-- End #footerInner -->
</div><!-- End #footer -->
</body>
</html>
