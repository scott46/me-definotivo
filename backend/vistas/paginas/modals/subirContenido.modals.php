<?php



  $categorias = json_decode(TablasControlador::crtMostrarTablas ('categorias', null, $token), true);
  $tiposarchivos = json_decode(TablasControlador::crtMostrarTablas ('tipos', null, $token), true);
  $tipoexperiencias = json_decode (TablasControlador::crtMostrarTablas ('tipoContenidos', null, $token), true);
  $autores = json_decode (TablasControlador::crtMostrarTablas ('autores', null ,$token), true);
  $rutaContenido = 'https://reinicia.com.ar/me/nuevo/backend/vistas/img/videos/';

  $contenidos = array(
    array(
      'id' => 1,
      'titulo' => 'CANAL'
    ),
    array(
      'id' => 2,
      'titulo' => 'EXPERIENCIA UNICA'
    ),

  );


?>
<!-- Modal -->
<div class="modal fade" id="subirContenido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content h-100" style="min-height: 680px">

      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Nuevo Contenido</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" >

        <ul class="nav nav-tabs">
          <li class="nav-item" role="presentation">
            <button disabled class="nav-link active"  id="one-tab" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Detalles</button>
          </li>
          <li class="nav-item" role="presentation">
            <button disabled class="nav-link " id="two-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Mas Detalles</button>
          </li>
          <li class="nav-item" role="presentation">
            <button disabled class="nav-link " id="three-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Background</button>
          </li>
          <li class="nav-item" role="presentation">
             <button disabled class="nav-link" id="five-tab" data-bs-toggle="tab" data-bs-target="#result" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Resultado</button>
          </li>

        </ul>

        <div class="tab-content border-top" id="myTabContent">



          <div class="tab-pane fade show active" id="tabprewiev" role="tabpanel" aria-labelledby="tabprewiev-tab" style="min-height: 680px">
            <div class="container">
              <div class="col-12">
                <form id="form-titulo">
                <label class="form-title my-3" for="">Detalles</label>
                <select class="form-select mb-3" id="autores" aria-label="Floating label select example">
                    <option value="">Seleccione un autor</option>
                    <?php foreach ($autores as $autor ) 
                      if($autor['activo'] == 1) {
                    { ?> 
                    <option value="<?= $autor['idAutores']?>"><?= $autor['nombre']?></option>
                    <?php }} ?> 
                  </select>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_es"></input>
                  <label for="floatingTextarea">Titulo del contenido en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_en"></input>
                  <label for="floatingTextarea">Titulo del contenido en Ingles</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_es" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_en" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Ingles</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_video_es"></input>
                  <label for="floatingTextarea">Titulo de los videos en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_video_en"></input>
                  <label for="floatingTextarea">Titulo de los videos en Ingles</label>
                </div>
                <div class="d-flex justify-content-end pt-4 border-top">
                  <button class="btn btn-primary btn-titulos">Siguiente</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" style="min-height: 680px">
            <div class="container">
              <form id="form-detalles">
              <div class="col-12">
                <label class="form-title my-3" for="">Detalles</label>
                <div class="form-floating mb-3">
                  <select class="form-select" id="categoria" aria-label="Floating label select example">
                    <option >Seleccione una categoria</option>
                    <?php foreach ($categorias as $categoria ) { ?> 
                    <option value="<?= $categoria['idCategorias']?>"><?= strtoupper($categoria['titulo1'])?></option>
                    <?php } ?> 
                  </select>
                  <label for="floatingSelect">Categoria</label>
                </div>
              </div>

              <div class="col-12">
                <label class="form-title my-3" for="">Tipo de Contenido</label>
                <div class="form-floating mb-3">
                  <select class="form-select" id="tipocontenido" aria-label="Floating label select example">
                    <option selected>Seleccione un contenido</option>
                    <?php foreach ($contenidos as $contenido ) { ?> 
                    <option value="<?= $contenido['id']?>"><?= $contenido['titulo']?></option>
                    <?php } ?> 
                  </select>
                  <label for="floatingSelect">Contenido</label>
                </div>
              </div>

              <!-- <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="link" placeholder="Link Vimeo" disabled>
                  <label for="floatingInput">Link</label>
                </div>
              </div> -->


              <div class="col-12 mt-2">
                <div class="d-flex flex-column">
                  <label class="mb-3" for="floatingSelect">Tags</label>
                      <!-- <input id="tags" type="text" data-role="tagsinput" /> -->
                  <input type="text" id="tags" data-role="tagsinput" />  
                </div>
              </div>

              <div class="col-12">
                <label class="form-title my-3" for="">Vigencia</label>
                <div class="d-flex">
                  <div class="col-6 pl-0">

                    <div class="form-floating mb-3">
                      <input type="datetime-local" class="form-control" id="vigenciaDesde" placeholder="name@example.com">
                      <label for="floatingInput">Desde</label>
                    </div>

                  </div>
                  <div class="col-6 pr-0">

                    <div class="form-floating mb-3">
                      <input type="datetime-local" class="form-control" id="vigenciaHasta" placeholder="name@example.com">
                      <label for="floatingInput">Hasta</label>
                    </div>

                  </div>
                </div>
              </div> 

              <div class="col-12">
                <div class="container">
                  <div class="row">

                    <div class="col-8">
                      <label class="form-title my-3" for="">Precio</label>
                      <div class="d-flex">
                        <div class="col-6 pl-0">
                          <div class="form-floating mb-3">
                            <input type="number" name="" class="form-control" placeholder="$" id="precio_peso">
                            <label for="floatingTextarea">Pesos</label>
                          </div>
                        </div>
                        <div class="col-6 pr-0">
                          <div class="form-floating mb-3">
                            <input type="number" name="" class="form-control" placeholder="U$D" id="precio_dolar">
                            <label for="floatingTextarea">Dolares</label>
                          </div>
                        </div>
                      </div>
                      </form>
                    </div>
                    <div class="col-4">
                      <label class="form-title my-3" for="">Orden</label>
                      <div class="form-floating mb-3">
                        <input type="number" name="" class="form-control" id="orden-add-contenido">
                        <label for="floatingTextarea">Orden</label>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


              <div class="col-12 mt-2">
                <div class="d-flex justify-content-between border-top" style="padding-top: 20px; margin-top: 20px">
                  <button class="btn btn-primary btn-detalles-atras">Atrás</button>
                  <button class="btn btn-primary btn-detalles">Siguiente</button>
                </div>
              </div>

            </div>
          </div>

          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" >
            <div class="container">
              <div class="container cont-icon-upload-image" style="height: 405px;">
                  <label class="form-title my-3" for="">Seleccione la portada de la categoria</label>

                  <div class="box-icon-image">
                      <label class="btn btn-default btn-file-imagen">
                          <i class="far fa-image"></i><input type="file" id="subir-imagen" style="display: none;" required>
                      </label>
                      <!-- <div id="preview-image-categoria-modif-back" ></div> -->
                      <!-- editor -->
                      <div id="editor-add-contenido"></div>
                      <canvas id="preview-ca-add-contenido"></canvas>
                      <code class="d-none" id="base64-add-contenido"></code>
                  </div>

              </div>
            </div>

            <div class="d-flex justify-content-between border-top px-3" style="margin-top: 103px; padding-top: 30px">
              <button class="btn btn-primary btn-image-atras">Atrás</button>
              <button class="btn btn-primary btn-image">Guardar</button>
            </div>
          </div>

          <div class="tab-pane fade " id="result" role="tabpanel" aria-labelledby="home-result" style="min-height: 400px">
            <div class="container h-100">
              <div class="row h-100 align-items-center">
                
                <div class="col-12 mb-4 text-center">
                  <label class="form-title pb-4 pt-2 mb-2 mt-4">Aguarde un momento, por favor. Se esta generando el contenido. <br> No cierre la ventana hasta que este proceso no haya finalizado.</label>
                </div>
                <div class="col-12 d-flex flex-column justify-content-center">
                  <div class="d-flex align-items-center" style="height: 140px !important;">
                    <div class="col-6 px-4 text-right">
                      <label class="form-title mb-0">Guardando datos del contenido</label>
                    </div>

                    <div class="col-6 text-center" id="box-carga-datos">
                      <!-- remueve cuando se complete -->
                      <div class="loader loader--style2" id="loading-carga-datos" title="1">
                        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           width="70px" height="60px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                        <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                          <animateTransform attributeType="xml"
                            attributeName="transform"
                            type="rotate"
                            from="0 25 25"
                            to="360 25 25"
                            dur="0.6s"
                            repeatCount="indefinite"/>
                          </path>
                        </svg>
                      </div><!-- remueve cuando se complete -->
                      <!-- lo mete una vez que esta ok -->
                      <div id="loading-carga-datos-ok" style="display: none">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve" width="100px" height="60px">
                          <defs></defs></style>
                          <circle class="ok circle" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" cx="16" cy="16" r="12"/>
                          <polyline class="ok check" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" points="23,12 15,20 10,15 "/>
                        </svg>
                      </div><!-- lo mete una vez que esta ok -->

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>
</div>
  
