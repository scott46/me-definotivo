

//avanza la primera pantalla
$('.btn-titulos-modifica').click((e)=>{
  e.preventDefault();
  //controla y pasa
  var estado = 0;
  $('#tabprewiev-modifica input').each((i, e)=>{
    if($(e).val() == ''){ 
      estado += 1;
    }
  })
  if(estado == 0){
    $('#tabprewiev-modifica').removeClass('show active');
    $('#contact-modifica').addClass('show active');
    $('#one-tab-mc').removeClass('active')
    $('#two-tab-mc').addClass('active')
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Todos los campos tienen que estar completos.',
    })
  }
})


//va hacia atras de la promera pantalla
$('.btn-detalles-atras').click((e)=>{ 
  $('#tabprewiev-modifica').addClass('show active');
  $('#contact-modifica').removeClass('show active');
})


// si desea modificar la fecha, cambia el tuypo de input
$('#vigenciaDesde-modifica').focus(function() {
  $('#vigenciaDesde-modifica').attr('type', 'datetime-local');
})
$('#vigenciaHasta-modifica').focus(function() {
  $('#vigenciaHasta-modifica').attr('type', 'datetime-local');
})


// $('.btn-close').click((e) => {
//   window.location.reload(); 
// })


// editar un contenido
$(document).on("click", ".editarContenido", function(){
	var idContenido = $(this).attr("idContenido");
  if(idContenido != ''){
    console.log(idContenido);
    $('.over').addClass('active-sp');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verContenido: idContenido},
      success: function (respuesta) {
        // window.location.reload();
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          console.log(json[0]);
          $('.over').removeClass('active-sp');

          $('#vigenciaDesde').attr('type', 'text')
          $('#vigenciaHasta').attr('type', 'text')  
          
          $("#tags-modifica").tagsinput();
          var $input = $("#tags-modifica").tagsinput('input');
          $input.val(json[0].keyword1);
          $(`#autores-modifica`).val(json[0].autorId)
          $('#titulo_es-modifica').val(json[0].titulo1)
          $('#titulo_en-modifica').val(json[0].titulo2)
          $('#descripcion_es-modifica').val(json[0].descripcion1)
          $('#descripcion_en-modifica').val(json[0].descripcion2)
          $('#titulo_video_es-modifica').val(json[0].tituloVideos1)
          $('#titulo_video_en-modifica').val(json[0].tituloVideos2)
          $('#categoria-modifica').val(json[0].categoriaId)
          $('#tipocontenido-modifica').val(json[0].tipoContenidoId)
          $('#vigenciaDesde-modifica').val(moment(json[0].vigenciaDesde).format('YYYY-M-D h:mm'))
          $('#vigenciaHasta-modifica').val(moment(json[0].vigenciaHasta).format('YYYY-M-D h:mm'))
          $('#precio_peso-modifica').val(json[0].precioPesos)
          $('#precio_dolar-modifica').val(json[0].precioDolares )
          $('#orden-modifica').val(json[0].orden)

          creaFuncionesDeModificarDetalleContenido(json[0])
        }
      }
  	});
  }
})


//modifica background
$(document).on("click", ".modificaBackground-contenido", function(){
	var idContenido = $(this).attr("idContenido");
  if(idContenido != ''){
    console.log(idContenido);
    // $('.over').css('display', 'block');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verContenido: idContenido},
      success: function (respuesta) {
        // window.location.reload();
        console.log(respuesta);
        if(respuesta != ''){ 
          var json = JSON.parse(respuesta);
          if(json[0].previewRuta != '') {
            //$('#preview-image-contenido-modif-back').append(`<img width= "100%" src="${json[0].previewRuta}"></img>`)
          }
          creaFunkcionModificaBack(json[0]);
        }
      }
    })
  }
})







//Activa / Desactiva
$(document).on("click", ".btnActivar-contenido", function(){ 
  var idContenido =  $(this).attr("idContenido");
  var nuevoEstado =  $(this).attr("estadoContenido");
  var boton = $(this);
  var activa = {
    idContenido: idContenido,
    nuevoEstado: nuevoEstado
  }
  console.log(activa)
  var json = JSON.stringify(activa);
  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaContenido: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadocontenido', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadocontenido',0);
        }
      }
    }
  });
})


// abre modal para agreagr elementos
$(document).on("click", ".agregaElemento", function(){
	var idcontenido = $(this).attr("idContenidos");
  var tipoContenido = $(this).attr("tipoContenido");
	console.log(idcontenido);
  console.log(tipoContenido);
	if(idcontenido != ''){
		accionSubirVideo(idcontenido, tipoContenido)
	}
})



