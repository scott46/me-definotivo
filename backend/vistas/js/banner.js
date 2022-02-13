/*=============================================
Tabla Banner
=============================================*/
$(".tablaBanner").DataTable({
    "ajax":"ajax/tablaBanner.ajax.php",
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
    }
});
  
/*=============================================
Subir imagen temporal Banner
=============================================*/
$("input[name='subirBanner'], input[name='editarBanner']").change(function(){
    var imagen = this.files[0];
    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
        $("input[name='subirBanner'], input[name='editarBanner']").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }else if(imagen["size"] > 2000000){
        $("input[name='subirBanner'], input[name='editarBanner']").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    }else{
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);
        $(datosImagen).on("load", function(event){
        var rutaImagen = event.target.result;
        $(".previsualizarBanner").attr("src", rutaImagen);
        })
    }
})
  
/*=============================================
Editar Banner
=============================================*/
$(document).on("click", ".editarBanner", function(){
    var idBanner = $(this).attr("idBanner");
    var datos = new FormData();
    datos.append("idBanner", idBanner);
    $.ajax({
        url:"ajax/banner.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){
        $('input[name="idBanner"]').val(respuesta["id"]);
        $('input[name="bannerActual"]').val(respuesta["img"]);
        $('.previsualizarBanner').attr("src", respuesta["img"]);
        }
    })  
})
/*=============================================
Editar Banner TEXTO
=============================================*/
$(document).on("click", ".editarBannerTexto", function(){
    var idBanner = $(this).attr("idBanner");
    $.ajax({
        url:"ajax/banner.ajax.php",
        method: "POST",
        data: {editaBannerTexto: idBanner},
        cache: false,
        success:function(respuesta){
            if(respuesta != ''){
                var json = JSON.parse(respuesta);
                $('#bannerTitle1').val(json[0].titulo1);
                $('#bannerTitle2').val(json[0].titulo2);
                $('#bannerSubtitle1').val(json[0].subtitulo1);
                $('#bannerSubtitle2').val(json[0].subtitulo2);
                $('#bannerOrden').val(json[0].orden);
                $('#bannerLink').val(json[0].link);
                creaFuncionEditTexto(json[0])
            }
        }
    })  
})

function creaFuncionEditTexto(json) {
    var data = json;
    $('.guarda-banner-text').click((e) => {
        e.preventDefault()
        var titulo1 = $('#bannerTitle1').val();
        var titulo2 = $('#bannerTitle2').val();
        var subtitulo1 = $('#bannerSubtitle1').val();
        var subtitulo2 = $('#bannerSubtitle2').val();
        var orden = parseInt($('#bannerOrden').val());
        var link = $('#bannerLink').val();
        var dato = {
            idBanners: data.idBanners,
            ruta: data.ruta,
            link: link,
            orden: orden,
            activo: data.activo,
            titulo1: titulo1,
            titulo2: titulo2,
            subtitulo1: subtitulo1,
            subtitulo2: subtitulo2,
            alineacion: data.alineacion
        }
        var json = JSON.stringify(dato)
        $.ajax({
            url:"ajax/banner.ajax.php",
            method: "POST",
            data: {editaBannerTextoInput: json},
            cache: false,
            success:function(respuesta){
                if(respuesta != ''){
                    if(respuesta.includes('Modified')){
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "El banner ha sido modificado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location.reload();
                            }
                        })
                    }
                }
            }
        })  
    })
    $('#editarBannerTexto').modal('show');
}


  
/*=============================================
Eliminar Banner
=============================================*/
$(document).on("click", ".eliminarBanner", function(){
var idBanner = $(this).attr("idbanner");
var rutaBanner = $(this).attr("rutabanner");
    Swal.fire({
        title: '¿Está seguro de eliminar este banner?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar banner!'
    }).then(function(result){
        if(result.value){
            var datos = new FormData();
            datos.append("idEliminar", idBanner);
            datos.append("rutaBanner", rutaBanner);
            $.ajax({
            url:"ajax/banner.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                if(respuesta == "ok"){
                    Swal.fire({
                        icon: "success",
                        title: "¡CORRECTO!",
                        text: "El banner ha sido borrado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                        window.location.reload();
                        }
                    })
                }
            }
            })
        }
    })
})
  
$(document).on("click", ".btnActivar-banner", function(){ 
    var idBanner =  $(this).attr("idBanner");
    var estado =  $(this).attr("estado");
    var boton = $(this);
    var activa = {
        idBanner: idBanner,
        estado: estado
    }
    var json = JSON.stringify(activa);
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {activaBanner: json},
      success: function (respuesta) {
        if(respuesta.includes("Modified")){
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





  