<style>
  .bootstrap-tagsinput {
    height: 100px !important;
    padding: 15px 15px;
    line-height: 35px
  }
  .bootstrap-tagsinput .tag {
    background: #333;
    padding: 2px 10px;
    border-radius: 10px;
    margin:  10px 3px;
  }
  #preview-ca-add-contenido {
    position: relative;
    overflow: hidden;
    height: 380px;
    object-fit: contain;
    display: none;
    margin-top: 40px;
  }
  .cont-icon-upload, .cont-icon-upload-image {
    height: 500px
  }
  .box-icon label, .box-icon-image label{
    padding: 30px;
    border-radius: 50%;
  }
  .box-icon, .box-icon-image {
    width: fit-content;
    margin-top: 100px;
  }
  .box-icon label i, .box-icon-image label i{
    font-size: 80px
  }
  .btn-clear-imagen-modif-bk {
    width: 40px;
    height: 40px;
    background: red;
  }
  .box-tag {
    width: fit-content;
    border: 1px solid #333;
    border-radius: 10px;
    padding: 1px 5px;
    font-size: 12px;
    text-transform: uppercase;
    background: #333;
    color:  #fff;
  }
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
  }
  .loader{
  margin: 0 0 2em;
  text-align: center;
  padding: 1em;
  margin: 0 auto 1em;
  display: inline-block;
  vertical-align: top;
  }
  /*
    Set the color of the icon
  */
  svg path,
  svg rect{
    fill: #FF6700;
  }
  svg {
    display: inline-block;
  }
  .ok {
    stroke-dasharray: 1000;
    stroke-dashoffset: 0;
  }

  .ok.circle {
    animation: ok-dash 2s ease-in;
  }
  .ok.check {

    stroke-dashoffset: -100;
    animation: ok-dash-check 3.5s 0.05s ease-in forwards;
  }
  @keyframes ok-dash {
    0% {
      stroke-dashoffset: 1000;
    }
    100% {
      stroke-dashoffset: 0;
    }
  }
  @keyframes ok-dash-check {
    0% {
      stroke-dashoffset: -100;
    }
    100% {
      stroke-dashoffset: 900;
    }
  }
  .nav-item:hover {
    border-color: 0 !important;
  }
  #profile .box-icon-image {
    height: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 0px;
  }
  #editor-add-contenido .croppr-container {
    width: 100%;
    height: 100%;
  }
  #editor-add-contenido .croppr-container .croppr{
      height: 100%;
  }
  #editor-add-contenido .croppr-container .croppr img{
      height: 100%;
  }

