<div class="modal fade modal-info" id="compraExito" tabindex="-1" role="dialog" aria-labelledby="compraExitoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-line gradient-2"></div>
        <div class="modal-header">
          <button type="button" class="cierra-modal cierra-modal-exito" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center d-flex align-items-center justify-content-center">
          <div>
          <img src="imgs/manos.svg" alt="manos">
          <h5><?=IDIOMA == 'es' ? 'Tu compra<br>fuE realizada Con éxito' : 'Your purchase<br>was made successfully' ?></h5>
        </div>
      </div>
      <div class="modal-line gradient-2"></div>
    </div>
  </div>
</div>

<script>
  $('.cierra-modal-exito').click(() =>{
    //console.log(window.location.href.split("?")[0]);
    window.location.href =  window.location.href.split("?")[0];
    //window.location.reload();
  })
</script>