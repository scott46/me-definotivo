
//guarda una nueva FAQ
$(document).on("click", ".guarda-tyc", function(){
  var titulo1 = $('#titulo1').val().trim()
  var titulo2 = $('#titulo2').val().trim()
  var parrafo1 = $('#parrafo1').val().trim()
  var parrafo2 = $('#parrafo2').val().trim()
  var orden = $('#orden-tyc').val();
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
        data: {subirTyc: json},
        success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('id')){
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'success',
                title: 'El T y C se guardado exitosamente',
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



// EDITA faq
$(document).on("click", ".editarTyc", function(){
	var idTyc = $(this).attr("idTyc");
  if(idTyc != ''){
    console.log(idTyc);
    $('.over').css('display', 'block');
    $('.over').css('opacity', '1');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verTyc: idTyc},
      success: function (respuesta) {
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          creaFuncionModificaTyc(json);
        }
      }
  	});
  }
})



//activa / desactiva FAQ
$(document).on("click", ".btnActivar-tyc", function(){
	var idTyc = $(this).attr("idTyc");
  var nuevoEstado = $(this).attr("estadoTyc");
  var boton = $(this);

  var activa = {
    idTyc: idTyc,
    nuevoEstado: nuevoEstado
  }
  var json = JSON.stringify(activa);

  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaTyc: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadoTyc', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadoTyc',0);
        }
      }
    }
  });
})


function creaFuncionModificaTyc(json) {
  $('#titulo1').val(json[0].titulo1)
  $('#titulo2').val(json[0].titulo2)
  $('#parrafo1').val(json[0].parrafo1)
  $('#parrafo2').val(json[0].parrafo2)
  $('#orden-tyc').val(json[0].orden)
  var activoTyc = json[0].activo
  var idTyc = json[0].idTyc

  $('.guarda-tyc').addClass('guarda-tyc-modifica');
  $('.guarda-tyc').removeClass('guarda-tyc');

  
  $('.guarda-tyc-modifica').click(() => {
    var titulo1 = $('#titulo1').val()
    var titulo2 = $('#titulo2').val()
    var parrafo1 = $('#parrafo1').val()
    var parrafo2 = $('#parrafo2').val()
    var orden = $('#orden-tyc').val();
    if(titulo1 == '' || titulo2 == '' || parrafo1 == '' || parrafo2 == '' || orden == '') {
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son obligatorios',
      })
    } else {
      $('.over').css('display', 'block');
      $('.over').css('opacity', '1');
      var faq = {
        idTyc: idTyc,
        titulo1: titulo1,
        titulo2: titulo2,
        parrafo1: parrafo1,
        parrafo2: parrafo2,    
        orden: orden,
        activo: activoTyc 
      }
      var json = JSON.stringify(faq);
      $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          data: {modificaTyc: json},
          success:function(respuesta){ 
              console.log(respuesta);
              if(respuesta.includes('Modified')){
                $('.over').css('opacity', '0');
                $('.over').css('display', 'none');
                Swal.fire({
                  icon: 'success',
                  title: 'El T y C se ha modificado exitosamente',
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
  $('#addTyc').modal('show');
}