<?

	include("func.php");
	
	$consulta = "SELECT DISTINCT idioma,visible from videos where visible=1";
	
	$result = mysql_query($consulta) or die("error consulta ".$_GET["valor"]);
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>";
	echo "<idiomas>";
 	while($rowlugares = mysql_fetch_array( $result )) {
		print("<idioma>".$rowlugares['idioma']."</idioma>");
	}
	echo "</idiomas>";
						
	
?>

