
$(document).on("click", ".verElementos", function(){
	var idcontenido = $(this).attr("idContenidos");
	//console.log(idcontenido);
	if(idcontenido != ''){
		$.ajax({
    	url:"ajax/experiencia.ajax.php",
    	method: "POST",
    	data: {verContenidoTodos: idcontenido},
    	success: function (respuesta) {
    		if(respuesta !='[]'){
    			var json = JSON.parse(respuesta);
        
    			creatModalElmentos(json);
    		}
    		
    	}
		});
	}
})


function creatModalElmentos(json) {

  console.log(json);

  var data = json;
	var table = $('.tablaMEElementos').DataTable({
    data: data,
    destroy: true,
    searching: true,
	  createdRow: function(row, data, dataIndex){
			$(row).attr('id', data.id);
    },
    rowReorder: {
      dataSrc: 'order',
      selector: 'td:first-child',
    },
    columns: [
      {
				data: 'orden'
			},{
		   	data: 'previewRuta'
			},{
				data: 'tipoId'
			},{
				data: 'titulo1'
      }
      ,{
				data: 'descripcion1'
      }
      ,{
				data: 'activo'
      },{
				data: 'idElementos'
		}],
    columnDefs: [
      {
        "targets": 1,
        "data": 'previewRuta',
        "render": function (data, type, row, meta) {
          var img = json[0].previewRuta == '' ? '../backend/vistas/img/icons/link-img.png' : data;
          return '<img src="' + img + '" alt="' + img + '"height="auto" width="70"/>';
        }
      },
      {
        "targets": 2,
        "data": 'tipoId',
        "render": function (data, type, row, meta) {
            var pdf = '<i class="fas fa-file-pdf"></i>';
            var video = '<i class="fas fa-video"></i>';
            var audio = '<i class="fas fa-headphones"></i>';
            var link = '<i class="fas fa-link"></i>';
            if(data == 1){
              return video
            } else if (data == 2) {
              return audio
            } else if(data == 5) {
              return pdf;
            } else if(data == 6) {
              return link;
            }
            ;
        }
      },
      {
        "targets": 4,
        "data": 'descripcion1',
        "render": function (data, type, row, meta) {
          var nuevoEstado = row.esPreview == 0 ? 1 : 0;
          var check = row.esPreview == 1 ? 'checked' : '';
          return '<div class="form-check text-center"><input '+check+' idElemento="'+row.idElementos+'" nuevoEstado="'+nuevoEstado+'" class="form-check-input change-free" type="checkbox" ></div>';
        }
      },
      {
      "targets": 5,
      "data": 'activo',
      "render": function (data, type, row, meta) {
        var activado = '<button title="Desactiva Elemento" class="btnActivar-elemento btn btn-dark" idElemento="'+row.idElementos+'" estadoElemento="0">Activado</button>';
        var desactivado = '<button title="Activa Elemento" class="btnActivar-elemento btn btn-outline-dark" idElemento="'+row.idElementos+'" estadoElemento="1">Desactivado</button>';
        return data == 1 ? activado : desactivado;
        }
      },
      {
      "targets": 6,
      "data": 'activo',
      "render": function (data, type, row, meta) {
        var btnPreview = '<div style="text-align: center"><a title="Visualiza la web del Elemento" class="btn btn-dark" target="_blank" href="http://c2370883.ferozo.com/md/me/elementoPreview?elemento='+row.idElementos+'"><i class="fas fa-eye"></i></a></div>';
        return btnPreview;
        }
      },
      //elementoPreview.php?elemento=<?=$elemento['idElementos']?>
      {
        "targets": 7,
        "data": 'idElementos',
        "render": function (data, type, row, meta) {

          var tipoContenidoId = row.tipoContenidoId;

          var buttoBackgrod = row.tipoContenidoId != 2 ? '<button title="Edita el Background del Elemento" class="modificaBackground-elemento btn btn-dark mx-2" idElemento="'+row.idElementos+'"><i class="fas fa-image"></i></button>' : '';

          var buttonVimeo = row.tipoContenidoId == 2 ? '<button title="Ver el Elemento de Vimeo" data-link="'+json[0].link+'" class="ver-elemento-vimeo btn btn-dark mx-2" tipoArchivo="'+row.tipoId+'" idElemento="'+row.idElementos+'"><i class="fab fa-vimeo"></i></button>' : '';
          
          return '<div class="d-flex"><button title="Edita el Elemento" class="editarElemento btn btn-dark mx-2" tipoContenidoId="'+tipoContenidoId+'" tipoContenido="'+row.tipoId+'" idElemento="'+row.idElementos+'"><i class="fas fa-pencil-alt"></i></button>'+buttoBackgrod+buttonVimeo+'<button title="Ver Elemento" class="ver-elemento btn btn-dark mx-2" tipoArchivo="'+row.tipoId+'" idElemento="'+row.idElementos+'"><i class="fas fa-play"></i></button><button title="Borra el Elemento" class="elimina-elemento btn btn-dark mx-2" idElemento="'+row.idElementos+'"><i class="fas fa-trash-alt"></i></button></div>';
        }
      },
    ],
	  	// "order": [[ 1, "desc" ]]
	});
	table.on( 'row-reorder', function ( e, diff, edit ) {
		for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
		   // get id row
		   let idQ = diff[i].node.id;
		   let idNewQ = idQ.replace("row_", "");
		   // get position
		   let position = diff[i].newPosition+100;
		   //call funnction to update data
		   updateOrder(idNewQ, position, e, edit);
		}
	   } );
	function updateOrder(idNewQ, position,e, edit) {
		console.log(idNewQ+' pos: '+position)
	}
  $('#listadoElementos').modal('show');
}


