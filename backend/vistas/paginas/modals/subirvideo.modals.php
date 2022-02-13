<?php
$categorias = json_decode(TablasControlador::crtMostrarTablas ('categorias', null, $token), true);
$tiposarchivos = json_decode(TablasControlador::crtMostrarTablas ('tipos', null, $token), true);
$tipoexperiencias = json_decode (TablasControlador::crtMostrarTablas ('tipoContenidos', null, $token), true);
$rutaContenido = 'https://reinicia.com.ar/me/nuevo/backend/vistas/img/videos/';
?>

<!-- Modal -->
<div class="modal fade" id="subirvideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content h-100" style="min-height: 480px">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Nuevo Elemento de Canal</h5>
        <button type="button" class="btn-close close-elemento" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >

        <ul class="nav nav-tabs">
          <li class="nav-item" >
            <button disabled class="nav-link active" id="one-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Detalles</button>
          </li>
          <li class="nav-item" >
            <button disabled class="nav-link " id="two-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Mas Detalles</button>
          </li>
          <li class="nav-item" >
            <button disabled class="nav-link " id="three-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Background</button>
          </li>
          <li class="nav-item" >
             <button disabled class="nav-link " id="four-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false"></button>
          </li>
          <li class="nav-item" >
             <button disabled class="nav-link " id="five-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Resultado</button>
          </li>
        </ul>

        <div class="tab-content border-top" id="myTabContent">
          <div class="tab-pane fade show active" id="tabprewiev-ele" role="tabpanel" aria-labelledby="tabprewiev-tab" style="min-height: 480px">
            <div class="container">
              <div class="col-12">
                <form id="form-titulo">
                <label class="form-title my-3" for="">Detalles</label>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_es-ele"></input>
                  <label for="floatingTextarea">Titulo en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_en-ele"></input>
                  <label for="floatingTextarea">Titulo en Ingles</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_es-ele" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_en-ele" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Ingles</label>
                </div>
                <div class="d-flex justify-content-end pt-4 border-top">
                  <button class="btn btn-primary btn-titulos-ele">Siguiente</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="contact-ele" role="tabpanel" aria-labelledby="contact-tab" style="min-height: 480px">
            <div class="container">
              <form id="form-detalles">
                <div class="col-12">
                  <label class="form-title my-3" for="">Detalles</label>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Leave a comment here" id="subtitulo_es-ele"></input>
                    <label for="floatingTextarea">SubTitulo en Español</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Leave a comment here" id="subtitulo_en-ele"></input>
                    <label for="floatingTextarea">SubTitulo en Ingles</label>
                  </div>
                </div>
                <div class="col-12" id="input-tipoExperiencia-add">
                  <label class="form-title my-3" for="">Tipo de Experiencia</label>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="tipo-archivo" aria-label="Floating label select example">
                      <option value="">Seleccione Tipo de Archivo</option>
                      <?php foreach ($tiposarchivos as $tiposarchivo) { if($tiposarchivo['idTipos'] != 6){?>
                      <option value="<?= $tiposarchivo['idTipos'] ?>"><?= $tiposarchivo['descripcion1'] ?></option>
                      <?php }}?>
                    </select>
                    <label for="floatingSelect">Tipo de Archivo</label>
                  </div>
                </div> 
                <div class="col-12 mt-2">
                  <div class="d-flex justify-content-between border-top" style="padding-top: 20px; margin-top: 48px">
                    <button class="btn btn-primary btn-detalles-atras">Atrás</button>
                    <button class="btn btn-primary btn-detalles-ele">Siguiente</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="tab-pane fade" id="profile-ele" role="tabpanel" aria-labelledby="profile-tab" >
            <div class="container cont-icon-upload-image">
              <label class="form-title my-3" for="">Seleccione la portada del Elemento</label>

              <div class="box-icon-image">
                <label class="btn btn-default btn-file-imagen">
                  <i class="far fa-image"></i><input type="file" id="subir-imagen-ele" style="display: none;" required>
                </label>
                <div id="editor-add-ele"></div>
                <canvas id="preview-ca-add-ele"></canvas>
                <code class="d-none" id="base64-add-ele"></code>
              </div>

            </div>
            <div class="d-flex justify-content-between border-top px-3" style="padding-top: 30px">
              <button class="btn btn-primary btn-image-atras">Atrás</button>
              <button class="btn btn-primary btn-image-ele">Siguiente</button>
            </div>
          </div>

          <div class="tab-pane fade " id="home-ele" role="tabpanel" aria-labelledby="home-tab" style="min-height: 480px">
            <div class="container cont-icon-upload">
              <label class="form-title my-3" for="">Sube el Elemento</label>
              <div class="row h-100 justify-content-center align-content-center">
                  <div class="box-icon">
                    <label class="btn btn-default btn-file">
                      <i class="fas fa-upload"></i><input type="file" id="subir-video-ele" name="video" style="display: none;" required enctype="multipart/form-data">
                    </label>
                    <div id="preview" ></div>
                  </div>
              </div>
            </div>
            <div class="d-flex justify-content-between border-top px-3" style="margin-top: 103px; padding-top: 30px">
              <button class="btn btn-primary btn-video-atras">Atrás</button>
              <button class="btn btn-primary btn-video">Guardar</button>
            </div>
          </div>

          <div class="tab-pane fade " id="result-ele" role="tabpanel" aria-labelledby="home-result" style="min-height: 480px">
            <div class="container h-100">
              <div class="row h-100 align-items-center">
                <div class="col-12 mb-4 text-center">
                  <label class="form-title pb-4 pt-2 mb-2 mt-4">Aguarde un momento, por favor. Se estan generando el elemento. <br> No cierre la ventana hasta que este proceso no haya finalizado.</label>
                </div>
                <div class="col-12 d-flex flex-column justify-content-center" style="margin-bottom: 40px;">
                  <div class="d-flex align-items-center">
                    <div class="col-6 px-4 text-right">
                      <label class="form-title mb-0">Guardando datos del elemento</label>
                    </div>
                    <div class="col-6 text-center" id="box-carga-datos">
                      <!-- remueve cuando se complete -->
                      <div class="loader loader--style2" id="loading-carga-datos-ele" title="1">
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
                      <div id="loading-carga-datos-ok-ele" style="display: none">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve" width="100px" height="60px">
                          <defs></defs></style>
                          <circle class="ok circle" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" cx="16" cy="16" r="12"/>
                          <polyline class="ok check" fill="none" stroke="#28a745" stroke-width="2" stroke-miterlimit="10" points="23,12 15,20 10,15 "/>
                        </svg>
                      </div><!-- lo mete una vez que esta ok -->
                    </div>
                  </div>
                </div>
                <div class="col-12 h-25 d-flex flex-column justify-content-center">
                  <div class="d-flex align-items-center">
                    <div class="col-6 px-4 text-right">
                      <label class="form-title mb-0">Guardando video</label>
                    </div>
                    <div class="col-6 text-center" id="box-loading-video">
                      <!-- remueve cuando se complete -->
                      <div class="loader loader--style2" id="loading-video" >
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
                      <div class="loading-ok" style="display: none" id="loading-video-ok">
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
.nav-tabs-progress {
  display: flex;
  justify-content: space-between;
  padding:  20px 65px;
  list-style:none;
  margin-bottom: 0;
}
.nav-item-progress {
  border-radius: 50%;
  font-size: 17px;
}
.nav-item-progress span{
  border-radius: 50%;
  font-weight: bold;
  padding: 6px 14px;
  transition: 0.3s all;
}
.bootstrap-tagsinput {
  height: 130px;
  padding: 15px 15px;
  line-height: 35p
}
.bootstrap-tagsinput .tag {
  background: #333;
  padding: 2px 10px;
  border-radius: 10px;
  margin:  10px 3px;
}
.cont-icon-upload, .cont-icon-upload-image {
  height: 500px
}
.box-icon label, .box-icon-image label{
  padding: 30px;
  border-radius: 50%;
}
/*.box-icon, .box-icon-image {
  width: fit-content
}*/
#profile-ele .box-icon-image {
    height: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 0px;
}
  #editor-add-ele .croppr-container {
    width: 100%;
    height: 100%;
  }
  #editor-add-ele .croppr-container .croppr{
      height: 100%;
  }
  #editor-add-ele .croppr-container .croppr img{
      height: 100%;
  }
