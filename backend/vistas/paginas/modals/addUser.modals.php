<div class="modal fade" id="modificUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
          <div class="form-floating mb-3">
            <input type="email" class="form-control" name="nombre" placeholder="name@example.com">
            <label for="floatingInput">email</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="name@example.com">
            <label for="floatingInput">Nombre</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="apellido" placeholder="name@example.com">
            <label for="floatingInput">Apellido</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="clave" placeholder="name@example.com">
            <label for="floatingInput">Clave</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="name@example.com">
            <label for="floatingInput">Genero</label>
          </div>
          <div class="form-floating mb-3">
            <input type="numbre" class="form-control" name="bannerOrden" placeholder="name@example.com">
            <label for="floatingInput">Pais</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" name="bannerLink" placeholder="name@example.com">
            <label for="floatingInput">Nacimiento</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" name="bannerLink" placeholder="name@example.com">
            <label for="floatingInput">Telefono</label>
          </div>

        <?php

            // $token = json_decode($_SESSION["tokenBack"], true);
            // $registroBanner = new ControladorBanner();
            // $registroBanner -> ctrRegistroBanner($token);

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
