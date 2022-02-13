//Agrega una categoria
  $(document).on("click", ".guarda-categoria", function(){
    if($('#base64-add-categoria').text() != '') {

      var tituloEs = $('#titulo-es-categoria').val();
      var tituloEn = $('#titulo-en-categoria').val();
      var descripcionEs = '';
      var descripcionEn = '';
      var ordenCategoria = $('#orden-categoria').val();
      var imagen = $('#base64-add-categoria').text();

      console.log(imagen);

      if(tituloEs == '' || tituloEn == '' || ordenCategoria == '' || imagen == undefined) {
        Swal.fire({
          icon: 'error',
          title: 'Todos los datos son obligatorios',
        })
      } else {

        $('#background-categoria-tab').removeClass('show active');
        $('#background-categoria').removeClass('show active');
        $('#resultado-categoria').addClass('show active');
        $('#resultado-categoria-tab').addClass('show active');
    
        var categoria = {
            titulo1: tituloEs,
            titulo2: tituloEn,
            descripcion1: descripcionEs,
            descripcion2: descripcionEn,
            keyword1: tituloEs,
            keyword2: "title one",
            orden: ordenCategoria,
            rutaBackground: null,
            imagen: imagen,
            activo: 0, 
            ae: 0
        }

        console.log(categoria)
        var json = JSON.stringify(categoria);

        $.ajax({
            url:"ajax/experiencia.ajax.php",
            method: "POST",
            data: {subirCategoria: json},
            success:function(respuesta){ 
                console.log(respuesta);
                if(respuesta.includes('id')){
                    document.getElementById("loading-carga-datos-categoria").remove();
                    document.getElementById("loading-carga-datos-ok-categoria").style.display = "block";
                    Swal.fire({
                      icon: 'success',
                      title: 'La categoria se ha creado exitosamente',
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

    } else {
      Swal.fire({
        icon: 'error',
        title: 'Debe asignar una imagen',
      })
    }

  });

// Busco los datos a modificar -NO MODIFICA IMAGEN
$(document).on("click", ".editarCategoria", function(){
	var idcategoria = $(this).attr("idCategoria");
  if(idcategoria != ''){
    console.log(idcategoria);
    // $('.over').css('display', 'block');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verCategoria: idcategoria},
      success: function (respuesta) {
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          $('#titulo-es-categoria-modifica').val(json[0].titulo1);
          $('#titulo-en-categoria-modifica').val(json[0].titulo2);
          //$('#descripcion-es-categoria-modifica').val(json[0].descripcion1);
          //$('#descripcion-en-categoria-modifica').val(json[0].descripcion2);
          $('#orden-categoria-modifica').val(json[0].orden);

          $('#nombre-categoria').text(json[0].titulo1);
          creaFuncionModificaDatosCategoria(json[0].idCategorias, json[0].rutaBackground)
        }
      }
  	});
  }
})


// Busco los datos para modificar, pero solo modifica la IMAGEN
$(document).on("click", ".editarBackgroundCategoria", function(){
	var idcategoria = $(this).attr("idCategoria");
  if(idcategoria != ''){
    console.log(idcategoria);
    // $('.over').css('display', 'block');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verCategoria: idcategoria},
      success: function (respuesta) {
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          $('#titulo-es-categoria-modifica').val(json[0].titulo1);
          $('#titulo-en-categoria-modifica').val(json[0].titulo2);
          //$('#descripcion-es-categoria-modifica').val(json[0].descripcion1);
          //$('#descripcion-en-categoria-modifica').val(json[0].descripcion2);
          $('#orden-categoria-modifica').val(json[0].orden);
          //$('#preview-image').append(`<img width="100%" src=${json[0].rutaBackground}></img>`);
          //$('#btn-guarda-categoria').addClass('modifica-categoria')
          //$('#addCategoria').modal('show');
          creaFuncionModificaBackgroundCategoria(json[0])
        }
      }
  	});
  }
})

//Activa / Desactiva
$(document).on("click", ".btnActivar", function(){ 
  var idCategoria =  $(this).attr("idCategoria");
  var nuevoEstado =  $(this).attr("estadoCategoria");
  var boton = $(this);

  var activa = {
    idCategoria: idCategoria,
    nuevoEstado: nuevoEstado
  }
  var json = JSON.stringify(activa);

  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaCategoria: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadoCategoria', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadoCategoria',0);
        }
      }
    }
  });

})

