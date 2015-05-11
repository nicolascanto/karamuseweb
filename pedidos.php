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
	<script src="js/jquery.js"></script>
	<script src="js/pedidos.js"></script>
	<script src="js/admin.js"></script>		
	<script type="text/javascript"> 
		var e="<?php echo $e;?>";
		var s="<?php echo $s;?>";
		cargarATocar(e,s);
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
	<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Agregar pedido</h4>
				</div>
				<div class="modal-body">
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="Artista o canción">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button">Ir</button>
				      </span>
				    </div><!-- /input-group -->
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium illo voluptas quod rem fugit nulla veniam labore fugiat? Ad aut architecto consequatur fugit sed voluptatum eveniet voluptatem officia facere, ab!
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
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
									<a href="pedidos.php" id="ir_pedidos"><span class="txt-celeste-claro"><span class="glyphicon glyphicon-home"></span> Pedidos<span id="cantidadPedidos" class="badge"> 0</span></span></a>
								</li>
								<li role="presentation">
									<a href="admin_catalog" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<span class="txt-celeste-claro"><span class="glyphicon glyphicon-pencil"></span> Administrar catálogo</span>
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
	<div class="container">
		<div class="row">
      	<div class="panel panel-info">
	        <div class="panel-heading">	                    
		          <div class="btn-group pull-right" role="group" aria-label="...">		          	
					  
					  <button data-toggle="modal" data-target="#agregar" type="button" class="btn btn-default glyphicon glyphicon-plus"></button>
					  <a href="#" type="button" class="btn btn-default glyphicon glyphicon-refresh"></a>
				  </div>
				  <h4>Espera <span class="badge">42</span></h4>	
	        </div> 
		<table class="table table-hover table-fixed">
			<thead>
		        <tr>
		            <th class="col-xs-2">Ticket</th>
		            <th class="col-xs-3">Artista</th>
		            <th class="col-xs-3">Canción</th>
		            <th class="col-xs-2">Fecha/ Hora</th>
		            <th class="col-xs-2">Acción</th>
		        </tr>
		    </thead>
		    <tbody id="contenidoATocar">
		    	<!-- aqui va el contenido 	        		        			         -->
		    </tbody>		  
		</table>
	</div>		
</div>
<div class="row">
      	<div class="panel panel-success">
	        <div class="panel-heading">
	          <h4>
	            Listos <span class="badge">33</span>
	          </h4>
	        </div> 
		<table class="table table-hover table-fixed">
			<thead>
		        <tr>
		            <th class="col-xs-2">Ticket</th>
		            <th class="col-xs-3">Artista</th>
		            <th class="col-xs-3">Canción</th>
		            <th class="col-xs-2">Fecha/Hora</th>
		            <th class="col-xs-2">Acción</th>

		        </tr>
		    </thead>
		    <tbody>
		    	<tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>	
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>	
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>	
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>	
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>	
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>
		        <tr>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-3">axax</td>
			        <td class="col-xs-2">axax</td>
			        <td class="col-xs-2">axax</td>
		        </tr>		        			        
		    </tbody>		  
		</table>
	</div>		
</div>
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