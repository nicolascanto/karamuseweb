<?php

	//iniciar SESSION
	session_start();
	
	header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...	

	$emailBar = $_SESSION['emailUser'];		

			$sql = "select fechaFin, fechaIni, codSes from sesiones where emailBar='".$emailBar."' and fechaFin='Pendiente'";
			$resultado= mysql_query($sql) or die('Error. '.mysql_error());
			$fila = mysql_fetch_array($resultado);
			
			if(!empty($_POST['btnContinuar'])){				
				//continuar en la misma sesion....
				$_SESSION['codSes'] = $fila['codSes'];
				$_SESSION['fechaIniSes'] = $fila['fechaIni'];
				header("Location:admin.php");
			}
			if(!empty($_POST['btnCerrarContinuar'])){				
				//cerrar sesion....
				$sql = "update sesiones set fechaFin=now() where emailBar='".$emailBar."' and codSes=".$fila['codSes'];
				mysql_query($sql) or die ('Error.'.mysql_error());
				//crear nueva sesion...
			 	$sql = "insert into sesiones (emailBar, fechaIni,fechaFin) values ('".$emailBar."',now(),'Pendiente')";
			 	mysql_query($sql) or die ('Error.'.mysql_error());

			 	//asignar codSes a la variable de sesion... 
			 	$sql = "select max(codSes), fechaIni from sesiones where emailBar='".$emailBar."' and fechaFin='Pendiente'";
			 	$resultado= mysql_query($sql) or die('Error. '.mysql_error());
				$fila2 = mysql_fetch_array($resultado);

				$_SESSION['codSes'] = $fila2['max(codSes)'];
				$_SESSION['fechaIniSes'] = $fila2['fechaIni'];
				header("Location:admin.php");
			
			}
			//si esta vacia entonces significa que se salto el login
			if(empty($_SESSION['emailUser'])){

				//redireccionamos al index para iniciar sesion
				header('Location:index.php');
			}
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Karamuse Admin</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/index.css">
	<script src="js/index.js"></script>
	<script type="text/javascript">

    </script> 
	<style>
		footer {
		    position: fixed;
		    height: 20px;
		    bottom: 0;
		    width: 100%;
		}
	</style>

</head>
<body style="background-image:url('img/fondo.jpg')">
	<header style="background:#212121;color:#FFFFFF">
		<div class="container">
			<div><img style="width:25%;height;25%" src="img/proyecto_karamuse_logo.jpg" alt=""></div>	
			<small>Iniciar sesión</small>
		</div>
	</header>

	<div class="container">
		<section class="main row">

			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
				<br>
				<h1 class="txt-blanco">Existe una sesión abierta del: <span class="txt-celeste-claro"><?php echo $fila['fechaIni']; ?></span></h1>
				<form action="index_confirm_sesion.php" method="POST">				
				<button type="submit" name="btnContinuar" value="1" class="btn btn-info">Continuar</button>
				<button type="submit" name="btnCerrarContinuar" value="2" class="btn btn-warning">Cerrar sesión y continuar</button>
				</form>
			</article>			

		</section>
	<br>
	</div>

	<script src="js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	
</body>

<footer style="background:#404040;color:#808080">
	<div class="container">
		<small>Desarrollado por Karamuse - 2015, Contacto: karamuseapp@gmail.com</small>
	</div>
</footer>

</html>