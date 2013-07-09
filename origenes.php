<?
	include("func.php");
	
		$lugares = mysql_query("SELECT lugar, count(lugar) AS cantlugar FROM videos WHERE visible = 1 AND form = 1 GROUP BY lugar ORDER BY cantlugar DESC") or die("Error Consulta Lugar");
	
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
					<h1 class="titulo">Lugares de Origen</h1>
					<div class="filters">
						<ul><?
							while($rowlugares = mysql_fetch_array( $lugares )) {
								print("<li><a href=\"canciones.php?filtro=origen&valor=".urlencode($rowlugares['lugar'])."\">".$rowlugares['lugar']." </a><span>".$rowlugares['cantlugar']."</span></li>");
							}
						?></ul>
					</div>
					<div class="clearBoth"></div>
				</div><!-- End #MainContent -->
			</div><!-- End #contentInner -->
		</div><!-- End #content -->
<?php include ("inc/footer.php");?> 
