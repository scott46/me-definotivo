<iframe name="frame" id="formFrame"></iframe>
<div class="modal fade" id="mecodigos" tabindex="-1" aria-labelledby="labelregalaContenido" aria-hidden="true" style="z-index: 1060">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelIniciarSesion"><?=IDIOMA == 'es' ? 'Ingresa el Código de tu Gift Card' : 'Enter the Code of your Gift Card' ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="box-contenido">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label class="col-form-label"><?=IDIOMA == 'es' ? 'Código' : 'Code' ?> :</label>
                  <input type="text" name="code" id="codigo-gif" class="form-control">
                  <div id="mensaje-gif"></div>
                </div>
                <button type="button" class="btn btn-bg btn-block btn-busca mt-4"><?=IDIOMA == 'es' ? 'Validar' : 'Validate' ?></button>

                <div class="row collapse" id="datosDelContenido" style="margin-top: 40px;">
                  <div class="container">
                    <div class="card">
                      <div class="card-image">
                          <div class="bg-black-card"></div>
                          <div class="material-video">
                            <div class="review">           
                            </div>
                          </div>
                          <img src="" class="card-img-top img-gift" alt="Código" >
                      </div>
                      <div class="d-flex">
                          <div class="card-body">
                              <h5 class="card-title"></h5>
                              <h6 class="card-experience mb-2"></h6>
                              <p class="precio-exp"></p>
                          </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-bg btn-block btn-canjea mt-4" value="canjea-gift"><?=IDIOMA == 'es' ? 'Canjear' : 'Exchange' ?></button>
                    <div id="mensaje-gif-canje"></div>
                  </div>
                </div> 

              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<style>
  #mensaje-gif p, #mensaje-gif-canje p {
    font-size: 0.7rem;
    color:red;
}
#formFrame{
  display: none;
}
</style>
<script>
  $('.btn-busca').click((e) => {
    e.preventDefault();
    $('#mensaje-gif').empty();
    var codigo = $('#codigo-gif').val();
    $.ajax({
      url:"api/ajax/carrito.ajax.php",
      method: "POST",
      data: {canjeaGift: codigo},
      success:function(respuesta){
        //console.log(respuesta);
        $('html').append(respuesta);
        creaFuncionCanjear()
      }
    });
  })
  function creaFuncionCanjear () {
    $('.btn-canjea').click(() => {
      $('#mensaje-gif-canje').empty();
      var contenidoId = $('.btn-canjea').attr('data');
      //console.log(contenidoId);
      $.ajax({
        url:"api/ajax/carrito.ajax.php",
        method: "POST",
        data: {usaGift: contenidoId},
        success:function(respuesta){
          //console.log(respuesta);
          $('html').append(respuesta);
        }
      });
    })
  }
</script>