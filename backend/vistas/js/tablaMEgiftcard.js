$(".tablaMEgiftCard").DataTable({
    "ajax":"ajax/tablagiftcard.ajax.php",
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
    "order": [[ 0, "desc" ]]

});



//Activa / Desactiva
$(document).on("click", ".btnActivar-gift", function(){ 

  var idGiftcards =  $(this).attr("idGiftcards");
  var nuevoEstado =  $(this).attr("estadoGiftcard");
  var textEstado = nuevoEstado == '1' ? 'Habilitar' : 'Deshabilitar';
  var boton = $(this);
  Swal.fire({
    title: "CONFIRME",
    text: `Esta seguro que desea ${textEstado} esta Gift Card?`,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: '#01012c',
    cancelButtonColor: '#c12131',
    cancelButtonText: 'Cancelar',
    confirmButtonText: textEstado
    }).then(function(result) {
        if(result.value){
            var activa = {
                idGiftcards: idGiftcards,
                nuevoEstado: nuevoEstado
            }
            var json = JSON.stringify(activa);

            $.ajax({
                url:"ajax/experiencia.ajax.php",
                method: "POST",
                data: {activaGift: json},
                success: function (respuesta) {
                    if(respuesta.includes("Modified")){
                        if(nuevoEstado == 0){
                           $(boton).removeClass('btn-dark');
                           $(boton).addClass('btn-outline-dark');
                           $(boton).html('Desactivado');
                           $(boton).attr('estadoGiftcard', 1);
                        }else{
                            $(boton).addClass('btn-dark');
                            $(boton).removeClass('btn-outline-dark');
                            $(boton).html('Activado');
                            $(boton).attr('estadoGiftcard',0);
                        }
                    }
                }
            });

        }
    })
})


