<?

	include("../func.php");
	
	$consulta = "SELECT id, titulo, idioma, lugar, nombre, extension FROM videos WHERE visible = 1 AND form = 1";
	
	if($_GET["filtro"]=="origen"){
		$criterio = " AND lugar =\"".$_GET["valor"]."\"";
	}
	else if($_GET["filtro"]=="idioma"){
		$criterio = " AND idioma =\"".$_GET["valor"]."\"";
	}
	else{
		$criterio = "";
	}
	$orden = " ORDER BY id DESC";
	$result = mysql_query($consulta.$criterio.$orden) or die("error consulta ".$_GET["valor"]);
		
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
	
	$result = mysql_query($consulta.$criterio.$orden." LIMIT ".$inicio.",".$CANTMUESTRAS) or die("error consulta ".$_GET["valor"]);

	
	
	$idiomas = mysql_query("SELECT idioma, count(idioma) AS cantidioma FROM videos WHERE visible = 1 AND form = 1 GROUP BY idioma ORDER BY cantidioma DESC") or die("Error Consulta Idioma");
	$origenes = mysql_query("SELECT lugar, count(lugar) AS cantlugar FROM videos WHERE visible = 1 AND form = 1 GROUP BY lugar ORDER BY cantlugar DESC") or die("Error Consulta Idioma");
	$thumbfolder = "_thumbs/"
?>

<?php include ("inc/header.php");?>
		<div id="subMenu" class="canciones">
			<ul>
				<!--<li><a href="#">grabar</a></li>-->
				<li><a href="grabar.php">record</a></li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">
				<div class="mainContent">
					<h1>Lullabies  <span class="filterName">
					<? if($_GET["filtro"]=="origen"){
						 echo "from ".$_GET["valor"];
					 } else if($_GET["filtro"]=="idioma"){
						echo "in ".$_GET["valor"];
						
					 }?></span></h1>
					<div id="results">
						<div class="songRow">
						<?
							$cont = 0;
							while($row = mysql_fetch_array( $result )) {
							$cont++;
							if(fmod($cont,4) != 0)
							{
								print("<div class=\"song last\">");
							}
							else
							{
								print("<div class=\"song last\">");
							}				
									print("<div class=\"songInner\">");
										print("<a href=\"http://www.arrorrolullabies.com.ar/en/player.php?idVideo=".$row['id']."&tipo=".$row['extension']."\"><img src=\"../_thumbs/".$row['id'].".jpg\" height=\"118\" width=\"149\"/></a>");
										print("<p class=\"title\"><a href=\"http://www.arrorrolullabies.com.ar/en/player.php?idVideo=".$row['id']."&tipo=".$row['extension']."\">".$row['titulo']."</a></p>");
										print("<p class=\"author\">".$row['nombre']."</p>");
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
						<div id="pagination">
						<ul>
							<? 
							
							if($totalpaginas > 1){
								echo "<li><a href=\"canciones.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=1\">&laquo; First </a></li>";
								
								if($pagina > 1)
									echo "<li><a href=\"canciones.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".($pagina -1)."\">&lsaquo; Previous </a></li>";
								
								for($i = 1; $i <= $totalpaginas; $i++){
									if($pagina == $i)
										echo "<li class='selected'>$pagina</li>";
									else
										echo "<li><a href=\"canciones.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".$i."\">".$i." </a></li>";
								}
								
								if($pagina < $totalpaginas)
									echo "<li><a href=\"canciones.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".($pagina +1)."\"> Next &rsaquo;</a></li>";
								
								echo "<li><a href=\"canciones.php?filtro=".$_GET["filtro"]."&valor=".$_GET["valor"]."&pagina=".$totalpaginas."\"> Last &raquo;</a></li>";
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
						<h2>By origin</h2>
						<ul>
							<?  while($rowlugares = mysql_fetch_array( $origenes )) {
									print("<li><a href=\"canciones.php?filtro=origen&valor=".urlencode($rowlugares['lugar'])."\">".$rowlugares['lugar']."</a></li>");
								}
							?>
							<li class="lastInList"><a href="origenes.php">See all origins &raquo;</a></li>
						</ul>
						<h2>By language</h2>
						<ul>
							<?  while($rowlugares = mysql_fetch_array( $idiomas )) {
									print("<li><a href=\"canciones.php?filtro=idioma&valor=".urlencode($rowlugares['idioma'])."\">".$rowlugares['idioma']."</a></li>");
								}
							?>
							<li class="lastInList"><a href="idiomas.php">See all languages &raquo;</a></li>
						</ul>
					</div>
					<div class="clearBoth"></div>
				</div><!-- End #MainContent -->
			</div><!-- End #contentInner -->
		</div><!-- End #content -->
<?php include ("inc/footer.php");?>