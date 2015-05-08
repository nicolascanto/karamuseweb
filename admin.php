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
	<div class="container">
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

								<li role="presentation" class="active">
									<a href="pedidos.html" id="ir_pedidos"><span class="glyphicon glyphicon-home"></span> Pedidos<span class="badge"> 0</span></a>
								</li>

								<li><a href="agregar_pedido.html"><span class="glyphicon glyphicon-plus"></span> Agregar pedido</a>
								</li>

								<li class="dropdown">
									<a href="admin_catalog" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<span class="glyphicon glyphicon-pencil"></span> Admin. catálogo <span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu">							            
							            <li><a href="agregar_karaoke_catalogo.html">Agregar</a></li>
							            <li><a href="actualizar_karaoke_catalogo.html">Actualizar</a></li>
							            <li class="divider"></li>
							            <li><a href="eliminar_karaoke_catalogo.html">Eliminar</a></li>							            
							        </ul>								
								</li>
							</ul>
							<form action="" class="navbar-form navbar-left" role="search">
								<div class="from-group">
									<input type="text" class="form-control" placeholder="Buscar">
								</div>
							</form>
							<ul class="nav navbar-nav navbar-right">

								<li class="active">
									<a href="">
										<span class="celeste-claro"><span class="glyphicon glyphicon-refresh"></span> Refrescar</span>
									</a>
								</li>

								<li><a href=""><span class="celeste-claro"><span class="glyphicon glyphicon-user"></span> 
									<span id="nombreSesion">Mi Nombre</span></span></a></li>
								<li>
									<form action="admin.php" method="POST">
										<button style="margin-top:8px" class="btn btn-danger" href="" id="cerrarSesion" name="cerrarSesion" value="1"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</button>
									</form>
									
								</li>
							</ul>
						</div>
					</div>
				</nav>

		</header>
		<div class="page-header celeste">
			<div class="container">
				<h1>Hola, Nicolás! <small>Administra tus pedidos fácilmente desde el menú superior.</small></h1>
				<span>Sesión iniciada el: 9 de junio de 1985 a las 9:21 pm</span>
			</div>
		  
		</div>

		<div class="container" id="ver_pedidos"></div>
		
	</div>
	
	
	<script src="js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="js/admin.js"></script>
</body>

<footer style="background:#404040;color:#808080">
	<div class="container">
		<small>Desarrollado por Karamuse - 2015, Contacto: karamuseapp@gmail.com</small>
	</div>
</footer>
</html>