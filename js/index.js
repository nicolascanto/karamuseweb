$(document).ready(function (){

	// $('#btnIniciarSesion').click(function(e){
	// 	console.log("entramos!")
	// 	e.preventDefault();

	// 	var emailBar = $('#emailBar').val();
	// 	var pass = $('#pass').val();
		

	// 	if (emailBar == "" || pass == "")
			
	// 		alert("Ingresa usuario y contraseña.");

	// 	else
	// 	{				

	// 		try{

	// 			$.ajax({
	// 				dataType: 'json',
	// 				type: 'POST',
	// 				url: 'php/iniciarSesion.php',
	// 				//data: data,
	// 				data: ({emailBar:emailBar,pass:pass}),
	// 				beforeSend: function(){
	// 				 console.log("Espere...");
	// 		      },
	// 		      	success:function(datos){   
	// 		      	     //console.log(datos[0]+","+datos[1]+","+datos[2]);		      			      			     
	// 		      		if (datos[0]==emailBar && datos[1]==pass){
	// 		      			console.log("listo...");
	// 		      			if (datos[2]==1) {
	// 		      				$('#btnIniciarSesion').load();
	// 		      			}
	// 		      			else{
	// 		      				alert("Esta cuenta se encuentra desactivada, póngase en contacto con Karamuse.")
	// 		      			}			      			

	// 		      		}
	// 		      		else
	// 		      			alert("Email o contraseña son incorrectos.")
	// 		      	},
	// 		      	error:function(){
	// 		      		alert("ha ocurrido un error al iniciar sesión.");			      		
	// 		      	}
			      	

	// 			})

	// 		}
	// 		catch(ex){
	// 			alert("error");				
	// 		}

	// 	}

	// });
});