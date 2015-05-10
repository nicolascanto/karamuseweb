$(document).ready(function(){

 	admin(email);
 })

function admin(email){
	var email = email;
	console.log("email: "+email);
	$('#ir_pedidos').click(function(e){



		// $.ajax({
  //                   dataType: 'json',
  //                   type: 'POST',
  //                   url: 'http://www.plazia.netai.net/tesisapp/php/cargarMiPerfil.php',
  //                   //data: data,
  //                   data: ({idu:idu}),
  //                   beforeSend: function(){
                    
  //                   $('#msjLoad').html("Cargando perfil...");
  //                   $('.fa').css('display','inline');                   
                    
  //                 },
  //                   success:function(datos){
  //                       $('#msjLoad').html("");             
  //                       $('.fa').css('display','none');
  //                       $("#miPerfil").css('display', 'inline');
                        

                        
  //                       if(datos[5] == "sinfoto.jpg")
  //                           document.getElementById('imgFotoPerfil').src = "img/personas/sinfoto.jpg"
  //                           else{
  //                               document.getElementById('imgFotoPerfil').src = "perfiles/"+datos[6]+"/foto_perfil/"+datos[5]
  //                           }   
  //                   },   
  //                   error:function(){
  //                       alert("ha ocurrido un error cargando el perfil =/");
  //                       // $('.fa').css('display','none');
  //                   }
                    

  //               })
		
	});
	
});





