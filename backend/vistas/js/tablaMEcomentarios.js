$(".tablaMEComentarios").DataTable({
	"ajax":"ajax/tablacomentarios.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}
	},
	"order": [[ 1, "asc" ]]
});



$(document).on("click", ".btnActivar-comentario", function(){ 
	var idComentario =  $(this).attr("idComentario");
	var nuevoEstado =  $(this).attr("estadoComentarior");
	var tipoComentario = $(this).attr("data-tipo");
	var boton = $(this);
	var activa = {
		idComentario: idComentario,
	  	nuevoEstado: nuevoEstado,
	  	tipoComentario : tipoComentario
	}
	console.log(activa)
	var json = JSON.stringify(activa);
	$.ajax({
	  url:"ajax/experiencia.ajax.php",
	  method: "POST",
	  data: {activaComentario: json},
	  success: function (respuesta) {
		if(respuesta.includes("Modified")){
		  if(nuevoEstado == 0){
			 $(boton).removeClass('btn-dark');
			 $(boton).addClass('btn-outline-dark');
			 $(boton).html('Desactivado');
			 $(boton).attr('estadoComentarior', 1);
		  }else{
			  $(boton).addClass('btn-dark');
			  $(boton).removeClass('btn-outline-dark');
			  $(boton).html('Activado');
			  $(boton).attr('estadoComentarior',0);
		  }
		}
	  }
	});
  })
  