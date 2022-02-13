
//guarda una nueva PP
$(document).on("click", ".guarda-pp", function(){
  var titulo1 = $('#titulo1pp').val().trim()
  var titulo2 = $('#titulo2pp').val().trim()
  var parrafo1 = $('#parrafo1pp').val().trim()
  var parrafo2 = $('#parrafo2pp').val().trim()
  var orden = $('#orden-pp').val();
  if(titulo1 == '' || titulo2 == '' || parrafo1 == '' || parrafo2 == '' || orden == '') {
    Swal.fire({
      icon: 'error',
      title: 'Todos los datos son obligatorios',
    })
  } else {
    $('.over').css('display', 'block');
    $('.over').css('opacity', '1');
    var tyc = {
      titulo1: titulo1,
      titulo2: titulo2,
      parrafo1: parrafo1,
      parrafo2: parrafo2,    
      orden: orden,
      activo: 1   
    }
    var json = JSON.stringify(tyc);
    $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {subirPp: json},
        success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('id')){
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'success',
                title: 'La nueva politica se guardado exitosamente',
              }).then((result) => {
                if (result.isConfirmed) {
                  $('.over').css('opacity', '1');
                  $('.over').css('display', 'block');
                  window.location.reload();
                }
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Se ha producido un error. Intente nuevamente',
              })
            }
        }
    });
  }
})



//EDITA pp
$(document).on("click", ".editarPp", function(){
  var idPp = $(this).attr("idPp");
  if(idPp != ''){
    console.log(idPp);
    $('.over').css('display', 'block');
    $('.over').css('opacity', '1');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verPp: idPp},
      success: function (respuesta) {
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          
          console.log(json);
          creaFuncionModificaPp(json);
        }
      }
    });
  }
})



//activa / desactiva FAQ
$(document).on("click", ".btnActivar-pp", function(){
  var idPp = $(this).attr("idPp");
  var nuevoEstado = $(this).attr("estadoPp");
  var boton = $(this);
  var activa = {
    idPp: idPp,
    nuevoEstado: nuevoEstado
  }
  var json = JSON.stringify(activa);
  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaPp: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadopp', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadopp',0);
        }
      }
    }
  });
})


function creaFuncionModificaPp(json) {
  $('#titulo1pp').val(json[0].titulo1)
  $('#titulo2pp').val(json[0].titulo2)
  $('#parrafo1pp').val(json[0].parrafo1)
  $('#parrafo2pp').val(json[0].parrafo2)
  $('#orden-pp').val(json[0].orden)
  var activoPp = json[0].activo
  var idPp = json[0].idPoliticas

  $('.guarda-pp').addClass('guarda-pp-modifica');
  $('.guarda-pp').removeClass('guarda-pp');

  
  $('.guarda-pp-modifica').click(() => {
    var titulo1 = $('#titulo1pp').val()
    var titulo2 = $('#titulo2pp').val()
    var parrafo1 = $('#parrafo1pp').val()
    var parrafo2 = $('#parrafo2pp').val()
    var orden = $('#orden-pp').val();
    if(titulo1 == '' || titulo2 == '' || parrafo1 == '' || parrafo2 == '' || orden == '') {
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son obligatorios',
      })
    } else {
      $('.over').css('display', 'block');
      $('.over').css('opacity', '1');
      var faq = {
        idPolitica: idPp,
        titulo1: titulo1,
        titulo2: titulo2,
        parrafo1: parrafo1,
        parrafo2: parrafo2,    
        orden: orden,
        activo: activoPp 
      }
      var json = JSON.stringify(faq);
      $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          data: {modificaPp: json},
          success:function(respuesta){ 
              console.log(respuesta);
              if(respuesta.includes('Modified')){
                $('.over').css('opacity', '0');
                $('.over').css('display', 'none');
                Swal.fire({
                  icon: 'success',
                  title: 'La politica se ha modificado exitosamente',
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
    }
  
  })
  $('.over').css('display', 'none');
  $('.over').css('opacity', '0');
  $('#addpp').modal('show');
}