.box-icon label i, .box-icon-image label i{
  font-size: 80px
}
.progress {
  margin: 20px;
  width: 400px;
  height: 30px;
  font-size: 18px;
  padding: 0
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
.video-fluid {
  width: 100%;
  height: auto;
}
#preview-ca-add-ele {
  position: relative;
  overflow: hidden;
  height: 200px;
  object-fit: contain;
  display: none;
}
.cont-icon-upload, .cont-icon-upload-image {
  height: 500px
}
.box-icon label, .box-icon-image label{
  padding: 30px;
  border-radius: 50%;
}
.box-icon, .box-icon-image {
  width: fit-content
}
.box-icon label i, .box-icon-image label i{
  font-size: 80px
}
.image-portada {
  height: 480px;
  width: auto;
}
.loader{
  margin: 0 0 2em;
  text-align: center;
  padding: 1em;
  margin: 0 auto 1em;
  display: inline-block;
  vertical-align: top;
}

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
</style>
<script>
$('.btn-detalles-atras').click((e) =>{
  e.preventDefault();
  $('#tabprewiev-ele').addClass('show active');
  $('#contact-ele').removeClass('show active');
  $('#two-tab-ele').removeClass('active');
  $('#one-tab-ele').addClass('addClass');
})
$('.btn-image-atras').click((e) =>{
  e.preventDefault();
  $('#contact-ele').addClass('show active');
  $('#profile-ele').removeClass('show active');
  $('#three-tab-ele').removeClass('active');
  $('#two-tab-ele').addClass('active');
})
$('.btn-video-atras').click((e) =>{
  e.preventDefault();
  $('#profile-ele').addClass('show active');
  $('#home-ele').removeClass('show active');
  $('#two-tab-ele').removeClass('active');
  $('#one-tab-ele').addClass('addClass');
})
$('.close-elemento').click(() => {
  // $('#myTabContent input').val("")
  // $('#myTabContent textarea').val("")
  // $('#preview').empty()
  window.location.reload();
})
$('.btn-titulos-ele').click((e)=>{
  e.preventDefault();
  var estadoContact = 0;
  $('#tabprewiev-ele input').each((i, e) => {
    console.log(e);
    if($(e).val() == ''){
      estadoContact += 1;
    }
  })
  $('#tabprewiev-ele textarea').each((i, e) => {
    if($(e).val() == ''){
      estadoContact += 1;
    }
  })
  if(estadoContact == 0) {
    $('#tabprewiev-ele').removeClass('show active');
    $('#contact-ele').addClass('show active');
    $('#one-tab-ele').removeClass('active');
    $('#two-tab-ele').addClass('active');
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Todos los datos son requeridos',
    })
  }
})
$('.btn-detalles-ele').click((e)=>{
  e.preventDefault();
  var estadoDetalle = 0;
  $('#contact-ele input').each((i, e) => {
    if($(e).val() == ''){
      estadoDetalle += 1;
    }
  })
  $('#contact-ele select').each((i, e) => {
    if($(e).val() == ''){
      estadoDetalle += 1;
    }
  })
  if(estadoDetalle == 0) {
    $('#contact-ele').removeClass('show active');
    $('#profile-ele').addClass('show active');
    $('#two-tab-ele').removeClass('active');
    $('#three-tab-ele').addClass('active');
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Todos los datos son requeridos',
    })
  }
})
$('.btn-image-ele').click((e)=>{
  e.preventDefault();
  var estadoContact = 0;
  if($('#base64-add-ele').text() == '') {
    estadoContact += 1;
  }
  if(estadoContact == 0) {
  //controla y pasa
    $('#profile-ele').removeClass('show active');
    $('#home-ele').addClass('show active');
    $('#three-tab-ele').removeClass('active');
    $('#four-tab-ele').addClass('active');
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Debe seleccionar una imagen',
    })
  }
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


