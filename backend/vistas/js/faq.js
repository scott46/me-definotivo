
//guarda una nueva FAQ
$(document).on("click", ".guarda-faq", function(){
  var pregunta1 = $('#pregunta1').val().trim()
  var pregunta2 = $('#pregunta2').val().trim()
  var respuesta1 = $('#respuesta1').val().trim()
  var respuesta2 = $('#respuesta2').val().trim()
  var orden = $('#orden-faq').val();
  if(pregunta1 == '' || pregunta2 == '' || respuesta1 == '' || respuesta2 == '' || orden == '') {
    Swal.fire({
      icon: 'error',
      title: 'Todos los datos son obligatorios',
    })
  } else {
    $('.over').css('display', 'block');
    $('.over').css('opacity', '1');
    var faq = {
      pregunta1: pregunta1,
      pregunta2: pregunta2,
      respuesta1: respuesta1,
      respuesta2: respuesta2,    
      orden: orden,
      activo: 1   
    }
    var json = JSON.stringify(faq);
    $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {subirFaq: json},
        success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('id')){
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'success',
                title: 'La pregunta se guardado exitosamente',
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
$(document).on("click", ".editarFaq", function(){
	var idFaq = $(this).attr("idFaq");
  if(idFaq != ''){
    console.log(idFaq);
    $('.over').css('display', 'block');
    $('.over').css('opacity', '1');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verFaq: idFaq},
      success: function (respuesta) {
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          creaFuncionModifica(json);
        }
      }
  	});
  }
})



//activa / desactiva FAQ
$(document).on("click", ".btnActivar-faq", function(){
	var idFaq = $(this).attr("idFaq");
  var nuevoEstado = $(this).attr("estadoFaq");
  var boton = $(this);

  var activa = {
    idFaq: idFaq,
    nuevoEstado: nuevoEstado
  }
  var json = JSON.stringify(activa);

  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaFaq: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadoFaq', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadoFaq',0);
        }
      }
    }
  });
})


function creaFuncionModifica(json) {
  $('.title-faq-modifica').text(json[0].pregunta1)
  $('#pregunta1-modifica').val(json[0].pregunta1)
  $('#pregunta2-modifica').val(json[0].pregunta2)
  $('#respuesta1-modifica').val(json[0].respuesta1)
  $('#respuesta2-modifica').val(json[0].respuesta2)
  $('#orden-faq-modifica').val(json[0].orden)
  var activoFaq = json[0].activo
  var idFaqs = json[0].idFaqs
  
  $('.guarda-faq-modifica').click(() => {
    var pregunta1 = $('#pregunta1-modifica').val()
    var pregunta2 = $('#pregunta2-modifica').val()
    var respuesta1 = $('#respuesta1-modifica').val()
    var respuesta2 = $('#respuesta2-modifica').val()
    var orden = $('#orden-faq-modifica').val();
    if(pregunta1 == '' || pregunta2 == '' || respuesta1 == '' || respuesta2 == '' || orden == '') {
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son obligatorios',
      })
    } else {
      $('.over').css('display', 'block');
      $('.over').css('opacity', '1');
      var faq = {
        idFaqs: idFaqs,
        pregunta1: pregunta1,
        pregunta2: pregunta2,
        respuesta1: respuesta1,
        respuesta2: respuesta2,    
        orden: orden,
        activo: activoFaq 
      }
      var json = JSON.stringify(faq);
      $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          data: {modificaFaq: json},
          success:function(respuesta){ 
              console.log(respuesta);
              if(respuesta.includes('id')){
                $('.over').css('opacity', '0');
                $('.over').css('display', 'none');
                Swal.fire({
                  icon: 'success',
                  title: 'La pregunta se ha modificado exitosamente',
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
  $('#modificaFaq').modal('show');
}