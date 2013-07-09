<?
	include("func.php");
	session_start();


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
<meta name="description" content="arrorr&oacute;, es un evento en vivo que conectar&aacute; las ciudades de Linz (Austria), y Resistencia (Chaco, Argentina) con la finalidad de intercambiar canciones de cuna entre ambos países, reflejando el encuentro entre diversas comunidades, y la transmisi&oacute;n cultural a trav&eacute;s de las generaciones." />
<style type="text/css" media="screen">
	<!--/*--><![CDATA[/*><!--*/ 
	@import "css/screen.css";
	/*]]>*/-->
</style>
<link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
<script src="js/functions.js" type="text/javascript"></script>
<script src="js/swfobject.js" type="text/javascript"></script>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.jqtransform.min.js" type="text/javascript"></script>

</head>
<body class="listado">
<div id="container">
	<div id="containerInner">
		<div id="header">
			<div id="logo"><a href="./"><img src="img/logo_arrorro.gif"  alt="arrorr&oacute;" /></a></div>
			<div id="actionArea"></div>
			<div class="clearBoth"></div>
		</div>
		<div id="menu">
			<ul>
				<li  class="selected"><a href="canciones.php">canciones</a></li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">
				<div class="mainContent">
					<?
					if ($_POST["password"] && ($_POST["password"] == $ADMIN_PASS))
					{
						$logueado = 1;
						$_SESSION["arrorro_ok"] = 1;
						$_SESSION["arrorro_pass"] = $_POST["password"];
					}
					elseif ($_SESSION["arrorro_ok"] && $_SESSION["arrorro_pass"])
					{
						if ($_SESSION["arrorro_pass"] == $ADMIN_PASS)
							$logueado = 1;

					}
					elseif ($_POST["password"] && ($_POST["password"] != $ADMIN_PASS))
					{
						?>
						<h1>Login fallido</h1>
						<?
						$logueado = 0;
					}
					elseif (empty($_SESSION["arrorro_ok"]) || empty($_SESSION["arrorro_pass"]))
					{
						?>
						<h1>Login</h1>
						<br />
						<br />
						<FORM METHOD="POST" ACTION="">
							<INPUT TYPE="password" NAME="password">
							<INPUT TYPE="submit" value="Loguearse">
						</FORM>

						
						<?
					}
					
					if ($logueado && $_POST["ids_upd"] && $_POST["ids_total"])
					{
						foreach ($_POST["ids_total"] AS $id)
							mysql_query("UPDATE videos SET visible = 0 WHERE id = ".$id."") or die ("Error UPD 1");

						foreach ($_POST["ids_upd"] AS $id)
							mysql_query("UPDATE videos SET visible = 1 WHERE id = ".$id."") or die ("Error UPD 2");

					}
					
					
					if ($logueado == 1)
					{

						$consulta = "SELECT id, titulo, idioma, lugar, nombre, visible, extension FROM videos";
						
						if($_GET["filtro"]=="origen"){
							$criterio = " WHERE form = 1 AND lugar =\"".$_GET["valor"]."\"";
						}
						else if($_GET["filtro"]=="idioma"){
							$criterio = " WHERE form = 1 AND idioma =\"".$_GET["valor"]."\"";
						}
						else{
							$criterio = " WHERE form = 1";
						}
						$result = mysql_query($consulta.$criterio) or die("error consulta ".$_GET["valor"]);
						
						$CANTMUESTRAS = 20;
						
						$pagina = $_GET["pagina"];
						if(!$pagina || $pagina==0){
							$inicio = 0;
							$pagina = 1;
						}
						else{
							$inicio = ($pagina - 1) * $CANTMUESTRAS;
						}
						
						$totalregistros = mysql_num_rows($result);
						$totalpaginas = ceil($totalregistros / $CANTMUESTRAS);
						
						$result = mysql_query($consulta.$criterio." LIMIT ".$inicio.",".$CANTMUESTRAS) or die("error consulta ".$_GET["valor"]);
						
						
						$idiomas = mysql_query("SELECT idioma, count(idioma) AS cantidioma FROM videos GROUP BY idioma ORDER BY cantidioma DESC") or die("Error Consulta Idioma");
						$origenes = mysql_query("SELECT lugar, count(lugar) AS cantlugar FROM videos GROUP BY lugar ORDER BY cantlugar DESC") or die("Error Consulta Idioma");
						$thumbfolder = "_thumbs/"
					
					?>


					<h1>Administrar canciones <span class="filterName"><? if($_GET["filtro"]=="origen"){ echo "de ".$_GET["valor"]; } else if($_GET["filtro"]=="idioma"){ echo "en ".$_GET["valor"]; }?></span></h1>
					<div id="results">
						<FORM name="edit" METHOD=POST ACTION="">
						<div class="songRow">
						<?
							$cont = 0;
							while($row = mysql_fetch_array( $result ))
							{
							
							$cont++;
							if(fmod($cont,4) != 0)
							{
								print("<div class=\"song last\">");
							}
							else
							{
								print("<div class=\"song last\">");
							}		

									if ($row["visible"] == 1)
										$checked = "checked = \"checked\"";
									else
										$checked = "";

									print("<div class=\"songInner\">");
										print("<a href=\"http://www.arrorrolullabies.com.ar/player.php?idVideo=".$row['id']."&tipo=".$row['extension']."\"><img src=\"_thumbs/".$row['id'].".jpg\" height=\"118\" width=\"149\"/></a>");
										print("<p class=\"title\"><a href=\"http://www.arrorrolullabies.com.ar/player.php?idVideo=".$row['id']."&tipo=".$row['extension']."\">".$row['titulo']."</a></p>");
										print("<p class=\"author\">".$row['nombre']."</p>");
										print("<input type=\"hidden\" name=\"ids_total[]\" value=\"".$row["id"]."\" />");

										print("<p align=\"center\"><INPUT TYPE=\"checkbox\" name=\"ids_upd[]\" value=\"".$row['id']."\" ".$checked."></p>");
									print("</div>");
								print("</div>");
								
								if(fmod($cont,4) == 0){
									print("<div class=\"clearBoth\"></div>");
									print("</div>");
									print("<div class=\"songRow\">");
								}
							}
						?>
						</div>
						<div class="clearBoth"></div>
						<br />
						<br />
						<center><INPUT TYPE="submit" value="Guardar Cambios"></center>
						</FORM>
						<div id="pagination">
						<ul>
							<? 
							
							if($totalpaginas > 1){
								echo "<li><a href=\"admin.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=1\">&laquo; Primera </a></li>";
								
								if($pagina > 1)
									echo "<li><a href=\"admin.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".($pagina -1)."\">&lsaquo; Anterior </a></li>";
								
								for($i = 1; $i <= $totalpaginas; $i++){
									if($pagina == $i)
										echo "<li class='selected'>$pagina</li>";
									else
										echo "<li><a href=\"admin.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".$i."\">".$i." </a></li>";
								}
								
								if($pagina < $totalpaginas)
									echo "<li><a href=\"admin.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".($pagina +1)."\"> Siguiente &rsaquo;</a></li>";
								
								echo "<li><a href=\"admin.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".$totalpaginas."\"> &Uacute;ltima &raquo;</a></li>";
							}	
							
							/*<li><a href="#">&laquo; Primera</a></li>
							<li><a href="#">&lsaquo; Anterior</a></li>
							<li class="selected">1</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Siguiente &rsaquo;</a></li>
							<li><a href="#">&Uacute;ltima &raquo;</a></li>*/
							
							?>
						</ul>
					</div>
					</div><!-- End #results -->
					<div class="filters">
						<h2>Por origen</h2>
						<ul>
							<?  while($rowlugares = mysql_fetch_array( $origenes )) {
									print("<li><a href=\"admin.php?filtro=origen&valor=".urlencode($rowlugares['lugar'])."\">".$rowlugares['lugar']."</a></li>");
								}
							?>
							<? //<li class="lastInList"><a href="#">Ver todos los or&iacute;gines &raquo;</a></li> ?>
						</ul>
						<h2>Por idioma</h2>
						<ul>
							<?  while($rowlugares = mysql_fetch_array( $idiomas )) {
									print("<li><a href=\"admin.php?filtro=idioma&valor=".urlencode($rowlugares['idioma'])."\">".$rowlugares['idioma']."</a></li>");
								}
							?>
							<? //<li class="lastInList"><a href="#">Ver todos los idiomas &raquo;</a></li> ?>
						</ul>
					</div>
					<div class="clearBoth"></div>
					<?
					}
					?>
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
