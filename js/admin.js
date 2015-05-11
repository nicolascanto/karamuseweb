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





