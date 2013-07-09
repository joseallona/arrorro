<?
	include("func.php");
	
		$idiomas = mysql_query("SELECT idioma, count(idioma) AS cantidioma FROM videos WHERE visible = 1 AND form = 1 GROUP BY idioma ORDER BY cantidioma DESC") or die("Error Consulta Idioma");
	
?>

<?php include ("inc/header.php");?> 
		<div id="subMenu" class="canciones">
			<ul>
				<!--<li><a href="#">grabar</a></li>-->
				<li><a href="grabar.php">grabar</a></li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">
				<div class="mainContent">
					<h1 class="titulo">Idiomas</h1>
					<div class="filters">
						<ul><?
						
							while($rowlugares = mysql_fetch_array( $idiomas )) {
								print("<li><a href=\"canciones.php?filtro=idioma&valor=".urlencode($rowlugares['idioma'])."\">".$rowlugares['idioma']."</a><span>".$rowlugares['cantidioma']."</span></li>");
							}
						?></ul>
					</div>
					<div class="clearBoth"></div>
				</div><!-- End #MainContent -->
			</div><!-- End #contentInner -->
		</div><!-- End #content -->
<?php include ("inc/footer.php");?> 
