<?php

	//iniciar SESSION
	session_start();

	if(!empty($_POST['btnIniciarSesion'])){				
		header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...	

	$sql = "select emailBar, pass, estado, nombre from locales where emailBar='".$_POST['emailBar']."' and pass='".$_POST['pass']."'";
	$resultado= mysql_query($sql) or die('Error. '.mysql_error());
	$num = mysql_num_rows($resultado);	
	
	if($num>0){		

		$fila1 = mysql_fetch_array($resultado);
		if($fila1['estado']==1){

			//pasar la variable emailbar a una variable de sesion.
			$_SESSION['emailUser']=$fila1['emailBar'];
			$_SESSION['nombreUser']=$fila1['nombre'];

			//hacer las consultas de sesion...
			$sql = "select fechaFin, fechaIni from sesiones where emailBar='".$_SESSION['emailUser']."' and fechaFin='Pendiente'";
			$resultado= mysql_query($sql) or die('Error. '.mysql_error());
			$fila2 = mysql_fetch_array($resultado);

			if($fila2['fechaFin']=="Pendiente"){

				header("Location:index_confirm_sesion.php");

			}else{	

				//crear nueva sesion...
			 	$sql = "insert into sesiones (emailBar, fechaIni,fechaFin) values ('".$_SESSION['emailUser']."',now(),'Pendiente')";
			 	mysql_query($sql) or die ('Error.'.mysql_error());

			 	//asignar codSes a la variable de sesion... 
			 	$sql = "select max(codSes), fechaIni from sesiones where emailBar='".$_SESSION['emailUser']."' and fechaFin='Pendiente'";
			 	$resultado= mysql_query($sql) or die('Error. '.mysql_error());
				$fila3 = mysql_fetch_array($resultado);

				$_SESSION['codSes'] = $fila3['max(codSes)'];
				$_SESSION['fechaIniSes'] = $fila3['fechaIni'];
				header("Location:admin.php");		

			}			

		}else{
			echo "cuenta desactivada...";
		}
		
	}

	//mysql_close($conn);

		

		//echo json_encode($datos);
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

            window.onLoad = function(){
                index();

            }
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
	<header style="background:#121212;color:#FFFFFF">
		<div class="container">
			<div><img style="width:25%;height;25%" src="img/proyecto_karamuse_logo_white.png" alt=""></div>	
			<small>Iniciar sesión</small>
		</div>
	</header>

	<div class="container">
		<section class="main row">

			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
				<br>
				<form class="form-inline" action="index.php" method="POST">
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputEmail3">Email address</label>
				    <input type="email" class="form-control" id="emailBar" name="emailBar" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label class="sr-only" for="exampleInputPassword3">Password</label>
				    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
				  </div>
				  <div class="checkbox">
				    <label>
				      <input type="checkbox"><span class="txt-blanco"> Recuérdame</span>
				    </label>
				  </div>
				  <button type="submit" class="btn btn-primary btn-info" id="btnIniciarSesion" name="btnIniciarSesion" onClick="sesionPendiente()" value="1">Iniciar sesión</button>
				</form>
			</article>

			<!-- <aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam mollitia iure, reiciendis eius fuga hic. Quisquam modi quam quos sit ipsum cupiditate non similique voluptatem, voluptatum nostrum aperiam. Obcaecati, laudantium.
				</p>
			</aside> -->

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