/********************************
 FUNCIONES 
*********************************/
function creaFuncionesDeModificarDetalleContenido(contenido) {
  var activo = parseInt(contenido.activo);
  $('.btn-modifica').click(()=>{


    $('.bootstrap-tagsinput input').addClass('no-detect');
    var estado = 0;
    $('#contact-modifica input').each((i, e)=>{
      if(!$(e).hasClass('no-detect')){
        if($(e).val() == ''){ 
          console.log(e)
          estado += 1;
        }
      }
    })
    $('#contact-modifica sele').each((i, e)=>{
      if($(e).val() == ''){ 
        estado += 1;
      }
    })



    if(estado == 0){
      $('#two-tab-mc').removeClass('progreso-proximo')
      $('#two-tab-mc').addClass('progreso-ok')
  
      $('.over').css('opacity', '1');
      $('.over').css('display', 'block');

      var desde = $('#vigenciaDesde-modifica').val()
      var hasta = $('#vigenciaHasta-modifica').val()

      var contenidomodif = {
        idContenidos: contenido.idContenidos,
        titulo1: $('#titulo_es-modifica').val(),  
        titulo2: $('#titulo_en-modifica').val(),  
        descripcion1: $('#descripcion_es-modifica').val(),  
        descripcion2: $('#descripcion_en-modifica').val(),  
        keyword1: $('#tags-modifica').val(),
        keyword2: "key2",
        precioPesos: parseInt($('#precio_peso-modifica').val()),
        precioDolares: parseInt($('#precio_dolar-modifica').val()),
        tipoId: 1,
        categoriaId: $('#categoria-modifica').val(),
        autorId: $('#autores-modifica').val(),
        previewTipoId: 1,
        previewRuta: contenido.previewRuta,
        activo: activo,
        tipoContenidoId: $('#tipocontenido-modifica').val(),
        orden: $('#orden-modifica').val(),
        vigenciaDesde: desde,
        vigenciaHasta: hasta,
        duracionSuscripcion: 30,
        tituloVideos1: $('#titulo_video_es-modifica').val(),
        tituloVideos2: $('#titulo_video_en-modifica').val(),
        //esto no se que es
      }
      var json = JSON.stringify(contenidomodif);
      console.log(json)

      $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {modificaContenido: json},
        success: function (respuesta) {
          // window.location.reload();
          if(respuesta != ''){ 
            if(respuesta.includes('Modified')){
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'success',
                title: 'La categoria se ha modificado exitosamente',
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
        }
      })
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Todos los campos tienen que estar completos.',
      })
    }
  });
  $('#modificaDetalleContenido').modal('show');
}


function  creaFunkcionModificaBack(json) {
  var contenido = json;
  $('.guarda-contenido-modif-bk').click(()=>{
    if($('#base64-modif-contenido').text() != '') {

    $('.over').css('opacity', '1');
    $('.over').css('display', 'block');
    var imagenAnterior = contenido.rutaBackground;
    var contenidoModif = {
      imagen: $('#base64-modif-contenido').text(),
      idContenidos: contenido.idContenidos,
      imagenAnterior: imagenAnterior
    }
    var json = JSON.stringify(contenidoModif);
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {modificaBackgroundContenido: json},
      success:function(respuesta){ 
        if(respuesta.includes('ok')) {
          var jsonRespuesta =  JSON.parse(respuesta);
          contenido.previewRuta = jsonRespuesta.ruta;
          actualizaOtrosDatosContenido(contenido)
        } else {
          $('.over').css('opacity', '0');
          $('.over').css('display', 'none');
          Swal.fire({
            icon: 'error',
            title: 'Se produjo un error. Intente nuevamente',
          })
        }
      }
    });

    function actualizaOtrosDatosContenido(contenido) {
      contenido.vigenciaDesde = moment(contenido.vigenciaDesde).format('YYYY-M-D h:mm')
      contenido.vigenciaHasta = moment(contenido.vigenciaHasta).format('YYYY-M-D h:mm')
      console.log(contenido)
      var json = JSON.stringify(contenido);
      $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {modificaContenido: json},
        success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('Modified')){
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'success',
                title: 'El contenido se ha modificado exitosamente',
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
                title: 'Se produjo un error. Intente nuevamente',
              })
            }
        }
      });
    }
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Debe asignar una imagen',
      })
    }
  })
  
  $('#modifBackgroundContenido').modal('show');
}


