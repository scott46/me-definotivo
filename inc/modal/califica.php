<div class="modal fade modal-info" id="calificar" tabindex="-1" role="dialog" aria-labelledby="calificarLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-line gradient-2"></div>
        <div class="modal-header">
          <button type="button" class="close close-califica" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center d-flex align-items-center justify-content-center">
          <div>
          <h5><?= __('califica 0') ?></h5>
          <button class="btn px-1 btn-puntua" data="1"><img width="22px" src="imgs/star-01.svg" alt=""></button>
          <button class="btn px-1 btn-puntua" data="2"><img width="22px" src="imgs/star-01.svg" alt=""></button>
          <button class="btn px-1 btn-puntua" data="3"><img width="22px" src="imgs/star-01.svg" alt=""></button>
          <button class="btn px-1 btn-puntua" data="4"><img width="22px" src="imgs/star-01.svg" alt=""></button>
          <button class="btn px-1 btn-puntua" data="5"><img width="22px" src="imgs/star-01.svg" alt=""></button>
          <div class="modal-footer d-flex flex-row mt-4 justify-content-center">
            <?php if(isset($_SESSION['token'])) { ?>
            <button type="button" class="btn btn-gradient ml-auto mr-auto mb-2 envia-calificacion" data-ele="<?=$idElemento?>"><?= __('califica 1') ?></button>
            <?php } else { ?>
            <button type="button" class="btn btn-gradient ml-auto mr-auto mb-2" data-toggle="modal" data-target="#iniciarsesion"><?= __('califica 1') ?></button>
            <?php } ?>
            <button type="button" class="btn btn-gradient mb-2"><?= __('califica 2') ?></button>
          </div>
        </div>
        </div>
        <div class="modal-line gradient-2"></div>
      </div>
    </div>
</div>



<script>
var valor = 0;
$(document).on("click", '.btn-puntua' ,function () {
  valor = parseInt($(this).attr('data'));
  $('.btn-puntua').each((i, e) => {
    $(e).empty();
    if(parseInt($(e).attr('data')) < valor || parseInt($(e).attr('data')) == valor){
      $(e).append('<img width="22px" src="imgs/star-03.svg" alt="">');
    } else {
      $(e).append('<img width="22px" src="imgs/star-01.svg" alt="">');
    }
  })
})
$(document).on("click", '.envia-calificacion' ,function () {
  var idElemento = $(this).attr('data-ele');
  var puntuacion = {
    elementoId: idElemento,
    puntaje: valor
  }
  console.log(puntuacion)
  var json = JSON.stringify(puntuacion);
  $.ajax({
    url:"api/ajax/comentarios.ajax.php",
    method: "POST",
    data: {addValor: json},
    success: function (respuesta) {
      if(respuesta != ''){
        if(respuesta.includes('Added')){
          $('#calificar').modal('toggle');
        }
      }
    }
  });
})
</script>