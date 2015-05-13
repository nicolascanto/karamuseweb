$(document).ready(function(){

    // cargarPaginasEnContenedor("#btnAdminCatalogo", "admin_catalogo.html"); //ya no va porque se hace a traves de un onClick
    $('#modalCarga').modal('hide');
});

function cargarPaginasEnContenedor(urlCargar){
    
    $('#headerSaludo').hide();
        $.ajax({
            url: urlCargar,
            success: function(data){
                $('#contenedor').html(data);
            }
        });
};

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