//Activa / Desactiva
$(document).on("click", ".btnActivar-elemento", function(){ 
  var idElemento =  $(this).attr("idElemento");
  var nuevoEstado =  $(this).attr("estadoElemento");
  var boton = $(this);
  var activa = {
    idElementos: idElemento,
    nuevoEstado: nuevoEstado
  }
  console.log(activa)
  var json = JSON.stringify(activa);
  $.ajax({
    url:"ajax/experiencia.ajax.php",
    method: "POST",
    data: {activaElemento: json},
    success: function (respuesta) {
      if(respuesta.includes("Modified")){
        if(nuevoEstado == 0){
           $(boton).removeClass('btn-dark');
           $(boton).addClass('btn-outline-dark');
           $(boton).html('Desactivado');
           $(boton).attr('estadoElemento', 1);
        }else{
            $(boton).addClass('btn-dark');
            $(boton).removeClass('btn-outline-dark');
            $(boton).html('Activado');
            $(boton).attr('estadoElemento',0);
        }
      }
    }
  });
})

// editar detalles de un elemento
$(document).on("click", ".editarElemento", function(){
	var idElemento = $(this).attr("idElemento");
  var tipocontenidoid = $(this).attr("tipocontenidoid");
  if(idElemento != ''){
    console.log(idElemento);
    $('.over').addClass('active-sp');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verElemento: idElemento},
      success: function (respuesta) {
        // window.location.reload();
        if(respuesta != ''){
          var json = JSON.parse(respuesta);
          console.log(json[0]);
          creaFuncionesDeModificarDetalleElemento(json[0], tipocontenidoid)
        }
      }
  	});
  }
})

//change free
$(document).on("click", ".change-free", function(){
  var idElemento = $(this).attr("idElemento");
  var nuevoEstado = $(this).attr("nuevoEstado");
  var boton = $(this);
  if(idElemento != ''){
    $('.over').addClass('active-sp');
    var dato = {
      idElemento: idElemento,
      esPreview: nuevoEstado
    }
    var json = JSON.stringify(dato);
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {cambiaFree: json},
      success: function (respuesta) {
        console.log(respuesta);
        if(respuesta.trim() == 'Modified'){
          $('.over').removeClass('active-sp');
          if(nuevoEstado == 0) {
            $(boton).attr('nuevoEstado',1)
          } else {
            $(boton).attr('nuevoEstado',0);
          }
        }
      }
    });
  }
})





// modifica background de un elemento
$(document).on("click", ".modificaBackground-elemento", function(){
	var idElemento = $(this).attr("idElemento");
  if(idElemento != ''){
    console.log(idElemento);
    // $('.over').css('display', 'block');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verElemento: idElemento},
      success: function (respuesta) {
        // window.location.reload();
        console.log(respuesta);
        if(respuesta != ''){ 
          var json = JSON.parse(respuesta);
          if(json[0].previewRuta != '') {
            //$('#preview-image-elemento-modif-back').append(`<img width= "100%" src="${json[0].previewRuta}"></img>`)
          }
          creaFunkcionModificaBackElemento(json[0]);
        }
      }
    })
  }
})


