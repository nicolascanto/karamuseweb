<?php

	//iniciar SESSION
	session_start();

	if(!empty($_POST['btnIniciarSesion'])){		
		header('Access-Control-Allow-Origin: *');
	include_once ('conexion.php');
	mysql_set_charset('utf8'); //para que detecte caracteres como tildes, etc...

	$sql = "select emailBar, pass, estado from locales where emailBar='".$_POST['emailBar']."' and pass='".$_POST['pass']."'";
	$resultado= mysql_query($sql) or die('Error. '.mysql_error());
	$num = mysql_num_rows($resultado);	

	if($num>0){

		$fila = mysql_fetch_array($resultado);
		if($fila['estado']==1){

			//crear sesion en la tabla sesiones....

			//pasar la variable emailbar a una variable de sesion.
			$_SESSION['emailUser']=$fila['emailBar'];
			header("Location:admin.php");	

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
	<style>
		footer {
		    position: fixed;
		    height: 20px;
		    bottom: 0;
		    width: 100%;
		}
	</style>

</head>
<body>
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
				      <input type="checkbox"> Recuérdame
				    </label>
				  </div>
				  <button type="submit" class="btn btn-primary" id="btnIniciarSesion" name="btnIniciarSesion" value="1">Iniciar sesión</button>
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
	<script src="js/index.js"></script>
</body>

<footer style="background:#404040;color:#808080">
	<div class="container">
		<small>Desarrollado por Karamuse - 2015, Contacto: karamuseapp@gmail.com</small>
	</div>
</footer>

</html>