<?
include("func.php");

$res = mysql_query("INSERT INTO videos (titulo, idioma, lugar, nombre) VALUES ('', '', '', '')") or die("Error Consulta");
$id = mysql_insert_id();

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
					<h1>Pr&oacute;ximamente podr&aacute;s grabar tu canci&oacute;n de cuna</h1>
					<p class="highlighted">S&eacute; parte del proyecto arrorr&oacute;. Prend&eacute; la webcam y animate a grabar las canciones que te cantaban cuando eras chico.</p>
			</div><!-- End #MainContent -->
                
			</div><!-- End #contentInner -->

		</div><!-- End #content -->
<?php include ("inc/footer.php");?> 
