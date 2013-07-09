<?
include("func.php");

$idVideo = $_GET['idVideo'];
$extVideo = $_GET['tipo'];
$querystring = "SELECT id, titulo, idioma, lugar, nombre, extension FROM videos WHERE id = ".$idVideo;
$result = mysql_query($querystring) or die("Error Consulta");
$row = mysql_fetch_array( $result );
?>

<?php include ("inc/header.php");?> 
		<div id="subMenu" class="canciones">
			<ul>
				<!--<li><a href="#">grabar</a></li>
				<li class="selected">grabar</li>-->
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">
				<div class="mainContent">
					<div id="record">
						<div id="videoPlayer">
							<div id="videoObj"></div>
						</div><!-- End #videoPlayer -->
						<div id="moreInfo">
							<h1><? print(html_entity_decode($row['titulo'])); ?></h1>
							<h2><? print(html_entity_decode($row['nombre'])); ?></h2>
							<dl>
								<dt>canta en</dt>
								<dd><? print(html_entity_decode($row['idioma'])); ?></dd>
								<dt>lugar</dt>
								<dd><? print(html_entity_decode($row['lugar'])); ?></dd>
							</dl>
						</div><!-- End #moreInfo -->
						<div class="clearBoth"></div>
					</div><!-- End #record -->
					<!-- End #comments -->
					<!-- End #commentForm -->

				</div><!-- End #MainContent -->
			</div><!-- End #contentInner -->
		</div><!-- End #content -->
<?php include ("inc/footer.php");?> 
