$(".tablaMEusuarios").DataTable({
	"dom": '<"top row"<"col-4"B><"col-4 text-center"l><"col-4"f>>rt<"bottom row"<"col-6"i><"col-6"p>><"clear">',
	"buttons": [ {
		extend: 'excelHtml5',
		text: '<i class="fas fa-file-excel"></i>',
		titleAttr: 'Exportar a Excel',
		className: 'btn btn-success',
		autoFilter: true,
		sheetName: 'Exported data',

	},
	{
		extend: 'pdfHtml5',
		text: '<i class="fas fa-file-pdf"></i>',
		titleAttr: 'Exportar a PDF',
		className: 'btn btn-danger',
		autoFilter: true,
		sheetName: 'Exported data',

	},
	{
		extend: 'print',
		text: '<i class="fa fa-print"></i>',
		titleAttr: 'Imprimir',
		className: 'btn btn-info',
		autoFilter: true,
		sheetName: 'Exported data',

	},
	],

	"ajax":"ajax/tablausuarios.ajax.php",
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
	"order": [[ 0, "asc" ]]

});


//Activa / Desactiva
$(document).on("click", ".btnActivar-usuario", function(){ 
	var idUsuarios =  $(this).attr("idUsuarios");
	var estado =  $(this).attr("estado");
	var boton = $(this);
	var activa = {
		idUsuarios: idUsuarios,
		estado: estado
	}
	console.log(activa)
	var json = JSON.stringify(activa);
	$.ajax({
	  url:"ajax/experiencia.ajax.php",
	  method: "POST",
	  data: {activaUsuarios: json},
	  success: function (respuesta) {
		if(respuesta.includes("Habilitado") || respuesta.includes("Deshabilitado")){
		  if(estado == 0){
			 $(boton).removeClass('btn-dark');
			 $(boton).addClass('btn-outline-dark');
			 $(boton).html('Desactivado');
			 $(boton).attr('estado', 1);
		  }else{
			  $(boton).addClass('btn-dark');
			  $(boton).removeClass('btn-outline-dark');
			  $(boton).html('Activado');
			  $(boton).attr('estado',0);
		  }
		}
	  }
	});
  })
  


