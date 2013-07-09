<?
include("../func.php");

$res = mysql_query("INSERT INTO videos (titulo, idioma, lugar, nombre) VALUES ('', '', '', '')") or die("Error Consulta");
$id = mysql_insert_id();

?>

<?php include ("inc/header.php");?> 
		<div id="subMenu" class="canciones">

			<ul>
				<li class="selected">record</li>
				<div class="clearBoth"></div>
			</ul>
		</div>
		<div id="content">
			<div id="contentInner">

				<div class="mainContent">
					<h1>Record your lullaby</h1>
					<p class="highlighted">Get involved in the project. Turn on your webcam and sing the lullabies you heard as a child.</p>
					<div id="record">

						<div id="videoPlayer">
							<div id="videoObj"></div>
						</div><!-- End #videoPlayer -->
						<div id="instructions">
							<h2>How to record your lullaby</h2>
							<dl>
								<dt><span class="step">Step 1: </span>Connect your webcam</dt>

								<dd>This is simple. You'll find a sign asking for permission to access your webcam. Accept ir by clicking Allow. If you don't see yourself by now, right click on the player and select Preferences. Next to the Close button you'll see a webcam icon, click it and select your webcam from the combobox. Now click on Close and you're done!</dd>
								<dt><span class="step">Step 2: </span>Sing your lullaby</dt>

								<dd>This second step is much easier. Click on the red recording button and give us your best performance!</dd>
								<dt><span class="step">Step 3: </span>Complete the form and upload the video</dt>
								<dd>This information is useful for us, so we can put in order the videos more efficiently. Thanks for your help.</dd>

							</dl>
						</div><!-- End #instructions -->
						<div class="clearBoth"></div>
					</div><!-- End #record -->
				</div><!-- End #MainContent -->
                
			</div><!-- End #contentInner -->

		</div><!-- End #content -->
<?php include ("inc/footer.php");?> 
