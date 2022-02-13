<!--=====================================
Modal Editar Banner
======================================-->
<div class="modal fade" id="editarBannerTexto">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
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
