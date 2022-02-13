<?php
require_once('api/inicio.php');
define('SECCION', 'productos');
$section = 'checkout';
$color = 'black';
include_once("inc/header.php");



if(isset($_SESSION["token"])) {
  $token = $_SESSION["token"];
  $idioma = IDIOMA == 'es' ? 1 : 2;
  $productos = ControladorCarrito::ctrMuesraProductos($idioma, $token);
  $productosArray = json_decode($productos,true);
  $price = isset($productosArray['resumen']) ? $productosArray['resumen'][0]['totalPesos'] : '0';

  if(PAIS == 'ar') {
    if($price > 0){
      $monto = base64_encode($price);
      $id = base64_encode(132131);
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
          "success" => "http://".DOMINIO.BASE_URL."me?er=$estado&ib=$id&mm=$monto&mn=$moneda&pp=$proveedor&active=canales",
          "failure" => "http://".DOMINIO.BASE_URL."productos", 
          "pending" => "http://".DOMINIO.BASE_URL."productos"
      );
      $preference->auto_return = "approved"; 
      $preference->save();
      $response = array(
          'id' => $preference->id,
      );
    }
  }


}



?>


<?php include_once('inc/modal/eliminar-carrito.php'); ?>

<!-- SWEET ALERT 2 -->  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- JV Mercado Pago -->
<?php if(PAIS == 'ar') { ?>
<script src="https://sdk.mercadopago.com/js/v2"></script>
<?php } else { ?>
<!-- JV Paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=<?=$empresa->pp['codPP']?>&components=buttons"></script>
<?php } ?>


<header class="header-checkout"></header>
<section id="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=url('index')?>"><?= __('productos 0') ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?= __('productos 1') ?></li>
            <li class="breadcrumb-item active" ><a ><?= __('productos 2') ?></a></li>
            <!-- <li class="breadcrumb-item" ><a >RESUMEN</a></li> -->
          </ol>
        </nav>
      </div>
      <div class="col-md-4 col-12">
        <a href=""class="bt-back"><?= __('productos 3') ?></a>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <h1><?= __('productos 4') ?></h1>
      </div>
    </div>
  </div>

  <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-6">

          <!--productos-->
          <?php 
          if(isset($productosArray['detalle'])) { foreach ($productosArray['detalle'] as $producto) { 

            $respuestaContenido = ControladorContenidos::ctrMostrarTodoDeUnContenido(1, $producto['contenidoId'], 'Admin');
            $contenidos = json_decode($respuestaContenido,true);
            $cantidad = count($contenidos);
            
            //duracion suscripcion
            $fechainicial = new DateTime($contenidos[0]["vigenciaDesde"]); 
            $fechafinal = new DateTime($contenidos[0]["vigenciaHasta"]); 
            $diferencia = $fechainicial->diff($fechafinal); 
            $meses = ($diferencia->y*12)+$diferencia->m; 
            $dias = ($diferencia->days); 
            $datoDuracion = $meses == 0 ? $dias.' Dias' : $meses.' Meses'; 
          ?> 
          <div class="row mb-5">
            <div class="col-lg-8">
              <img src="backend/<?=$producto['previewRuta'] ?>" alt="canal gonzalo aramburu" class="img-fluid">
            </div>
          
            <div class="col-lg-4">
              <div class="product-container">
                <div class="product-info">
                  <h5><?=$producto['descripcionContenido'] ?></h5>
                  <h6><?=$producto['nombreAutor'] ?></h6>
                  <p class="p-desc"><?=$producto['titulo'] ?> <br>
                    <?=$cantidad == 1 ? '('.$cantidad.' video)' : '('.$cantidad.' videos)'?><br>
                    <?=$datoDuracion ?></p>
                  <p class="p-price"><?=PAIS == 'ar' ? 'ARS '.$producto['precioPesos'] : 'USD '.$producto['precioDolares'] ?></p>     
                </div>
                <button class="delete" data-int=<?=base64_encode($producto['contenidoId'])?>><?= __('productos 5') ?></button>
              </div>
            </div>   
          </div>
          <?php }} else { ?> 
              <div style="margin-top: 90px;"><h3><?= __('productos 6') ?></h3></div>
           <?php } ?> 
        </div>

        <?php  
        $precio = 0;
        if(isset($productosArray['resumen'])) {
          $precio = PAIS == 'ar' ? $productosArray['resumen'][0]['totalPesos'] : $productosArray['resumen'][0]['totalDolares'];
        }

        ?>
        <div class="col-lg-4 col-md-6">
          <div class="carrito">
            <h5 class="text-left"><?= __('productos 7') ?></h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center"><?= __('productos 8') ?><span class="precio-sub"><?=PAIS == 'ar' ? 'ARS' : 'USD' ?> <?=$precio?></span></li>
              <li class="list-group-item d-flex justify-content-between align-items-center"><?= __('productos 9') ?><span>0</span></li>
              <li class="list-group-item d-flex justify-content-between align-items-end precio-total"><?= __('productos 9') ?><span><?=PAIS == 'ar' ? 'ARS' : 'USD' ?> <?=$precio?></span></li>
            </ul>
          <div class="d-flex flex-row">
            <a href="<?=url('categorias')?>" class="btn btn-sm btn-gradient mb-3"><?= __('productos 10') ?></a>
          </div>
          <?php if(PAIS == 'ar') { ?>
          <div class="cho-container"></div>
          <?php } else { ?> 
          <div id="paypal-button-container"></div>
          <?php } ?>
        </div>

      </div>
    </div>

    <div class="row border-top border-bottom pt-6 pb-6">
      <div class="col-md-4 mb-3 mt-3">
        <p class="text-gift"><?= __('productos 11') ?></p>
      </div>
      <div class="col-md-5 mb-3 mt-3">
        <input type="text" class="form-control input-desc">
      </div>
      <div class="col-md-3 mb-3 mt-3">
        <button type="button" class="btn btn-block btn-gradient gradient-3"><?= __('productos 12') ?></button>
      </div>
    </div>

    <div class="row border-top pt-4 pb-4">
      <div class="col-md-4 mb-3 mt-3 align-self-center">
        <p class="text-gift"><?= __('productos 13') ?></p>
        <!-- <p class="text-gift"><?= __('productos 15') ?></p> -->
      </div>
      <div class="col-md-5 mb-3 mt-3">
      <img src="imgs/gift-card-sm.jpg" class="img-fluid">
      </div>
      <div class="col-md-3 mb-3 mt-3 align-self-center">
        <a href="<?=url('categorias')?>" class="btn btn-info btn-block btn-gray"><?= __('productos 14') ?></a>
      </div>
    </div>

  </div>