// borra un elemento
$(document).on("click", ".elimina-elemento", function(){
	var idElemento = $(this).attr("idElemento");
  if(idElemento != ''){
    console.log('Borra elemento: '+idElemento);
    
    // $('.over').css('display', 'block');
    // $.ajax({
    //   url:"ajax/experiencia.ajax.php",
    //   method: "POST",
    //   data: {verContenido: idElemento},
    //   success: function (respuesta) {
    //     // window.location.reload();
    //     console.log(respuesta);
    //     if(respuesta != ''){ 
    //       var json = JSON.parse(respuesta);
    //       if(json[0].previewRuta != '') {
    //         //$('#preview-image-elemento-modif-back').append(`<img width= "100%" src="${json[0].previewRuta}"></img>`)
    //       }
    //       creaFunkcionModificaBackElemento(json[0]);
    //     }
    //   }
    // })
  }
})


// ver un elemento
$(document).on("click", ".ver-elemento", function(){
	var idElemento = $(this).attr("idElemento");
  var tipoArchivo = $(this).attr("tipoArchivo");

  if(idElemento != ''){
    console.log('ver elemento: '+idElemento);
    $('.over').addClass('active-sp');
    $.ajax({
      url:"ajax/experiencia.ajax.php",
      method: "POST",
      data: {verVideoPost: idElemento},
      success: function (respuesta) {

        console.log(respuesta);

        // window.location.reload();
        if(respuesta != ''){ 
          muestraArchivo(tipoArchivo, respuesta, '');
        }
      }
    })
  }
})



//cierra modal y elimino
$('.close-verElemento').click(() => {
  $('#box-archivo').empty();
})




/********************************
 FUNCIONES 
*********************************/
function creaFuncionesDeModificarDetalleElemento(json, tipocontenidoid) {
  var elemento = json
  //$('.cont-icon-upload').css('display', 'none');

  $('.btn-detalles-ele-modifica').click((e) => {
    //var tipoContenido = $(this).attr('tipocontenido');
    e.preventDefault()
    $('.over').addClass('active-sp');

    var video = '';
    if($('#preview-exp-modif .video-fluid').length > 0){
      video = $('input[type=file]')[6].files[0];
      function random(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
      }
      var id = elemento.idElementos
      subirVideo(video, id);
    } else {
      guardaDatosElemento('');
    }
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
          if(respuesta.includes('Added')){
            $('.over').removeClass('active-sp');
            Swal.fire({
              icon: 'success',
              title: 'El elemento se ha modificado exitosamente',
            }).then((result) => {
              if (result.isConfirmed) {
                $('.over').addClass('active-sp');
                  window.location.reload();
              }
            })
          } 
        }
      });
    }

    function guardaDatosElemento(ruta){
      var nuevaRuta = ruta != '' ? ruta : elemento.previewRuta;
      var elementoModif = {
        idElementos: elemento.idElementos,
        contenidoId: elemento.contenidoId,
        tipoId: tipocontenidoid != 2 ? $('#tipo-archivo-modifica').val() : elemento.tipoId,
        previewTipoId: 1,
        previewRuta: nuevaRuta,
        titulo1: tipocontenidoid != 2 ? $('#titulo_es-ele-modifica').val() : elemento.titulo1,
        titulo2: tipocontenidoid != 2 ? $('#titulo_en-ele-modifica').val() : elemento.titulo2,
        subtitulo1: tipocontenidoid != 2 ? $('#subtitulo_es-ele-modifica').val() : elemento.subtitulo1,
        subtitulo2: tipocontenidoid != 2 ? $('#subtitulo_en-ele-modifica').val() : elemento.subtitulo2,
        descripcion1: tipocontenidoid != 2 ? $('#descripcion_es-ele-modifica').val() : elemento.descripcion1,
        descripcion2:  tipocontenidoid != 2 ? $('#descripcion_en-ele-modifica').val() : elemento.descripcion2,
        duracion: elemento.duracion,
        orden: tipocontenidoid != 2 ? $('#orden-ele-modifica').val() : elemento.orden,
        link: tipocontenidoid == 2 ? $('#link-addElemento-modif').val() : elemento.link
      }
      var json = JSON.stringify(elementoModif);
      console.log(elementoModif)
      $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {modificaElemento: json},
        success: function (respuesta) {
          // window.location.reload();
          if(respuesta != ''){ 
            if(respuesta.includes('Modified')){
              $('.over').removeClass('active-sp');
              Swal.fire({
                icon: 'success',
                title: 'El elemento se ha modificado exitosamente',
              }).then((result) => {
                if (result.isConfirmed) {
                  $('.over').addClass('active-sp');
                  window.location.reload();
                }
              })
            } else {
              $('.over').removeClass('active-sp');
              Swal.fire({
                icon: 'error',
                title: 'Se ha producido un error. Intente nuevamente',
              })
            }
          }
        }
      })
    }
  })
  if(tipocontenidoid != 2){
    $('#titulo_es-ele-modifica').val(json.titulo1)
    $('#titulo_en-ele-modifica').val(json.titulo2)
    $('#descripcion_es-ele-modifica').val(json.descripcion1)
    $('#descripcion_en-ele-modifica').val(json.descripcion2)
    $('#subtitulo_es-ele-modifica').val(json.subtitulo1)
    $('#subtitulo_en-ele-modifica').val(json.subtitulo2)
    $('#tipo-archivo-modifica').val(json.tipoId)
    $('#orden-ele-modifica').val(json.orden)
    $('.over').removeClass('active-sp');
    $('#subirElemento-modifica').modal('show');
  } else {
    $('#link-addElemento-modif').val(json.link)
    //$('#preview-exp-modif').append(`<video src=${json.ruta}></video>`)
    $('.over').removeClass('active-sp');
    $('#subirvideo-exp-modif').modal('show');
  }
  
}

