<?php
	header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

	 $emailBar = $_POST['emailBar'];
	 $sesion = $_POST['sesion'];
	 // $emailBar = "strike_karaoke@hotmail.com";
	 // $sesion = 1;
	$sql = "select count(codk) from pedidos where emailBar='$emailBar' and codSes=$sesion";
	$resultado= mysql_query($sql) or die('Error. '.mysql_error());

	mysql_close($conn);

		$datos = mysql_fetch_array($resultado);

		echo json_encode($datos);

?>