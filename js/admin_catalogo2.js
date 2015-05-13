$(document).ready(function(){
	cargarKaraokes();
	generaBtnPaginas();
	paginaSegunBotonSeleccionado();
});

function generaBtnPaginas(){
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url: 'php/calcularCantidadPaginas.php',
		beforeSend: function(){
		},
		success:function(datos){
			for(var i in datos){
				$(".pagination").append("<li><a id='" + datos[i] + "' class='btnPaginaGenerado' href='#'>" + datos[i] + "</a></li>");
			}
		},   
		error:function(jqXHR,text_status,strError){
			alert("Ha ocurrido un error al cargar los karaokes " + strError);
		}
	});
}
function paginaSegunBotonSeleccionado(){
	$("#listaPaginas").on("click", ".btnPaginaGenerado", function(){
		pagina($(this).attr("id"));
		// console.log($(this).attr("id"));
	});
}
function pagina(paginaSeleccionada){
	// console.log(paginaSeleccionada);

	$.ajax({
		data: ({paginaSeleccionadaPHP: paginaSeleccionada}),
		dataType: 'json',
		type: 'POST',
		url: 'php/cargarKaraokes.php',
		beforeSend: function(){
			$("#cuerpoTablaKaraokes").html("");
			$('#modalCarga').modal('show')
		},
		success:function(datos){
			$("#cuerpoTablaKaraokes").html("");
			$('#modalCarga').modal('hide')
			for(var i in datos){
				// $("#cuerpoTablaKaraokes").append(
				// 	"<tr>" +
				// 		"<td>" + datos[i][0] + "</td>" +
				// 		"<td>" + datos[i][1] + "</td>" +
				// 		"<td>" + datos[i][2] + "</td>" +
				// 		"<td>" +
				// 			"<button type='button' class='btn btn-warning btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Editar'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>" +
				// 			"<button type='button' class='btn btn-danger btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Borrar'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button>" +
				// 		"</td>" +
				// 	"</tr>"
				// );
				$('#cuerpoTablaKaraokes').append("<tr>"+
									        "<td class='col-xs-2'>"+datos[i][0]+"</td>"+
									        "<td class='col-xs-4'>"+datos[i][1]+"</td>"+
									        "<td class='col-xs-4'>"+datos[i][2]+"</td>"+									        
									        "<td class='col-xs-2'><div class='btn-group' role='group' aria-label='...'>	"	+			  
											"<button type='button' class='btn btn-warning btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Editar'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>" +
											"<button type='button' class='btn btn-danger btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Borrar'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button>" +
											"</div></td>"+
								        "</tr>");
			}

		},   
		error:function(jqXHR,text_status,strError){
			$("#cuerpoTablaKaraokes").html("");
			alert("Ha ocurrido un error al cargar los karaokes " + strError);
		}
	});
}

function cargarKaraokes(){
	$.ajax({
		data: ({paginaSeleccionadaPHP: 1}),
		dataType: 'json',
		type: 'POST',
		url: 'php/cargarKaraokes.php',
		beforeSend: function(){
			$("#cuerpoTablaKaraokes").html("");
			$('#modalCarga').modal('show')
		},
		success:function(datos){
			$("#cuerpoTablaKaraokes").html("");
			$('#modalCarga').modal('hide')
			for(var i in datos){
				// $("#cuerpoTablaKaraokes").append(
				// 	"<tr>" +
				// 		"<td>" + datos[i][0] + "</td>" +
				// 		"<td>" + datos[i][1] + "</td>" +
				// 		"<td>" + datos[i][2] + "</td>" +
				// 		"<td>" +
				// 			"<button type='button' class='btn btn-warning btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Editar'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>" +
				// 			"<button type='button' class='btn btn-danger btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Borrar'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button>" +
				// 		"</td>" +
				// 	"</tr>"
				// );
					$('#cuerpoTablaKaraokes').append("<tr>"+
									        "<td class='col-xs-2'>"+datos[i][0]+"</td>"+
									        "<td class='col-xs-4'>"+datos[i][1]+"</td>"+
									        "<td class='col-xs-4'>"+datos[i][2]+"</td>"+									        
									        "<td class='col-xs-2'><div class='btn-group' role='group' aria-label='...'>	"	+			  
											"<button type='button' class='btn btn-warning btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Editar'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>" +
											"<button type='button' class='btn btn-danger btn-sm btnAccion' data-toggle='tooltip' data-placement='top' title='Borrar'><span class='glyphicon glyphicon-remove-circle' aria-hidden='true'></span></button>" +
											"</div></td>"+
								        "</tr>");
			}

		},   
		error:function(jqXHR,text_status,strError){
			$("#cuerpoTablaKaraokes").html("");
			alert("Ha ocurrido un error al cargar los karaokes " + strError);
		 	// $('.fa').css('display','none');
		}
	});
};






