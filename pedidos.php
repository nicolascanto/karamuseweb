<?php
	//iniciar SESSION
	session_start();
$e = $_SESSION['emailUser']; 
$s = $_SESSION['codSes'];
?>
<!DOCTYPE html>
<script type="text/javascript"> 
		var e="<?php echo $e;?>";
		var s="<?php echo $s;?>";		
		cargarATocar(e,s);
		cargarTocados(e,s);
		cantidadPedidos(e,s);
		

		$('#btnAtocar').click(function(){
			$('#contenidoATocar').html("");
			$('#contenidoTocados').html("");
			cargarATocar(e,s);
			cargarTocados(e,s);
			cantidadPedidos(e,s);
			calculaTiempoEspera();			
		})
</script>
<html lang="en">
<script src="js/pedidos.js"></script>
<body>
	<!-- modal para agregar un pedido -->
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
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-info">Ok!</button>
				</div>
			</div>
		</div>
	</div>
	<!-- modal para ver la info de un pedido -->
	<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-celeste-info txt-blanco">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4>Información pedido</h4>					
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<tbody id="contenidoInfoPedido">
							<tr><td class="col-xs-3">Codigo</td><td class="col-xs-9">info</td></tr>
							<tr><td class="col-xs-3">Ticket</td><td class="col-xs-9">info</td></tr>
							<tr><td class="col-xs-3">Mesa</td><td class="col-xs-9">info</td></tr>
							<tr><td class="col-xs-3">Estación</td><td class="col-xs-9">info</td></tr>
							<tr><td class="col-xs-3">Artista</td><td class="col-xs-9">info</td></tr>
							<tr><td class="col-xs-3">Canción</td><td class="col-xs-9">info</td></tr>
							<tr><td class="col-xs-3">Fecha/Hora</td class="col-xs-9"><td>info</td></tr>							
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-info">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- modal para ver tiempo de espera -->
	<div class="modal fade" id="tiempoEspera" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-celeste-info txt-blanco">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<div><h3>Tiempo de espera aproximado: <span id="tiempoInfoMostrar"></span></h3></div>					
				</div>
				<div class="modal-body">
					<!-- algo por aqui -->
				</div>
				<div class="modal-footer">					
					<button type="button" data-dismiss="modal" class="btn btn-info">Ok!</button>
				</div>
			</div>
		</div>
	</div>
	
<div class="container">
<div class="row">
    <div class="panel panel-info">
	        <div class="panel-heading">	                    
		          <div class="btn-group pull-right" role="group" aria-label="...">		          	
					  
					  <button data-toggle="modal" data-target="#agregar" type="button" class="btn btn-info glyphicon glyphicon-plus"></button>
					  <button onClick="calculaTiempoEspera()" id="btnAtocar" type="button" class="btn btn-info glyphicon glyphicon-refresh"></button>
					  <button id="btnBloquear" type="button" class="btn btn-info glyphicon glyphicon-ban-circle"></button>
				  </div>
				  <!-- <h4>Espera<span id="cantidadATocar" class="badge">0</span></h4> -->
				  <button onClick="calculaTiempoEspera()" data-toggle="modal" data-target="#tiempoEspera" type="button" class="btn btn-info btn-lg" aria-label="Left Align">
					  <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Espera <span id="cantidadATocar" class="badge">0</span>
				  </button> 	
	        </div> 
		<table id="tbATocar" class="table table-hover table-fixed">
			<thead>
		        <tr>
		            <th class="col-xs-2 info">Ticket</th>
		            <th class="col-xs-3 info">Artista</th>
		            <th class="col-xs-3 info">Canción</th>
		            <th class="col-xs-2 info">Fecha/ Hora</th>
		            <th class="col-xs-2 info">Acción</th>
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
	            <!-- Listos <span id="cantidadTocados" class="badge">33</span></h4> -->
	            <button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
					  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Listo <span id="cantidadTocados" class="badge">0</span>
				</button>
	        </div> 
		<table class="table table-hover table-fixed">
			<thead>
		        <tr>
		            <th class="col-xs-2 success">Ticket</th>
		            <th class="col-xs-3 success">Artista</th>
		            <th class="col-xs-3 success">Canción</th>
		            <th class="col-xs-2 success">Fecha/ Hora</th>
		            <th class="col-xs-2 success">Acción</th>

		        </tr>
		    </thead>
		    <tbody id="contenidoTocados">
		    	<!-- aqui va el contenido		        			         -->
		    </tbody>		  
		</table>
	</div>		
</div>
</div>

</html>