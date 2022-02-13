<div class="modal fade modal-info" id="olvidecontrasena" tabindex="-1" role="dialog" aria-labelledby="cuentaVerificadaLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-line gradient-2"></div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center d-flex align-items-center justify-content-center">
          <form id="olvido-form" action="">
            <div class="form-group" id="form-group-email-olvido">
              <label class="col-form-label"><?=IDIOMA ==  'es' ? 'Ingrese el correo electrónico registrado' : 'Enter the registered email'?> :</label>
              <input type="text" name="email-inicio" id="email-olvido" class="form-control">
            </div>
            <button type="button" class="btn btn-gradient gradient-2 m-auto btn-enviar-email"><?=IDIOMA == 'es' ? 'Enviar' : 'Send' ?></button>
            <div id="mensaje-olvido"></div>
          </form>
        </div>
      <div class="modal-line gradient-2"></div>
    </div>
  </div>
</div>
</div>