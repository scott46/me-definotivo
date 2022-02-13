<div class="modal fade" id="iniciarsesion" tabindex="-1" aria-labelledby="labelIniciarSesion" aria-hidden="true" style="z-index: 1060">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-line gradient-2"></div>
      <div class="modal-header">
        <h5 class="modal-title" id="labelIniciarSesion"><?= __('inicio-session 0') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-login">
          <div class="form-group" id="form-group-email-inicio">
            <label class="col-form-label"><?= __('inicio-session 1') ?></label>
            <input type="text" name="email-inicio" id="email-inicio" class="form-control">
          </div>

          <div class="form-group" id="form-group-password-inicio">
            <label class="col-form-label"><?= __('inicio-session 2') ?></label>
            <input type="password" name="password-inicio" id="password-inicio" class="form-control" maxlength="8">
          </div>
          <div class="d-flex">
          <a class="error-password btn-olvido px-2"><?= __('inicio-session 3') ?></a><p style="font-size: 10px">|</p><a class="error-password btn-reenvioMail px-2"><?= __('inicio-session 4') ?></a>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-bg btn-block btn-inicia-sesion"><?= __('inicio-session 0') ?></button>
          </div>
          <div class="mb-4" id="mensaje-inicio"></div>
          <!-- <div class="form-group sesion-redes d-flex flex-row">
            <button type="button" class="btn btn-md mb-3 mr-2"><?= __('inicio-session 7') ?></button>
            <button type="button" class="btn btn-md mb-3 ml-2"><?= __('inicio-session 8') ?></button>
          </div> -->
          <div class="form-group">
            <p class="error-password text-center"><?= __('inicio-session 4') ?></p>
          </div>
          <button type="button" class="btn btn-bg btn-block btn-cambio-registro"><?= __('inicio-session 5') ?></button>
          <div id="mensaje-inicio"></div>
        </form>
      </div>
    </div>
  </div>
</div>



<style>
  .btn-olvido, .btn-reenvioMail  {
    cursor: pointer;
  }
</style>