function creaFunkcionModificaBackElemento(json) {
  var elemento = json;
  $('.guarda-elemento-modif-bk').click(()=>{
    // $('.over').css('opacity', '1');
    // $('.over').css('display', 'block');
    if($('#base64-modif-elemento').text() != '') {

      var imagenAnterior = elemento.rutaBackground;
      var elementoModif = {
        imagen: $('#base64-modif-elemento').text(),
        idElementos: elemento.idElementos,
        imagenAnterior: imagenAnterior
      }
      var json = JSON.stringify(elementoModif);
      $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {modificaBackgroundElemento: json},
        success:function(respuesta){ 
          if(respuesta.includes('ok')) {
            var jsonRespuesta =  JSON.parse(respuesta);
            elemento.previewRuta = jsonRespuesta.ruta;
            actualizaOtrosDatosElemento(elemento)
          } else {
            // $('.over').css('opacity', '0');
            // $('.over').css('display', 'none');
            Swal.fire({
              icon: 'error',
              title: 'Se produjo un error. Intente nuevamente',
            })
          }
        }
      });

      function actualizaOtrosDatosElemento(elemento) {

        console.log(elemento)
        var json = JSON.stringify(elemento);
        $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          data: {modificaElemento: json},
          success:function(respuesta){ 
              console.log(respuesta);
              if(respuesta.includes('Modified')){
                $('.over').css('opacity', '0');
                $('.over').css('display', 'none');
                Swal.fire({
                  icon: 'success',
                  title: 'El elemento se ha modificado exitosamente',
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
  $('#modifBackgroundElementos').modal('show');
}

function muestraArchivo(tipoArchivo, respuesta, link) {
  var padre = $('#box-archivo')
  if(link == '') {
    var video = `
      <div class="row mb-5">
        <div class="col">
          <div class="embed-responsive embed-responsive-16by9 border">
            <video id="video-test" class="video-fluid z-depth-1"  controls><source src="data:video/mp4;base64,${respuesta}#t=0.1"></source></video>
          </div>
        </div>
      </div>
    `;
    $(padre).append(video);
  } else if(tipoArchivo == 5) {
    var video = `
    <div class="row mb-5">
      <div class="col">
        <div class="embed-responsive embed-responsive-16by9 border">
          <embed  src="data:application/pdf;base64,${respuesta}"  type="application/pdf" width="100%" height="600px"/>
        </div>
      </div>
    </div>
    `;
    $(padre).append(video);
  } else if(tipoArchivo == 6) {
    var video = `
    <div class="row mb-5">
      <div class="col">
        <div class="embed-responsive embed-responsive-16by9 border">
        <iframe width="100%" height="550" src="https://player.vimeo.com/video/${link}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
        </div>
      </div>
    </div>
    `;
    $(padre).append(video);
  }
  $('.over').removeClass('active-sp');
  $('.modal-backdrop').css('z-index', '1050 !important');
  $('#verVideoModal').modal('show');
}

$(document).on("click", ".ver-elemento-vimeo", function(  ){ 
  var link = $(this).attr('data-link');
  var padre = $('#box-archivo')
  var video = `
  <div class="row mb-5">
    <div class="col">
      <div class="embed-responsive embed-responsive-16by9 border">
      <iframe width="100%" height="550" src="https://player.vimeo.com/video/${link}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
  `;
  $(padre).append(video);
  $('.over').removeClass('active-sp');
  $('.modal-backdrop').css('z-index', '1050 !important');
  $('#verVideoModal').modal('show');
})


