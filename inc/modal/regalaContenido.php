<?php

  if(PAIS == 'ar'){
    $host= $_SERVER["HTTP_HOST"];
    $url= $_SERVER["REQUEST_URI"];
    $price = $contenido[0]['precioPesos'];
    $monto = base64_encode($price);
    $id = base64_encode('datamp');
    $estado = base64_encode('approved');
    $moneda = base64_encode('Pesos');
    $proveedor = base64_encode('Mercado Pago');
    //mercado pgo de prueba
    require 'api/libs/vendor/autoload.php';
    MercadoPago\SDK::setAccessToken($empresa->mp['tokenMP']);
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->title = 'ME';
    $item->quantity = 1;
    $item->unit_price = $price;
    $preference->items = array($item);
    $preference->back_urls = array(
        "success" => "http://".$host.$url."&er=$estado&ib=$id&mm=$monto&pp=$proveedor&mn=$moneda",
        "failure" => "http://".$host.$url, 
        "pending" => "http://".$host.$url
    );
    $preference->auto_return = "approved"; 
    $preference->save();
    $response = array(
        'id' => $preference->id,
    );
  }

?>

<?php if(PAIS == 'ar'){ ?>
<!-- JV Mercado Pago -->
<script src="https://sdk.mercadopago.com/js/v2"></script>
<?php } else { ?>
<!-- JV Paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=<?=$empresa->pp['codPP']?>&components=buttons"></script>
<?php } ?>

<div class="modal fade" id="regalaContenido" tabindex="-1" aria-labelledby="labelregalaContenido" aria-hidden="true" style="z-index: 1060">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelIniciarSesion"><?= __('modalGift 0') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="box-contenido">

            <div class="card">
              <p class="text-gift-legal"><?= __('productos 15') ?></p>
                <div class="card-image">
                    <div class="bg-black-card"></div>
                    <div class="material-video">
                      <div class="review">
                          <p><?=$contenido[0]['contenidoDescripcion']?></p>
                      </div>
                    </div>
                    <img src="backend/<?=$contenido[0]['previewRutaContenido']?>" class="card-img-top" alt="<?=$contenido[0]['contenidoTitulo']?>">
                </div>
                <div class="d-flex">
                    <div class="card-body px-0">
                        <h5 class="card-title"><?=$contenido[0]['contenidoTitulo']?></h5>
                        <h6 class="card-experience mb-2"><?=strtoupper($contenido[0]['contenidoDescripcion'])?></h6>
                        <p class="precio-exp"><?=PAIS == 'ar' ? '$ '.$contenido[0]['precioPesos'] : 'U$D '.$contenido[0]['precioDolares'] ?></p>
                    </div>
                </div>
            </div>

          </div>

          <div class="form-group">
            <label class="col-form-label"><?= __('modalGift 1') ?></label>
            <input type="mail" name="email-inicio" id="email-inicio-gif" class="form-control">
            <div id="form-email-inicio"></div>
          </div>
          <div class="form-group">
            <label class="col-form-label"><?= __('modalGift 2') ?></label>
            <input type="mail" name="email-inicio" id="email-fin-gif" class="form-control">
            <div id="form-email-fin"></div>
          </div>
          <div class="form-group">
            <label class="col-form-label"><?= __('modalGift 3') ?></label>
            <textarea type="text" name="email-inicio" id="text-gif" class="form-control"></textarea> 
            <div id="form-email-fin"></div>
          </div>

          <button type="button" class="btn btn-bg btn-block btn-regala mt-4"><?= __('modalGift 4') ?></button>
          <div class="row collapse" id="pagarRegalaCOntenido">
            <div class="container">
              <!-- btn mp -->
              <?php if(PAIS == 'ar') { ?>
              <div class="cho-container"></div>
              <?php } else { ?>
              <!-- btn paypal -->
              <div class="my-4" id="paypal-button-container"></div>
              <?php } ?>
            </div>
          </div>

      </div>
    </div>
  </div>
</div>



