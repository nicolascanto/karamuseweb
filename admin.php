<?php

	//iniciar SESSION
	session_start();

	if(!empty($_POST['cerrarSesion'])){
		echo $_SESSION['emailUser'];

		//cerramos y destruimos la sesion
		$_SESSION['emailUser'] = '';
		session_destroy();
	}

	//si esta vacia entonces significa que se salto el login
	if(empty($_SESSION['emailUser'])){

		//redireccionamos al index para iniciar sesion
		header('Location:index.php');
	}	
	
	$e = $_SESSION['emailUser']; 
	$s = $_SESSION['codSes'];
	// echo "<script>console.log('esto es email:'".$e.")</script>";
	echo '<script languaje="JavaScript"> var e="'.$e.'";var s="'.$s.'"</script>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/index.css">
	<script type="text/javascript" src="js/admin.js"></script>
	<script src="js/jquery.js"></script>
	<script type="text/javascript">	

			cantidadPedidos(e,s);

	</script>

	<style>
		body{
			padding-top:80px;
		}
		footer {
		    position: fixed;
		    height: 20px;
		    bottom: 0;
		    width: 100%;
		}
	</style>

	<title>Karamuse Administrador</title>
</head>
<body>
	<div class="container ">
		<header>		
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
								<span class="sr-only">Menu</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="#" class="navbar-brand">
								<img src="img/proyecto_karamuse_logo_white.png" alt="" style="height:100%">
							</a>
						</div>
						<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav">

								<li role="presentation">
									<a href="pedidos.php" id="ir_pedidos"><span class="txt-celeste-claro"><span class="glyphicon glyphicon-home"></span> Pedidos<span id="cantidadPedidos" class="badge"> 0</span></span></a>
								</li>
								<li role="presentation">
									<a href="admin_catalog" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<span class="glyphicon glyphicon-pencil"></span> Administrar catálogo
									</a>
																	
								</li>
							</ul>
							<form action="" class="navbar-form navbar-left" role="search">
								<div class="from-group">
									<input type="text" class="form-control bg-gris txt-blanco" placeholder="Buscar">
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">

								<li class="">
									<a href="">
										<span class="txt-celeste-claro"><span class="glyphicon glyphicon-refresh"></span> Refrescar</span>
									</a>
								</li>

								<li><a href=""><span class="txt-celeste-claro"><span class="glyphicon glyphicon-user"></span> 
									<span id="nombreSesion"><?php echo $_SESSION['nombreUser'];?></span></span></a></li>
								<li>
									<form action="admin.php" method="POST">
										<button style="margin-top:8px" class="btn btn-warning" href="" id="cerrarSesion" name="cerrarSesion" value="1"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</button>
									</form>
									
								</li>
							</ul>
						</div>
					</div>
				</nav>

		</header>
		<div class="page-header">
			<div class="container">
				<h1 class="txt-gris">Hola, <?php echo $_SESSION['nombreUser'];?> <small class="txt-gris-claro">Administra tus pedidos fácilmente desde el menú superior.</small></h1>
				<span class="txt-gris-claro">Código de sesión: <span class="txt-gris"><?php echo $_SESSION['codSes'];?></span>, iniciada el: <span class="txt-gris"><?php echo $_SESSION['fechaIniSes'];?></span></span>
			</div>
		  
		</div>

		<div class="container" id="ver_pedidos"></div>
		
	</div>
	
	
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	
</body>

<footer style="background:#404040;color:#808080">
	<div class="container">
		<small>Desarrollado por Karamuse - 2015, Contacto: karamuseapp@gmail.com</small>
	</div>
</footer>
</html>