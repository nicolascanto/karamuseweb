<?php
	header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

	$emailBar = $_POST['emailBar'];
	$codSes = $_POST['sesion'];
	$codK = $_POST['codK'];
	
	$sql = "select aTocar.codk, pedidos.numTick, pedidos.numMesa, pedidos.Estacion, aTocar.Interprete, aTocar.Cancion, aTocar.fecha, 
	(select count(aTocar.codK) from aTocar join pedidos on pedidos.codK=aTocar.codK where atocar.emailBar='$emailBar' and pedidos.codSes=$codSes)
	from aTocar join pedidos on pedidos.codK=aTocar.codK 
	where atocar.emailBar='$emailBar' 
	and pedidos.codSes=$codSes and pedidos.codK=$codK order by pedidos.numTick asc";

	$resultado = mysql_query($sql) or die('Error. '.mysql_error());
	
	mysql_close($conn);

	$arrDatos = array();

	while($rs=mysql_fetch_array($resultado)){

		$arrDatos[] = array_map(null,$rs);
	
	}

	echo json_encode($arrDatos);

?>