</section>


<style>
.mercadopago-button {
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
.text-gift-legal {
  font-size: 0.5rem;
  font-weight: 400;
  color: #707070;
  text-transform: uppercase;
  padding: 0px;
  margin: 0px;
}
</style>

<?php include_once('inc/footer.php'); ?>


<script>
// Agrega credenciales de SDK
<?php if(PAIS == 'ar') { ?>
  <?php if($price > 0){ ?>
    const mp = new MercadoPago("<?=$empresa->mp['codMP']?>", {locale: 'es-AR'});
    mp.checkout({
      preference: {id: '<?php echo $preference->id ?>'},
      render: {container: '.cho-container',label: 'Continuar',},
      theme: {elementsColor: '#8e44ad'}
    });
  <?php } ?>
<?php } ?>
</script>

<?php if(PAIS != 'ar') { ?>
<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?=$productosArray['resumen'][0]['totalDolares']?>',
                    currency: 'USD'
                }
            }]
        });
    },
    // Finalize the transaction
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(orderData) {
        console.log(data);
        function utoa(str) {
            return window.btoa(unescape(encodeURIComponent(str)));
        }
        var monto = utoa(<?=$productosArray['resumen'][0]['totalDolares']?>)
        var id = utoa(data.orderID);
        var estado = utoa('approved');
        var moneda = utoa('USD');
        var proveedor = utoa('Paypal');
        window.location.href = `http://<?=DOMINIO.BASE_URL?>me?er=${estado}&ib=${id}&mm=${monto}&mn=${moneda}&pp=${proveedor}`;
      });
    }
  }).render('#paypal-button-container');
</script>
<?php } ?>