function accionSubirVideo(idcontenido, tipoContenido) {
  
	$('.btn-video').click((e) => {
    e.preventDefault();
    $('.over').addClass('active-sp');
    var control = 'no'
    if(tipoContenido == 2) {
      console.log('tipo1')
      if($('#link-addElemento') != '' && $('#preview-exp .video-fluid').length > 0){
        control = 'ok';
      }
    } else {
      console.log('tipo2')
      if($('#preview .video-fluid').length > 0){
        control = 'ok';
      }
    }
    if(control != 'ok') {
      $('.over').removeClass('active-sp');
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son requeridos',
      })
    } else {

      $('#home-ele').removeClass('show active');
      $('#result-ele').addClass('show active');
      function convertir(segundosP) {
        const segundos = (Math.round(segundosP % 0x3C)).toString();
        const horas    = (Math.floor(segundosP / 0xE10)).toString();
        const minutos  = (Math.floor(segundosP / 0x3C ) % 0x3C).toString();
        return `${zfill(horas, 2)}:${zfill(minutos, 2)}:${zfill(segundos, 2)}`;
      }
      function zfill(number, width) {
        var numberOutput = Math.abs(number); /* Valor absoluto del número */
        var length = number.toString().length; /* Largo del número */ 
        var zero = "0"; /* String de cero */  
        if (width <= length) {
            if (number < 0) {
                return ("-" + numberOutput.toString()); 
            } else {
                return numberOutput.toString(); 
            }
        } else {
            if (number < 0) {
                return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
            } else {
                return ((zero.repeat(width - length)) + numberOutput.toString()); 
            }
        }
      }
      var duracion = '';
      if(tipoContenido != 2){
        if($('#tipo-archivo').val() == 1 || $('#tipo-archivo').val() == 2){
          duracion = convertir($('#preview video')[0].duration);
        }
      }
      var elemento = {
        contenidoId: idcontenido,
        tipoId: tipoContenido != 2 ? $('#tipo-archivo').val() : 6,
        previewTipoId: 1,
        previewRuta: "",
        titulo1: tipoContenido != 2 ? $('#titulo_es-ele').val() : 'exp-unica',
        titulo2: tipoContenido != 2 ? $('#titulo_en-ele').val() : 'exp-unica',
        subtitulo1: tipoContenido != 2 ? $('#subtitulo_es-ele').val() : '',
        subtitulo2: tipoContenido != 2 ? $('#subtitulo_en-ele').val() : '',
        descripcion1: tipoContenido != 2 ? $('#descripcion_es-ele').val() : '',
        descripcion2: tipoContenido != 2 ? $('#descripcion_en-ele').val() : '',
        duracion: duracion,
        orden: 100,
        imagen: tipoContenido != 2 ? $('#base64-add-ele').text() : '',
        video: tipoContenido != 2 ? $('#subir-video-ele').val() : $('#subir-video-ele-exp').val(),
        link: tipoContenido == 2 ? $('#link-addElemento').val() : ''
      }
      console.log(elemento);
      var json = JSON.stringify(elemento);
      $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {subirExp: json},
        success:function(respuesta){ 
          console.log(respuesta);
          if(respuesta.includes('id')){
            var id = respuesta.split('-');
            console.log(id);
            if(tipoContenido != 2){
              document.getElementById("loading-carga-datos-ele").remove();
              document.getElementById("loading-carga-datos-ok-ele").style.display = "block";
            }
            var video = '';
            if(tipoContenido != 2){ 
              video = $('input[type=file]')[2].files[0];
            } else {
              video = $('input[type=file]')[5].files[0];
            }
            subirVideo(video, id[1]);
          } else {
            $('.over').removeClass('active-sp');
            Swal.fire({
              icon: 'error',
              title: 'Se ha producido un error. Intente nuevamente',
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            })
          }
        }
      });
      function subirVideo(video, id) {
        var formData = new FormData();
        formData.append("idVideo", id);
        formData.append("archivo", video);
        console.log('creando archivo');
        $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          processData: false,
          contentType:false,
          cache:false,
          data: formData,
          success:function(respuesta){ 
            console.log(respuesta)
            if(respuesta.includes('Addedbool(true)')){
              if(tipoContenido != 2){
                document.getElementById("loading-video").remove();
                document.getElementById("loading-video-ok").style.display = "block";
              }
              $('.over').removeClass('active-sp');
              Swal.fire({
                icon: 'success',
                title: 'Se ha guardado la experiencia exitosamente',
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              })
            } else {
              $('.over').removeClass('active-sp');
              Swal.fire({
                icon: 'error',
                title: 'No se ha podido crear la experiencia',
              })
            }
          }
        });
      }
    }
  });

  if(tipoContenido == 2) {
    $('#subirvideo-exp').modal('show');
  } else {
    $('#subirvideo').modal('show');
  }
}
