<?
include("func.php");

$res = mysql_query("INSERT INTO videos (titulo, idioma, lugar, nombre) VALUES ('', '', '', '')") or die("Error Consulta");
$id = mysql_insert_id();

?>

<?php include ("inc/header.php");?> 
		<div id="subMenu" class="canciones">

			<ul>
				<li class="selected">grabar</li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">

				<div class="mainContent">
					<h1>Grab&aacute; tu canci&oacute;n de cuna</h1>
					<p class="highlighted">S&eacute; parte del proyecto arrorr&oacute;. Prend&eacute; la webcam y animate a grabar las canciones que te cantaban cuando eras chico.</p>
					<div id="record">

						<div id="videoPlayer">
							<div id="videoObj"></div>
						</div><!-- End #videoPlayer -->
						<div id="instructions">
							<h2>C&oacute;mo grabar tu canci&oacute;n</h2>
							<dl>
								<dt><span class="step">Paso 1: </span>Conect&aacute; tu c&aacute;mara web</dt>

								<dd>Esto es sencillo. Te vas a encontrar con un aviso que te pide permiso para usar tu webcam, acept&aacute; haciendo click en Permitir. Si a&uacute;n no ves la imagen, click derecho sobre el player y and&aacute; a configuraci&oacute;n. Al lado del bot&oacute;n cerrar vas a ver una camarita, hac&eacute; click ah&iacute; y seleccioná tu webcam. Dale a cerrar y eso es todo! </dd>
								<dt><span class="step">Paso 2: </span>Cant&aacute; tu canci&oacute;n</dt>

								<dd>El paso dos es m&aacute;s sencillo a&uacute;n. Hac&eacute; click en grabar y danos tu mejor versi&oacute;n!</dd>
								<dt><span class="step">Paso 3: </span>Complet&aacute; los datos y sub&iacute; el video</dt>
								<dd>Estos datos nos sirven a nosotros para poder ordenar el contenido de forma más eficiente. Gracias por ayudarnos.</dd>

							</dl>
						</div><!-- End #instructions -->
						<div class="clearBoth"></div>
					</div><!-- End #record -->
				</div><!-- End #MainContent -->
                
			</div><!-- End #contentInner -->

		</div><!-- End #content -->
<?php include ("inc/footer.php");?> 
