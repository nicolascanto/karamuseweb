<?php
	header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

	$emailBar = $_POST['emailBar'];
	$codSes = $_POST['sesion'];

	$sql = "select tocados.codk, pedidos.numTick, pedidos.numMesa, pedidos.Estacion, tocados.Interprete, tocados.Cancion, tocados.fecha, 
	(select count(tocados.codK) from tocados join pedidos on pedidos.codK=tocados.codK where tocados.emailBar='$emailBar' and pedidos.codSes=$codSes)
	from tocados join pedidos on pedidos.codK=tocados.codK 
	where tocados.emailBar='$emailBar' 
	and pedidos.codSes=$codSes order by pedidos.numTick asc";

	$resultado = mysql_query($sql) or die('Error. '.mysql_error());
	
	mysql_close($conn);

	$arrDatos = array();

	while($rs=mysql_fetch_array($resultado)){

		$arrDatos[] = array_map(null,$rs);
	
	}

	echo json_encode($arrDatos);

?>