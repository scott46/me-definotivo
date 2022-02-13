$(".tablaMEFaq").DataTable({
	"ajax":"ajax/tablaFaq.ajax.php",
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


// $(document).ready(function() {
// 	var url = 'ajax/tablaFaq.ajax.php';
// 	var table = $('.tablaMEFaq').DataTable({
// 	  	ajax: url,
// 	  	createdRow: function(row, data, dataIndex){
// 			$(row).attr('id', data.id);
// 	  	},
// 	  	rowReorder: {
// 			dataSrc: 'order',
// 			selector: 'td:first-child',
// 	  	},
// 	  	columns: [
// 			{
// 				data: 'order'
// 			},{
// 				data: 'id'
// 		 	},{
// 		   		data: 'name'
// 			},{
// 				data: 'place'
// 			},{
// 				data: 'pla'
// 		}],
// 	  	// "order": [[ 1, "desc" ]]
// 	});
// 	table.on( 'row-reorder', function ( e, diff, edit ) {
// 		for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
// 		   // get id row
// 		   let idQ = diff[i].node.id;
// 		   let idNewQ = idQ.replace("row_", "");
// 		   // get position
// 		   let position = diff[i].newPosition+100;
// 		   //call funnction to update data
// 		   updateOrder(idNewQ, position, e, edit);
// 		}
// 	   } );
// 	function updateOrder(idNewQ, position,e, edit) {
// 		console.log(idNewQ+' pos: '+position)
// 	}
// });


