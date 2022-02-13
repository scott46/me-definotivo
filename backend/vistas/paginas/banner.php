<div class="content-wrapper" style="min-height: 717px;">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10">
          <h1>ME Banners</h1>
        </div>
        <div class="col-sm-2">
          <div class="row px-2" style="justify-content: flex-end">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#crearBanner"><i class="fas fa-plus px-2"></i>Nuevo Banner</button>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <!-- <div class="card card-dark card-outline">
            <div class="card-header">
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#crearBanner">Crear nuevo banner</button> 
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped dt-responsive tablaBanner" width="100%">
                <thead>
                  <tr>
                    <th style="width:10px">#</th> 
                    <th>Banner</th>
                    <th>Orden</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Link</th>
                    <th>Estado</th>
                    <th style="width:100px">Acciones</th>          
                  </tr>   
                </thead>
                <tbody>
                 <!--  <tr>
                    <td>1</td> 
                    <td>
                      <img src="vistas/img/banner/banner01.jpg" class="img-fluid">
                    </td> 
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btn-sm">
                          <i class="fas fa-pencil-alt text-white"></i>
                        </button>  
                        <button class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i>
                        </button>  
                      </div>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          <!-- </div> -->
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<!--=====================================
Modal Crear Banner
======================================-->
<div class="modal fade" id="crearBanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title">Crear Banner</h4>
          <button type="button" class="btn-close close-autor" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" >

          <div class="box-icon-image border text-center mb-3" style="position: relative;display: flex;justify-content: center;align-items: center;">
            <label class="btn btn-default btn-file-imagen-banner"><i class="far fa-image"></i><input type="file" class="form-control-file d-none" name="subirBanner" required></label>
            <img class="previsualizarBanner img-fluid" style="height: 400px; position: inherit;">
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="bannertitulo1" placeholder="name@example.com">
            <label for="floatingInput">Titulo Español</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="bannertitulo2" placeholder="name@example.com">
            <label for="floatingInput">Titulo Ingles</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="bannersubtitulo1" placeholder="name@example.com">
            <label for="floatingInput">Subtitulo Español</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="bannersubtitulo2" placeholder="name@example.com">
            <label for="floatingInput">Subtitulo Ingles</label>
          </div>
          <div class="form-floating mb-3">
            <input type="numbre" class="form-control" name="bannerOrden" placeholder="name@example.com">
            <label for="floatingInput">Orden</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="bannerLink" placeholder="name@example.com">
            <label for="floatingInput">Link</label>
          </div>

        <?php

            $token = json_decode($_SESSION["tokenBack"], true);
            $registroBanner = new ControladorBanner();
            $registroBanner -> ctrRegistroBanner($token);

        ?>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-end">
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--=====================================
Modal Editar Banner
======================================-->
<div class="modal fade" id="editarBannerTexto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form>
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title">Edita el texto del Banner</h4>
          <button type="button" class="btn-close close-autor" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bannerTitle1" placeholder="name@example.com">
            <label for="floatingInput">Titulo Español</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bannerTitle2" placeholder="name@example.com">
            <label for="floatingInput">Titulo Ingles</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bannerSubtitle1" placeholder="name@example.com">
            <label for="floatingInput">Subtitulo Español</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bannerSubtitle2" placeholder="name@example.com">
            <label for="floatingInput">Subtitulo Ingles</label>
          </div>
          <div class="form-floating mb-3">
            <input type="numbre" class="form-control" id="bannerOrden" placeholder="name@example.com">
            <label for="floatingInput">Orden</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="bannerLink" placeholder="name@example.com">
            <label for="floatingInput">Link</label>
          </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-end">
          <div>
            <button type="submit" class="btn btn-primary guarda-banner-text">Guardar</button>
          </div>
        </div>
        <?php
          // $token = json_decode($_SESSION["tokenBack"], true);
          // $editarBanner = new ControladorBanner();
          // $editarBanner -> ctrEditarTextoBanner($token);
        ?>
      </form>
    </div>
  </div>
</div>

<!--=====================================
Modal Editar Banner
======================================-->
<div class="modal fade" id="editarBanner">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title">Edita la Imagen del Banner</h4>
          <button type="button" class="btn-close close-autor" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">

          <input type="hidden" class="form-control" name="idBanner">
          <div class="box-icon-image border text-center mb-3" style="position: relative;display: flex;justify-content: center;align-items: center;">
            <label class="btn btn-default btn-file-imagen-banner"><i class="far fa-image"></i><input type="file" class="form-control-file d-none" name="editarBanner" required><input type="hidden" name="bannerActual"></label>
            <img class="previsualizarBanner img-fluid" style="height: 400px; position: inherit;">
          </div>

        </div>
        <!-- Modal footer -->
        <div class="modal-footer d-flex justify-content-end">
          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
        <?php
          $token = json_decode($_SESSION["tokenBack"], true);
          $editarBanner = new ControladorBanner();
          $editarBanner -> ctrEditarBanner($token);
        ?>
      </form>
    </div>
  </div>
</div>

<style>
  .cont-icon-upload, .cont-icon-upload-image {
    height: 400px
  }
  .box-icon label, .box-icon-image label{
    padding: 30px;
    border-radius: 50%;
  }
  .box-icon label i, .box-icon-image label i{
    font-size: 80px
  }
  .btn-file-imagen-banner {
    position: absolute;
    width: 150px;
    height: 150px;
  }
</style>

<?php //include "modals/modifBannerTexto.modals"; ?>