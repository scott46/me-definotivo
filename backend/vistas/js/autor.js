//Agrego un autor
$(document).on("click", ".guarda-autor", function(){
    $('.over').css('opacity', '1');
    $('.over').css('display', 'block');
    var nombreAutor = $('#nombreAutor').val()
    if(nombreAutor == '' ) {
        $('.over').css('opacity', '0');
        $('.over').css('display', 'none');
        Swal.fire({
            icon: 'error',
            title: 'Todos los datos son obligatorios',
        })
    } else {
      var autor = {
        nombre: nombreAutor,
      }
      console.log(autor)
      var json = JSON.stringify(autor);
      $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          data: {subirAutor: json},
          success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('id')){
                $('.over').css('opacity', '0');
                $('.over').css('display', 'none');
                Swal.fire({
                    icon: 'success',
                    title: 'El autor de ha generado exitosamente',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('.over').css('opacity', '1');
                        $('.over').css('display', 'block');
                        window.location.reload();
                    }
                })
            } else {
                $('.over').css('opacity', '0');
                $('.over').css('display', 'none');
                Swal.fire({
                    icon: 'error',
                    title: 'Se ha producido un error, intente nuevamente.',
                })
            }
          }
      });
    }
});

// Busco los datos a modificar 
$(document).on("click", ".editarAutor", function(){
	var idAutores = $(this).attr("idAutores");
    if(idAutores != ''){
        console.log(idAutores);
        // $('.over').css('display', 'block');
        $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {verAutor: idAutores},
        success: function (respuesta) {
            if(respuesta != ''){
                var json = JSON.parse(respuesta);
                $('#nombreAutor-modifica').val(json[0].nombre);
                creaFuncionModificaAutor(json[0])
            }
        }
        });
    }
})




//Activa / Desactiva
$(document).on("click", ".btnActivar-autor", function(){ 
  var idAutores =  $(this).attr("idAutores");
  var nuevoEstado =  $(this).attr("estadoAutor");
  var boton = $(this);

  var activa = {
    idAutores: idAutores,
    nuevoEstado: nuevoEstado
  }
  var json = JSON.stringify(activa);

  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaAutor: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadoAutor', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadoAutor',0);
        }
      }
    }
  });

})



/********************************
 FUNCIONES 
*********************************/
function creaFuncionModificaAutor (autor) {
  $('.modifica-autor').click(() =>{
    $('.over').css('opacity', '1');
    $('.over').css('display', 'block');
    var nuevoNombre = $('#nombreAutor-modifica').val()
    var autorModif = {
        idAutores: autor.idAutores,
        nombre: nuevoNombre
    }
    console.log(autorModif)
    var json = JSON.stringify(autorModif);
    $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {modificaAutor: json},
        success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('Modified')){
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'success',
                title: 'El autor se ha modificado exitosamente',
              }).then((result) => {
                if (result.isConfirmed) {
                  $('.over').css('opacity', '1');
                  $('.over').css('display', 'block');
                  window.location.reload();
                }
              })
            } else {
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'error',
                title: 'Se ha producido un error. Intente nuevamente',
              })
            }
        }
    });
  });
  $('#modifAutor').modal('show');
}


