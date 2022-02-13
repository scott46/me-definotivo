<?php

  $categorias = json_decode(TablasControlador::crtMostrarTablas ('categorias', null,  $token), true);
  $tiposarchivos = json_decode(TablasControlador::crtMostrarTablas ('tipos', null,  $token), true);
  $tipoexperiencias = json_decode (TablasControlador::crtMostrarTablas ('tipoContenidos', null,  $token), true);
  $autores = json_decode (TablasControlador::crtMostrarTablas ('autores', null,  $token), true);

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
<div class="modal fade" id="modificaDetalleContenido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content h-100" style="min-height: 680px">

      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Modifica detalle del Contenido <span id="tituloContenido"></span></h4>
        <button type="button" class="btn-close close-modif-contenido" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" >

        <ul class="nav nav-tabs" >
          <li class="nav-item" role="presentation">
            <span disabled class="nav-link active"  id="one-tab-mc" data-bs-toggle="tab" data-bs-target="#tabprewiev-modifica"  role="tab" aria-controls="tabprewiev" aria-selected="false">Detalles</span>
          </li>
          <li class="nav-item " role="presentation">
            <span disabled class="nav-link " id="two-tab-mc" data-bs-toggle="tab" data-bs-target="#contact-modifica"  role="tab" aria-controls="tabprewiev" aria-selected="false">Mas Detalles</span>
          </li>
        </ul>

        <div class="tab-content border-top" id="myTabContent">

          <div class="tab-pane fade show active" id="tabprewiev-modifica" role="tabpanel" aria-labelledby="tabprewiev-tab" style="min-height: 680px">
            <div class="container">
              <div class="col-12">
                <form id="form-titulo">
                <label class="form-title my-3" for="">Detalles</label>
                <select class="form-select mb-3" id="autores-modifica" aria-label="Floating label select example">
                    <option value="">Seleccione un autor</option>
                    <?php foreach ($autores as $autor ) 
                      if($autor['activo'] == 1) {
                    { ?> 
                    <option value="<?= $autor['idAutores']?>"><?= $autor['nombre']?></option>
                    <?php }} ?> 
                  </select>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_es-modifica"></input>
                  <label for="floatingTextarea">Titulo del contenido en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_en-modifica"></input>
                  <label for="floatingTextarea">Titulo del contenido en Ingles</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_es-modifica" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_en-modifica" style="height:150px!important"></textarea>
                  <label for="floatingTextarea">Descripcion en Ingles</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_video_es-modifica"></input>
                  <label for="floatingTextarea">Titulo de los videos en Español</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="Leave a comment here" id="titulo_video_en-modifica"></input>
                  <label for="floatingTextarea">Titulo de los videos en Ingles</label>
                </div>
                <div class="d-flex justify-content-end pt-4 border-top">
                  <button class="btn btn-primary btn-titulos-modifica">Siguiente</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="contact-modifica" role="tabpanel" aria-labelledby="contact-tab" style="min-height: 680px">
            <div class="container">
              <form id="form-detalles">
              <div class="col-12">
                <label class="form-title my-3" for="">Detalles</label>
                <div class="form-floating mb-3">
                  <select class="form-select" id="categoria-modifica" aria-label="Floating label select example">
                    <option >Seleccione una categoria</option>
                    <?php foreach ($categorias as $categoria ) { ?> 
                    <option value="<?= $categoria['idCategorias']?>"><?= $categoria['titulo1']?></option>
                    <?php } ?> 
                  </select>
                  <label for="floatingSelect">Categoria</label>
                </div>
              </div>

              <div class="col-12">
                <label class="form-title my-3" for="">Tipo de Contenido</label>
                <div class="form-floating mb-3">
                  <select class="form-select" id="tipocontenido-modifica" aria-label="Floating label select example">
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
                  <input type="text" class="form-control" id="link-modifica" placeholder="Link Vimeo">
                  <label for="floatingInput">Link</label>
                </div>
              </div> -->

              <div class="col-12 mt-2">
                <div class="d-flex flex-column">
                  <label class="mb-3" for="floatingSelect">Tags <span class="text-danger">( Has doble-click para activarlos y o modificarlos )</span></label>
                      <!-- <input id="tags" type="text" data-role="tagsinput" /> -->
                  <input type="text" value="" id="tags-modifica" data-role="tagsinput" />  
                </div>
              </div>

              <div class="col-12">
                <label class="form-title my-3" for="">Vigencia</label>
                <div class="d-flex">
                  <div class="col-6 pl-0">

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="vigenciaDesde-modifica" placeholder="name@example.com">
                      <label for="floatingInput">Desde</label>
                    </div>

                  </div>
                  <div class="col-6 pr-0">

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="vigenciaHasta-modifica" placeholder="name@example.com">
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
                            <input type="number" name="" class="form-control" placeholder="$" id="precio_peso-modifica">
                            <label for="floatingTextarea">Pesos</label>
                          </div>
                        </div>
                        <div class="col-6 pr-0">
                          <div class="form-floating mb-3">
                            <input type="number" name="" class="form-control" placeholder="U$D" id="precio_dolar-modifica">
                            <label for="floatingTextarea">Dolares</label>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="col-4">
                      <label class="form-title my-3" for="">Orden</label>
                      <div class="form-floating mb-3">
                        <input type="number" name="" class="form-control" placeholder="Numero" id="orden-modifica">
                        <label for="floatingTextarea">Número de Orden</label>
                      </div>

                    </div>
                  </div>
                </div>
                </form>
              </div>

              <div class="col-12 mt-2">
                <div class="d-flex justify-content-between border-top" style="padding-top: 20px; margin-top: 20px">
                  <button class="btn btn-primary btn-detalles-atras">Atrás</button>
                  <button class="btn btn-primary btn-modifica">Guardar</button>
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
    height: 60px;
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


</style>

<script>
  $('.close-modif-contenido').click((e) => {
    window.location.reload();
  })
  // $('#tipocontenido-modifica').change((e) => {
  //   var tipo = $(e.target).val()
  //   if(tipo == 2) {
  //     $('#link-modifica').attr('disabled', false)
  //   } else {
  //     $('#link-modifica').attr('disabled', true)
  //     $('#link-modifica').addClass('no-detect')
  //   }
  // })
</script>