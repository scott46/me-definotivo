<div class="modal fade" id="recuperocontrasena" tabindex="-1" aria-labelledby="labelIniciarSesion" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelIniciarSesion">Recuperando Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-recupero">
          <div class="form-group" id="form-group-password-recuperocontrasena">
            <label class="col-form-label">Contraseña:</label>
            <input type="password" name="password-recuperocontrasena" id="password-recuperocontrasena" class="form-control" maxlength="8">
            <p class="sm-text text-left"><input type="checkbox" class="mr-1" onclick="passFunction($(this))">Mostrar contraseña</p>
            <small class="form-text text-muted">La contraseña debe contener por lo menos una letra mayúscula y 8 caracteres en total.</small>
          </div>
          <div class="form-group" id="form-group-repassword-recuperocontrasena">
            <label class="col-form-label">Repetir contraseña:</label>
            <input type="password" name="repassword-recuperocontrasena" id="repassword-recuperocontrasena" class="form-control" maxlength="8">
            <p class="sm-text text-left"><input type="checkbox" class="mr-1" onclick="passFunction($(this))">Mostrar contraseña</p>
            <small class="form-text text-muted">Asegurate que coincida con la contraseña ingresada.</small>
          </div>
          <button type="button" class="btn btn-bg btn-block btn-recupero" data-olf="" data-weis="">Recuperar</button>
          <div id="mensaje-recuperocontrasena"></div>
        </form>
      </div>
    </div>
  </div>
</div>


