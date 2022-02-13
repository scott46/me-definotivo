
<div class="modal fade" id="muestraCodigoGift" tabindex="-1" aria-labelledby="labelregalaContenido" aria-hidden="true" style="z-index: 1060">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-line gradient-2"></div>

        <div class="modal-header">
          <button type="button" class="close close-regala">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body text-center">
          <div>
            <img src="imgs/manos.svg" alt="manos">
            <h5><?=IDIOMA == 'es' ? 'Tu Gift Card <br> fue generada y enviada con éxito. ' : 'Your Gift Card<br> was generated and sent successfully. ' ?></h5>
          </div>
          <div class="box-contenido">
            <div class="card">
              <div class="card-body">
                  <p><?=IDIOMA == 'es' ? 'Código' : 'Code' ?>: <strong style="font-size: 20px;" id="codigoGift"><?=$arrayGift['giftCard']['codigo']?></strong></p>
                  <p><?=IDIOMA == 'es' ? 'Número de operacion' : 'Operation number' ?>: <strong><?=$arrayGift['giftCard']['nroOperacion']?></strong></p>
                  <p><?=IDIOMA == 'es' ? 'Importe abonado' : 'Amount paid '?> : <strong><?=$arrayGift['giftCard']['tipoMoneda'] == 1 ? '$' : 'USD'?> <?=$arrayGift['giftCard']['monto']?></strong></p>
                  <p><?=IDIOMA == 'es' ? 'Se ha enviado un email con este mismo código a' : 'An email with this same code has been sent to' ?> <strong><?=$arrayGift['giftCard']['email']?></strong></p>
              </div>
            </div>
          </div>
        </div>
        
      <div class="modal-line gradient-2"></div>
    </div>
  </div>

</div>

<style>
  .box-contenido {
    padding-bottom: 30px;
  }
  .box-contenido p {
    margin-bottom: 0px;
  }
</style>

<script type="text/javascript">
  $('.close-regala').click(() => {
    $('#muestraCodigoGift').modal('toggle');
    var newURL = window.location.href.split("&")[0];
    window.history.pushState('object', document.title, newURL);
})
</script>

