<div class="modal fade modal-info" id="eliminaCarrito" tabindex="-1" role="dialog" aria-labelledby="agregarCarritoLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-line gradient-2"></div>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center d-flex align-items-center justify-content-center mb-5">
          <div>
          <img src="imgs/check.svg" alt="check">
          <h5><?=IDIOMA == 'es' ? 'El contenido fue eliminado' : 'The content was removed' ?></h5>
          <div class="modal-footer">
            <button type="button" class="btn btn-gradient ml-auto mr-auto mb-2 btn-acepta-elimina"><?=IDIOMA == 'es' ? 'ACEPTAR' : 'ACCEPT' ?></button>
          </div>
        </div>
        </div>
        <div class="modal-line gradient-2"></div>
      </div>
    </div>
</div>
