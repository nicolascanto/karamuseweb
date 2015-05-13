<?php
	header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

	$emailBar = $_POST['emailBar'];
	$codK = $_POST['codK'];
	// $emailBar = "strike_karaoke@hotmail.com";
	// $codK = 83;

	$sql1 = "select fecha from tocados where codK=" .$codK. " and emailBar='" .$emailBar. "'";
	$resultado1 = mysql_query($sql1) or die('Error. '.mysql_error());

	$fecha = mysql_fetch_array($resultado1);

	
	$sql2 = "delete from tocados where codK=" .$codK. " and emailBar='" .$emailBar. "'";
	$resultado2 = mysql_query($sql2) or die('Error. '.mysql_error());

	
    $sql3 = "insert into ATocar select emailBar, codk, nombreA, nombreC, '" .$fecha[0]. "' from karaokesBar where codk=" .$codK;
	$resultado3 = mysql_query($sql3) or die('Error. '.mysql_error());
	
	mysql_close($conn);	

	echo json_encode("Error. ".mysql_error());
?>