<style>
  .btn-olvido, .btn-reenvioMail  {
    cursor: pointer;
  }
  .cho-container {
    margin-top: 40px;
  }
  .cho-container p {
    margin: 0 !important;
    font-size: inherit;
  }
  .cho-container button {
    background-color: #3974b7;
    color: #ffffff;
    border: none;
    background: -webkit-gradient(linear, right top, left top, from(#3974b7), color-stop(47%, #28aed0), to(#32b8ae));
    background: linear-gradient(270deg, #3974b7 0%, #28aed0 47%, #32b8ae 100%);
    border-radius: 0px;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.75rem;
    padding: 0.36rem 1.5rem;
    display: block;
    width: 100%;
  }
  .alert {
    color: red;
    font-size: 12px;
    padding: 0;
  }
</style>


<script>
  function utoa(str) {
    return window.btoa(unescape(encodeURIComponent(str)));
  }

  $('.btn-regala').click(() => {
    $('#form-email-inicio').empty();
    $('#form-email-fin').empty();
    var emailinicio = $('#email-inicio-gif').val();
    var emailfin = $('#email-fin-gif').val()
    var texto = utoa($('#text-gif').val())
    var mm = emailinicio.split('@');
    var emailBase641 = utoa(mm[0]);
    var emailBase642 = utoa(mm[1]);
    var ahora  = Date.now();

    if (emailinicio == '' || emailfin == '') {
      $('#form-email-inicio').css('border-top', '1px red solid')
      $('#form-email-fin').css('border-top', '1px red solid')
      $('#form-email-inicio').append('<span class="alert">El email es requerido</span>')
      $('#form-email-fin').append('<span class="alert">El email es requerido</span>')
    } else {
      if (emailinicio !== emailfin) {
        $('#form-email-inicio').css('border-top', '1px red solid')
        $('#form-email-fin').css('border-top', '1px red solid')
        $('#form-email-inicio').append('<span class="alert">Los email no son iguales</span>')
        $('#form-email-fin').append('<span class="alert">Los email no son iguales</span>')
      } else {
        $('#pagarRegalaCOntenido').collapse({toggle: true})
        document.cookie = `data1=${emailBase641}; expires=${ahora}`;
        document.cookie = `data2=${emailBase642}; expires=${ahora}`;
        document.cookie = `data3=${texto}; expires=${ahora}`;

        var dataCont = {
          contenidoId: <?=$contenido[0]['idContenidos']?>,
          monto: <?=PAIS == 'ar' ? $contenido[0]['precioPesos'] : $contenido[0]['precioDolares']?>,
          tipoMoneda: <?=PAIS == 'ar' ? '1' : '2' ?>,
          email: emailinicio,
        }
        var json = JSON.stringify(dataCont);
        $.ajax({
          url:"api/ajax/carrito.ajax.php",
          method: "POST",
          data: {giftAdd: json},
          success:function(respuesta){ 
            console.log(respuesta);
            if(respuesta.includes('Added')){
              <?php if(PAIS == 'ar') { ?>
                addMP(dataCont);
              <?php } else { ?>
                addPaypal(dataCont);
              <?php } ?>
            } else if(respuesta.includes('Duplicado')) {
              console.log('diplicado');
            }
          }
        });


        function addPaypal(dataCont) {
          paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: dataCont.monto,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                  // Base64 encoded ASCII to UCS-2 string
                  console.log(data);
                  console.log(actions);
                  var monto = utoa(dataCont.monto);
                  var id = utoa(data.orderID);
                  var estado = utoa('approved');
                  var moneda =  utoa('USD');
                  var proveedor = utoa('Paypal');
                  window.location.href = window.location.href+`&er=${estado}&xo=${emailBase641}&xi=${emailBase642}&t=${texto}&ib=${id}&mm=${monto}&pp=${proveedor}&mn=${moneda}`;
                });
            }
          }).render('#paypal-button-container');
        }

        <?php if(PAIS == 'ar'){ ?>
        function addMP (dataCont) {
          const mp = new MercadoPago("<?=$empresa->mp['codMP']?>", {locale: 'es-AR'});
          // Inicializa el checkout
          mp.checkout({
            preference: {id: '<?php echo $preference->id ?>'},
            render: {container: '.cho-container',label: 'Continuar'},
            theme: {elementsColor: '#8e44ad'}
          });
        }
        <?php } ?>

      }
    }
  })



</script>