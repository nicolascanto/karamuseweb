<?php
	
	header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

	 $emailBar = $_POST['emailBar'];
	 $pass = $_POST['pass'];
	 // $emailBar='strike_karaoke@hotmail.com';
	 // $pass='123';

	$sql = "select emailBar, pass, estado from locales where emailBar='$emailBar' and pass='$pass'";
	$resultado= mysql_query($sql) or die('Error. '.mysql_error());

	mysql_close($conn);


		$datos = mysql_fetch_array($resultado);

		echo json_encode($datos);


?>