document.getElementById("subir-video-ele").onchange = function(e) {
  $('.btn-file').css('display', 'none');
    let reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
        let preview = document.getElementById('preview'),
        video = document.createElement('video');
        video.className = 'video-fluid z-depth-1';
        video.setAttribute('controls', '');
        var source = document.createElement('source');
        source.src = reader.result;
        video.append(source);
        preview.innerHTML = '';
        preview.append(video);
        //$('#preview').append('<div><button type="button" class="ctPreview btn-clear">X</button></div>');
    };
}

document.getElementById("subir-imagen-ele").onchange = function(e) {
  $('.btn-file-imagen').css('display', 'none');
  const editor = document.querySelector('#editor-add-ele');
  $(editor).addClass('w-100 h-100 text-center')
  const miCanvas = document.querySelector('#preview-ca-add-ele');
  const contexto = miCanvas.getContext('2d');
  abrirEditor(e)
  function abrirEditor(e) {
      urlImage = URL.createObjectURL(e.target.files[0]);
      editor.innerHTML = '';
      let cropprImg = document.createElement('img');
      cropprImg.setAttribute('id', 'croppr');
      editor.appendChild(cropprImg);
      contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);
      document.querySelector('#croppr').setAttribute('src', urlImage);
      new Croppr('#croppr', {
          //aspectRatio: 80 / 640,
          aspectRatio: 360 / 640,
          startSize: [70, 70],
          onCropEnd: recortarImagen
      })
  }
  function recortarImagen(data) {
      const inicioX = data.x;
      const inicioY = data.y;
      const nuevoAncho = data.width;
      const nuevaAltura = data.height;
      const zoom = 1;
      let imagenEn64 = '';
      miCanvas.width = nuevoAncho;
      miCanvas.height = nuevaAltura;
      let miNuevaImagenTemp = new Image();
      miNuevaImagenTemp.onload = function() {
          contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
          imagenEn64 = miCanvas.toDataURL("image/jpeg");
          document.querySelector('#base64-add-ele').textContent = imagenEn64;
      }
      miNuevaImagenTemp.src = urlImage;
  }
}
</script>