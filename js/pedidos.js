function cargarATocar(emailBar,sesion){
	
$.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/cargarATocar.php',
                    //data: data,
                    data: ({emailBar:emailBar,sesion:sesion}),
                    beforeSend: function(){
                        $("#cuerpoTablaKaraokes").html("");
                        $('#modalCarga').modal('show')
                    
                  },
                    success:function(datos){
                        $("#cuerpoTablaKaraokes").html("");
                        $('#modalCarga').modal('hide')
                        if (datos!=""){
                            $('#cantidadATocar').html(datos[0][7]);
                        }  

                        
                        for(var i in datos){ 
                            
                            //cortar el texto para que no salte de linea y no desconfigure la tabla... 
                            var texto = datos[i][5];
                            texto = texto.substring(0,30)
                            datos[i][5] = texto;
                            
                            if((texto.length)==30){
                                datos[i][5] = texto + "...";
                            }

                            $('#contenidoATocar').append("<tr>"+
									        "<td class='col-xs-2'><b>"+datos[i][1]+"</b></td>"+
									        "<td class='col-xs-3'>"+datos[i][4]+"</td>"+
									        "<td class='col-xs-3'>"+datos[i][5]+"</td>"+
									        "<td class='col-xs-2'>"+datos[i][6]+"</td>"+
									        "<td class='col-xs-2'><div class='btn-group' role='group' aria-label='...'>	"	+			  
											  "<button onClick=insertarTocados('"+emailBar+"','"+datos[i][0]+"','"+sesion+"') type='button' class='btn btn-success btn-sm glyphicon glyphicon-arrow-down'></button>"+
											  "<button onClick=infoPedido('"+emailBar+"','"+datos[i][0]+"','"+sesion+"','"+i+"') type='button' class='btn btn-info btn-sm glyphicon glyphicon-info-sign' data-toggle='modal' data-target='#info'></button>"+
											  "<button type='button' class='btn btn-default btn-sm glyphicon glyphicon-trash'></button>"+
											"</div></td>"+
								        "</tr>");
                               
                         }
                         calculaTiempoEspera();                                      
                    },   
                    error:function(error){
                        alert("ha ocurrido un error cargando lista espera");                        
                    }                    

                })
}
function cargarTocados(emailBar,sesion){
    
$.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/cargarTocados.php',
                    //data: data,
                    data: ({emailBar:emailBar,sesion:sesion}),
                    beforeSend: function(){
                    
                    
                  },
                    success:function(datos){    
                        $("#cuerpoTablaKaraokes").html("");
                        $('#modalCarga').modal('hide')                    
                        if (datos!=""){
                            $('#cantidadTocados').html(datos[0][7]);
                        }                        
                        
                        for(var i in datos){   

                            //cortar el texto para que no salte de linea y no desconfigure la tabla... 
                            var texto = datos[i][5];
                            texto = texto.substring(0,30)
                            datos[i][5] = texto;
                            
                            if((texto.length)==30){
                                datos[i][5] = texto + "...";
                            }                                                          
                             
                            $('#contenidoTocados').append("<tr>"+
                                            "<td class='col-xs-2'><b>"+datos[i][1]+"</b></td>"+
                                            "<td class='col-xs-3'>"+datos[i][4]+"</td>"+
                                            "<td class='col-xs-3'>"+datos[i][5]+"</td>"+
                                            "<td class='col-xs-2'>"+datos[i][6]+"</td>"+
                                            "<td class='col-xs-2'><div class='btn-group' role='group' aria-label='...'> "   +             
                                              "<button onClick=insertarATocar('"+emailBar+"','"+datos[i][0]+"','"+sesion+"') type='button' class='btn btn-success btn-sm glyphicon glyphicon-arrow-up'></button>"+
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
function insertarTocados(emailBar,codK,sesion){


    $.ajax({    
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/insertarTocados.php',
                    //data: data,
                    data: ({emailBar:emailBar,codK:codK}),
                    beforeSend: function(){
                      
                    
                    },
                    success:function(datos){
                      $('#contenidoATocar').html("");
                      $('#contenidoTocados').html("");  
                      cargarTocados(emailBar,sesion);
                      cargarATocar(emailBar,sesion);
                    },   
                    error:function(){
                        alert("Error pasando el karaoke a listo.");
                        // $('.fa').css('display','none');
                    }
                    

                })
}
function insertarATocar(emailBar,codK,sesion){


    $.ajax({    
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/insertarATocar.php',
                    //data: data,
                    data: ({emailBar:emailBar,codK:codK}),
                    beforeSend: function(){
                      
                    
                    },
                    success:function(datos){
                      $('#contenidoATocar').html("");
                      $('#contenidoTocados').html("");  
                      cargarTocados(emailBar,sesion);
                      cargarATocar(emailBar,sesion);
                    },   
                    error:function(){
                        alert("Error pasando el karaoke a espera.");
                        // $('.fa').css('display','none');
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
function infoPedido(emailBar,codK,sesion,posicion){


    $.ajax({    
                    dataType: 'json',
                    type: 'POST',
                    url: 'php/infoPedido.php',
                    //data: data,
                    data: ({emailBar:emailBar,codK:codK,sesion:sesion}),
                    beforeSend: function(){
                      $("#cuerpoTablaKaraokes").html("");
                      $('#modalCarga').modal('show')
                    
                    },
                    success:function(datos){
                      $("#cuerpoTablaKaraokes").html("");
                      $('#modalCarga').modal('hide');

                      $('#contenidoInfoPedido').html("");

                      var tiempoEspera="";
                      posicion++;
                      tiempoEspera = posicion*4;
                      tiempoEspera = tiempoEspera + " min";
                      
                      for(var i in datos){                           
                            $('#contenidoInfoPedido').append("<tr><td class='col-xs-3'>Codigo</td><td class='col-xs-9'>"+datos[i][0]+"</td></tr>"+
                                                        "<tr><td class='col-xs-3'>Ticket</td><td class='col-xs-9 txt-celeste-info'><b>"+datos[i][1]+"</b></td></tr>"+
                                                        "<tr><td class='col-xs-3'>Mesa</td><td class='col-xs-9'>"+datos[i][2]+"</td></tr>"+
                                                        "<tr><td class='col-xs-3'>Estación</td><td class='col-xs-9'>"+datos[i][3]+"</td></tr>"+
                                                        "<tr><td class='col-xs-3'>Artista</td><td class='col-xs-9 txt-celeste-info'><b>"+datos[i][4]+"</b></td></tr>"+
                                                        "<tr><td class='col-xs-3'>Canción</td><td class='col-xs-9 txt-celeste-info'><b>"+datos[i][5]+"</b></td></tr>"+
                                                        "<tr><td class='col-xs-3'>Fecha/Hora</td><td class='col-xs-9'>"+datos[i][6]+"</td></tr>"+
                                                        "<tr><td class='col-xs-3'>Tiempo de espera</td><td class='col-xs-9 txt-celeste-info'><b>"+tiempoEspera+"</b></td></tr>");
   
                         }  

                      
                    },   
                    error:function(){
                        alert("Error pasando el karaoke a listo.");
                        // $('.fa').css('display','none');
                    }
                    

                })
}
function calculaTiempoEspera(){


    var tiempo = $('#cantidadATocar').html();
    var tiempoMostrar = "";
    tiempo = tiempo*4;
    tiempoMostrar = tiempo+" min";
    $('#tiempoInfoMostrar').html(tiempoMostrar);

    console.log("tiempo: "+tiempo);
    var botonBloquear = document.getElementById('btnBloquear');

    if(tiempo <= 45){

        botonBloquear.setAttribute('class','btn btn-info glyphicon glyphicon-ban-circle');

    }else if(tiempo > 45 && tiempo < 75){

        botonBloquear.setAttribute('class','btn btn-warning glyphicon glyphicon-ban-circle');

    }else if(tiempo >= 75){

        botonBloquear.setAttribute('class','btn btn-danger glyphicon glyphicon-ban-circle');

    }

    
    
    
    

}