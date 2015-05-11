function cargarATocar(emailBar,sesion){
	console.log(emailBar+sesion);
$.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/cargarATocar.php',
                    //data: data,
                    data: ({emailBar:emailBar,sesion:sesion}),
                    beforeSend: function(){
                    
                    
                  },
                    success:function(datos){
                        
                        for(var i in datos){                                                             
                             
                            $('#contenidoATocar').append("<tr>"+
									        "<td class='col-xs-2'>"+datos[i][1]+"</td>"+
									        "<td class='col-xs-3'>"+datos[i][4]+"</td>"+
									        "<td class='col-xs-3'>"+datos[i][5]+"</td>"+
									        "<td class='col-xs-2'>"+datos[i][6]+"</td>"+
									        "<td class='col-xs-2'><div class='btn-group' role='group' aria-label='...'>	"	+			  
											  "<button type='button' class='btn btn-success btn-sm glyphicon glyphicon-arrow-down'></button>"+
											  "<button type='button' class='btn btn-info btn-sm glyphicon glyphicon-info-sign'></button>"+
											  "<button type='button' class='btn btn-default btn-sm glyphicon glyphicon-trash'></button>"+
											"</div></td>"+
								        "</tr>");
   
                         }             
                    },   
                    error:function(error){
                        alert("ha ocurrido un error cargando lista espera");                        
                    }
                    

                })
}
function cantidadPedidos(emailBar,sesion){
  
  $.ajax({    
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/cantidadPedidos.php',
                    //data: data,
                    data: ({emailBar:emailBar,sesion:sesion}),
                    beforeSend: function(){
                      console.log("cargando cantidadPedidos...");
                    
                    },
                    success:function(datos){
                      $('#cantidadPedidos').html(datos[0]);
                    },   
                    error:function(){
                        alert("Error al cargar número de pedidos.");
                        // $('.fa').css('display','none');
                    }
                    

                })
}