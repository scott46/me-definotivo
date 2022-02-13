<div class="modal fade" id="reenviaEmail" tabindex="-1" aria-labelledby="labelIniciarSesion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-line gradient-2"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex align-items-center justify-content-center mb-4">
    <div>
      <h5 class="modal-title mb-4" id="labelIniciarSesion"><?=IDIOMA == 'es' ? 'REENVIAR MAIL DE VERIFICACIÓN' : 'RESEND VERIFICATION MAIL' ?></h5>
        <form id="form-reenvia">
          <div class="form-group" id="form-group-email-reenvia">
            <label class="col-form-label"><?=IDIOMA == 'es' ? 'Correo electrónico' : 'Email' ?> :</label>
            <input type="text" name="email-reenvia" id="email-reenvia" class="form-control">
          </div>
          <button type="button" class="btn btn-bg btn-block btn-reenvioemailverificacion"><?=IDIOMA == 'es' ? 'ENVIAR' : 'SEND' ?></button>
          <div id="mensaje-reenvia"></div>
        </form>
    </div>
      </div>
    </div>
  </div>
</div>

