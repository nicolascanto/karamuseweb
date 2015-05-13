<?php
session_start();

header('Access-Control-Allow-Origin: *');
include_once ('conexion.php');
mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

$emailBar = $_SESSION['emailUser'];

$sql = "SELECT COUNT(codK) FROM `karaokesbar` WHERE emailBar='". $emailBar ."'";

$arrDatos = array();
$registrosPorPagina = 500;
$i = 1;

$resultado = mysql_query($sql);

if(!$resultado){
	echo "SE HA DETECTADO EL SIGUIENTE ERROR EN LA BD AL CONSULTAR LA CANTIDAD DE KARAOKES DEL BAR: \n" . mysql_error();
}else{
	$totalRegistros = mysql_fetch_array($resultado);
	$cantidadPaginas = ceil($totalRegistros[0] / $registrosPorPagina);

	// echo $totalRegistros[0]."<br>";
	// echo $registrosPorPagina."<br>";
	// echo $cantidadPaginas."<br>";

	for ($i=1; $i <= $cantidadPaginas; $i++) { 
		array_push($arrDatos, $i);
	}
	echo json_encode($arrDatos);
}

mysql_close($conn);

?>