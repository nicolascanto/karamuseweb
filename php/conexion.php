<?php
	
	$conn = mysql_connect('localhost','root','');
	   $db   = mysql_select_db('karamuseBD');

	   // $conn = mysql_connect('mysql13.000webhost.com','a4117507_nico','plazia8569');
	   // $db   = mysql_select_db('a4117507_tesis');

	  // $conn = mysql_connect('mysql.hostinger.es','u932306392_nico','plazia8569');
	  // $db   = mysql_select_db('u932306392_tesis');

	if( $conn ) {
     //echo "Conexion establecida.<br />";
	}else{
	     echo "ugh! no podemos conectarnos =/.<br />";
	     die( print_r( sqlsrv_errors(), true));
	}
?>