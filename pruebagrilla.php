<?

	include("func.php");
	
	$result = mysql_query("SELECT id, titulo, idioma, lugar, nombre FROM videos") or die("Error Consulta");
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?

	
	echo "<table border='1'>";
	echo "<tr> <th>ID</th> <th>TITULO</th> <th>IDIOMA</th>  <th>LUGAR</th>  <th>NOMBRE</th></tr>";
	
	while($row = mysql_fetch_array( $result )) {
		echo "<tr><td>"; 
		echo $row['id'];
		echo "</td><td>"; 
		echo $row['titulo'];
		echo "</td><td>"; 
		echo $row['idioma'];
		echo "</td><td>"; 
		echo $row['lugar'];
		echo "</td><td>"; 
		echo $row['nombre'];
		echo "</td></tr>"; 
	}	 

	echo "</table>";

?>
</body>
</html>
