<div class="modal fade modal-info" id="emailolvido" tabindex="-1" role="dialog" aria-labelledby="exitoRegistroLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-line gradient-1"></div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center d-flex align-items-center justify-content-center">
        <div>
        <img src="imgs/reloj.svg" alt="reloj">
        <h5><?=IDIOMA == 'es' ? 'Recuperando tu contraseña' : 'Recovering your password' ?></h5>
        <p><?=IDIOMA == 'es' ? 'Revisá tu casilla de mail para validar<br>tu correo electrónico.' : 'Check your email box to validate<br>your email.' ?></p>
      </div>
      </div>
      <div class="modal-line gradient-1"></div>
    </div>
  </div>
</div>