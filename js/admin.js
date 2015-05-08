$(document).ready(function(){

function cargarDatosSesion();

	$('#ir_pedidos').click(function(e){

		// $('#ver_pedidos').load('../index.html', function(data){
		// 	$this.html(data);
		// });
	});

function cargarDatosSesion(){

	var emailBar = //wdwdw

	try{

				$.ajax({
					dataType: 'html',
					type: 'POST',
					url: 'php/....',
					//data: data,
					data: ({emailBar:emailBar}),
					beforeSend: function(){
						        
			        console.log("Cargando datos sesion");
			      },
			      	success:function(dato){
			      		console.log("datos cargados...")
			      		//cargamos todos los datos de la sesion
			      		$('#nombresesion').html(dato);
			      	},
			      	error:function(){
			      		alert("ha ocurrido un error");
			      		
			      	}
			      	

				})

			}
			catch(ex){
				alert("error");
							}

	
};
	
});