</style>
<script>

  $('.btn-detalles-atras').click(() => {
    $('#tabprewiev').addClass('show active');
    $('#contact').removeClass('show active');
    $('#one-tab').addClass('active');
    $('#two-tab').removeClass('active');
  })
  $('.btn-image-atras').click(() => {
    $('#contact').addClass('show active');
    $('#profile').removeClass('show active');
    $('#two-tab').addClass('active');
    $('#three-tab').removeClass('active');
  })

  $('.btn-titulos').click((e)=>{
    e.preventDefault();
    //controla y pasa
    var estado = 0;
    $('#tabprewiev input').each((i, e) => {
      if($(e).val() == ''){
        estado += 1;
      }
    })
    $('#tabprewiev select').each((i, e) => {
      if($(e).val() == ''){
        estado += 1;
      }
    })
    $('#tabprewiev textarea').each((i, e) => {
      if($(e).val() == ''){
        estado += 1;
      }
    })
    if(estado == 0) {
      $('#tabprewiev').removeClass('show active');
      $('#contact').addClass('show active');
      $('#one-tab').removeClass('active');
      $('#two-tab').addClass('active');
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son requeridos',
      })
    }
  })
  $('.btn-detalles').click((e)=>{
    e.preventDefault();
    //controla y pasa
    var estadoContact = 0;
    $('.bootstrap-tagsinput input').addClass('no-detect')
    $('#contact input').each((i, e) => {
      if(!$(e).hasClass('no-detect')) {
        if($(e).val() == ''){
          estadoContact += 1;
        }
      }
    })
    $('#contact select').each((i, e) => {
      if($(e).val() == ''){
        estadoContact += 1;
      }
    })
    $('#contact textarea').each((i, e) => {
      if($(e).val() == ''){
        estadoContact += 1;
      }
    })
    if(estadoContact == 0) {
      $('#contact').removeClass('show active');
      $('#profile').addClass('show active');
      $('#two-tab').removeClass('active');
      $('#three-tab').addClass('active');
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son requeridos',
      })
    }
  })

  $('.btn-close').click((e) => {
    window.location.reload(); 
  })

  $('.btn-clear').click((e) => {
    console.log('borra');
  })

  $(function() {
  var current_progress = 0;
  var interval = setInterval(function() {
      current_progress += 10;
      $("#dynamic")
      .css("width", current_progress + "%")
      .attr("aria-valuenow", current_progress)
      .text(current_progress + "% Complete");
      if (current_progress >= 100)
          clearInterval(interval);
  }, 1000);
});


 

   document.getElementById("subir-imagen").onchange = function(e) {
    // controlamos que sea un jpg
    var archivo = e.target.files[0]
    if(archivo.type == 'image/jpeg') {
      // Creamos el objeto de la clase FileReader
      $('.btn-file-imagen').css('display', 'none');
      const editor = document.querySelector('#editor-add-contenido');
      $(editor).addClass('w-100 h-100 text-center')
      const miCanvas = document.querySelector('#preview-ca-add-contenido');
      const contexto = miCanvas.getContext('2d');
      abrirEditor(e)
      function abrirEditor(e) {
          // Obtiene la imagen
          urlImage = URL.createObjectURL(e.target.files[0]);
          // Borra editor en caso que existiera una imagen previa
          editor.innerHTML = '';
          let cropprImg = document.createElement('img');
          cropprImg.setAttribute('id', 'croppr');
          editor.appendChild(cropprImg);
          // Limpia la previa en caso que existiera algún elemento previo
          contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);
          // Envia la imagen al editor para su recorte
          document.querySelector('#croppr').setAttribute('src', urlImage);
          // Crea el editor
          new Croppr('#croppr', {
              //aspectRatio: 80 / 640,
              aspectRatio: 360 / 640,
              startSize: [70, 70],
              onCropEnd: recortarImagen
          })
      }
      function recortarImagen(data) {
          // Variables
          const inicioX = data.x;
          const inicioY = data.y;
          const nuevoAncho = data.width;
          const nuevaAltura = data.height;
          const zoom = 1;
          let imagenEn64 = '';
          // La imprimo
          miCanvas.width = nuevoAncho;
          miCanvas.height = nuevaAltura;
          // La declaro
          let miNuevaImagenTemp = new Image();
          // Cuando la imagen se carge se procederá al recorte
          miNuevaImagenTemp.onload = function() {
              // Se recorta
              contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
              // Se transforma a base64
              imagenEn64 = miCanvas.toDataURL("image/jpeg");
              // Mostramos el código generado
              document.querySelector('#base64-add-contenido').textContent = imagenEn64;
          }
          // Proporciona la imagen cruda, sin editarla por ahora
          miNuevaImagenTemp.src = urlImage;
      }
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Solo se deben seleccionar archivos .jpg',
      })
    }
  }



  $('.btn-image').click(() => {
    if($('#base64-add-contenido').text() != '') {

      $('#profile').removeClass('show active');
      $('#result').addClass('show active');
      $('#three-tab').removeClass('active');
      $('#five-tab').addClass('active');

      var experiencia = {
        titulo1: $('#titulo_es').val(),  
        titulo2: $('#titulo_en').val(),  
        descripcion1: $('#descripcion_es').val(),  
        descripcion2: $('#descripcion_en').val(),  
        keyword1: $('#tags').val(),
        keyword2: "key2",
        precioPesos: parseInt($('#precio_peso').val()),
        precioDolares: parseInt($('#precio_dolar').val()),
        tipoId: 1,
        categoriaId: $('#categoria').val(),
        autorId: parseInt($('#autores').val()),
        previewTipoId: 1,
        previewRuta: '',
        activo: 0,
        tipoContenidoId: $('#tipocontenido').val(),
        orden: $('#orden-add-contenido').val(),
        vigenciaDesde: $('#vigenciaDesde').val().replace('T', ' '),
        vigenciaHasta: $('#vigenciaHasta').val().replace('T', ' '),
        duracionSuscripcion: 30,
        tituloVideos1: $('#titulo_video_es').val(),
        tituloVideos2: $('#titulo_video_en').val(),
        imagen: $('#base64-add-contenido').text(),
        link: $('#link').val(),
      }

      console.log(experiencia);
      var json = JSON.stringify(experiencia);


      $.ajax({
        url:"ajax/experiencia.ajax.php",
        method: "POST",
        data: {subirCont: json},
        success:function(respuesta){ 
          console.log(respuesta);
          if(respuesta.includes('id') && !respuesta.includes('Forbidden')){
            var id = respuesta.split('-');
            console.log(id);
            document.getElementById("loading-carga-datos").remove();
            document.getElementById("loading-carga-datos-ok").style.display = "block";
            $('#three-tab').removeClass('progreso-proximo');
            $('#five-tab').removeClass('progreso-proximo');
            $('#five-tab').addClass('progreso-ok');
            // subirVideo($('input[type=file]')[1].files[0], id[1]);  
            Swal.fire({
              icon: 'success',
              title: 'El contenido se ha creado exitosamente',
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

        console.log('subiendo archivo');

        $.ajax({
          url:"ajax/experiencia.ajax.php",
          method: "POST",
          processData: false,
          contentType:false,
          cache:false,
          data: formData,
          success:function(respuesta){ 
          if(respuesta.includes('fieldname')){
            document.getElementById("loading-video").remove();
            document.getElementById("loading-video-ok").style.display = "block";
          }
          }
        });

      }
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Todos los datos son requeridos',
      })
    }
  });

  // $('#tipocontenido').change((e) => {
  //   var tipo = $(e.target).val()
  //   if(tipo == 2) {
  //     $('#link').attr('disabled', false)
  //   } else {
  //     $('#link').attr('disabled', true)
  //     $('#link').addClass('no-detect')
  //   }
  // })


</script>