$(document).on("click", ".checkAE", function(e){ 
  e.preventDefault();
  var idCategoria =  $(this).attr("idCategoria");
  var estadoCheck =  $(this).attr("estadoCheck");
  var boton = $(this);
  var activa = {
    idCategoria: idCategoria,
    estadoCheck: estadoCheck
  }


  var json = JSON.stringify(activa);
  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaAE: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(estadoCheck == 0){
          $(boton).removeClass('btn-dark');
          $(boton).addClass('btn-outline-dark');
          $(boton).attr('estadoCheck', 1);
        }else{
          $(boton).addClass('btn-dark');
          $(boton).removeClass('btn-outline-dark');
           $(boton).attr('estadoCheck',0);
        }
      }
    }
  });


});








/********************************
 FUNCIONES 
*********************************/
function creaFuncionModificaDatosCategoria (id, imagen) {
  $('.modifica-categoria').click(() =>{
    
    $('.over').css('opacity', '1');
    $('.over').css('display', 'block');
    var tituloEs = $('#titulo-es-categoria-modifica').val();
    var tituloEn = $('#titulo-en-categoria-modifica').val();
    var descripcionEs = '';
    var descripcionEn = '';
    var ordenCategoria = $('#orden-categoria-modifica').val();
    var categoriaModif = {
        idCategorias: id,
        titulo1: tituloEs,
        titulo2: tituloEn,
        descripcion1: descripcionEs,
        descripcion2: descripcionEn,
        keyword1: tituloEs,
        keyword2: "title one",
        orden: ordenCategoria,
        rutaBackground: imagen,
    }
    console.log(categoriaModif)
    var json = JSON.stringify(categoriaModif);
    $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {modificaCategoria: json},
        success:function(respuesta){ 
            console.log(respuesta);
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
    });
  });
  $('#modifDatosCategoria').modal('show');
}



function creaFuncionModificaBackgroundCategoria(categoria) {
    $('.guarda-categoria-modif-bk').click(()=>{
      if($('#base64-modif-categoria').text() != '') {

        $('.over').css('opacity', '1');
        $('.over').css('display', 'block');
        var imagenAnterior = categoria.rutaBackground;
        var categoriaModif = {
          imagen: $('#base64-modif-categoria').text(),
          idCategoria: categoria.idCategorias,
          imagenAnterior: imagenAnterior
        }
        var json = JSON.stringify(categoriaModif);
        $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          data: {modificaBackgroundCategoria: json},
          success:function(respuesta){ 
            if(respuesta.includes('ok')) {
              var jsonRespuesta =  JSON.parse(respuesta);
              categoria.rutaBackground = jsonRespuesta.ruta;
              actualizaOtrosDatosCategoria(categoria)
            } else if(spuesta.includes('memory size')) {
              $('.over').css('opacity', '0');
              $('.over').css('display', 'none');
              Swal.fire({
                icon: 'error',
                title: 'El tamaño del archivo es muy grande. ',
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

        function actualizaOtrosDatosCategoria(categoria) {
          console.log(categoria)
          var json = JSON.stringify(categoria);
          $.ajax({
            url:"ajax/experiencia.ajax.php",
            method: "POST",
            data: {modificaCategoria: json},
            success:function(respuesta){ 
                console.log(respuesta);
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
    $('#nombre-categoria-bk').text(categoria.titulo1);
    $('#modifBackgroundCategoria').modal('show');
    console.log(categoria);
}
