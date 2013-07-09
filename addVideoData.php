<?php

require("func.php");

$id = $_POST['elId'];

$titulo = utf8_decode($_POST['elTitulo']);
$lugar = utf8_decode($_POST['elLugar']);
$nombre = utf8_decode($_POST['elNombre']);
$origen = utf8_decode($_POST['elOrigen']);
$idioma = utf8_decode($_POST['elIdioma']);
$fecha = date('Y-m-d');


$consulta=mysql_query("UPDATE videos SET titulo='$titulo', lugar='$origen', idioma='$idioma', nombre='$nombre', fecha='$fecha', form=1, visible=0, server='influxis' WHERE id = $id");


if(mysql_errno()!=0){
echo "r=0";
}else{
echo "r=1";
}
?>