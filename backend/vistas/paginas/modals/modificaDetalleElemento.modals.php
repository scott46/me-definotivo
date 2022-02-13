<?php
  $categorias = json_decode(TablasControlador::crtMostrarTablas ('categorias', null,  $token), true);
  $tiposarchivos = json_decode(TablasControlador::crtMostrarTablas ('tipos', null,  $token), true);
  $tipoexperiencias = json_decode (TablasControlador::crtMostrarTablas ('tipoContenidos', null,  $token), true);
  $rutaContenido = 'https://reinicia.com.ar/me/nuevo/backend/vistas/img/videos/';
?>
<!-- Modal -->
<div class="modal fade" id="subirElemento-modifica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content h-100" style="min-height: 480px">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modifica Elemento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >

        <ul class="nav nav-tabs">
          <li class="nav-item" >
            <span disabled class="nav-link active" id="one-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Detalles</span>
          </li>
          <li class="nav-item" >
            <span disabled class="nav-link " id="two-tab-ele" data-bs-toggle="tab" data-bs-target="#tabprewiev" type="button" role="tab" aria-controls="tabprewiev" aria-selected="false">Mas detalles</span>
          </li>
        </ul>

        <div class="tab-content border-top" id="myTabContent">

          <div class="tab-pane fade show active" id="tabprewiev-ele-modifica" role="tabpanel" aria-labelledby="tabprewiev-tab" style="min-height: 480px">
            <div class="container">
              <div class="col-12">
                <form id="form-titulo">
                <label class="form-title my-3" for="">Detalles</label>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_es-ele-modifica"></input>
                  <label for="floatingTextarea">Titulo en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_en-ele-modifica"></input>
                  <label for="floatingTextarea">Titulo en Ingles</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_es-ele-modifica" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_en-ele-modifica" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Ingles</label>
                </div>
                <div class="d-flex justify-content-end pt-4 border-top">
                  <button class="btn btn-primary btn-titulos-ele-modifica">Siguiente</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="contact-ele-modifica" role="tabpanel" aria-labelledby="contact-tab" style="min-height: 480px">
            <div class="container">
              <form id="form-detalles">
              <div class="col-12">
                <label class="form-title my-3" for="">Detalles</label>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="subtitulo_es-ele-modifica"></input>
                  <label for="floatingTextarea">SubTitulo en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="subtitulo_en-ele-modifica"></input>
                  <label for="floatingTextarea">SubTitulo en Ingles</label>
                </div>
              </div>
              <div class="col-12" id="input-tipoExperiencia">
                <label class="form-title my-3" for="">Tipo de Experiencia</label>
                <div class="form-floating mb-3">
                  <select class="form-select" id="tipo-archivo-modifica" aria-label="Floating label select example">
                    <option value="">Seleccione Tipo de Archivo</option>
                    <?php foreach ($tiposarchivos as $tiposarchivo) { ?>
                    <option value="<?= $tiposarchivo['idTipos'] ?>"><?= $tiposarchivo['descripcion1'] ?></option>
                    <?php } ?>
                  </select>
                  <label for="floatingSelect">Tipo de Archivo</label>
                </div>
              </div> 
              <div class="col-3">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" placeholder="Leave a comment here" id="orden-ele-modifica"></input>
                  <label for="floatingTextarea">Orden</label>
                </div>
              </div> 
              <div class="col-12 mt-2">
                <div class="d-flex justify-content-between border-top" style="padding-top: 20px; margin-top: 48px">
                  <button class="btn btn-primary btn-detalles-atras-modifica">Atrás</button>
                  <button class="btn btn-primary btn-detalles-ele-modifica">Guardar</button>
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
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
  }
</style>
<script>
$('.btn-titulos-ele-modifica').click((e)=>{
  e.preventDefault();
  $('#tabprewiev-ele-modifica').removeClass('show active');
  $('#contact-ele-modifica').addClass('show active');
})
$('.btn-detalles-atras-modifica').click((e) => {
  e.preventDefault();
  $('#tabprewiev-ele-modifica').addClass('show active');
  $('#contact-ele-modifica').removeClass('show active');
})
</script>