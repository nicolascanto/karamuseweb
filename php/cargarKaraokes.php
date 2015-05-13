<?php
session_start();

header('Access-Control-Allow-Origin: *');
include_once ('conexion.php');
mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

$emailBar = $_SESSION['emailUser'];
$registrosPorPagina = 500;
$paginaSeleccionada = $_POST['paginaSeleccionadaPHP'];

// $paginaSeleccionada = 3;

// if (isset($paginaSeleccionada)) {
	// $paginaSeleccionada = $_POST['paginaSeleccionadaPHP'];
	$inicio = ($paginaSeleccionada - 1) * $registrosPorPagina;
	$fin = $paginaSeleccionada * $registrosPorPagina;
// }
// else{
// 	$inicio = 0;
// 	$fin = 500;
// }
	
$sql = "SELECT codK, nombreA, nombreC FROM `karaokesbar` WHERE emailBar='$emailBar' 
ORDER BY nombreA ASC
LIMIT $inicio, 500";

$arrDatos = array();

$resultado = mysql_query($sql);

if(!$resultado){
	echo "SE HA DETECTADO EL SIGUIENTE ERROR EN LA BD AL CONSULTAR LOS KARAOKES: \n" . mysql_error();
}else{
	while ($rs = mysql_fetch_array($resultado)) {
		$arrDatos[] = array_map('utf8_encode', $rs);
	}
	echo json_encode($arrDatos);
}

mysql_close($conn);

?>