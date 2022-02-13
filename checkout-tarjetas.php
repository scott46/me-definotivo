<?php

require_once('api/inicio.php');
define('SECCION', 'checkout-tarjetas');
$section = 'checkout';
$color = 'black';
include_once("inc/header.php");


//mercado pgo de prueba
require 'api/libs/vendor/autoload.php';
MercadoPago\SDK::setAccessToken("TEST-6249239861962237-071602-dc159d42d1afaaf1038b93564c0bad4b-27757616");
$preference = new MercadoPago\Preference();
$item = new MercadoPago\Item();
$item->title = 'Pedro Barguero';
$item->quantity = 1;
$item->unit_price = 100;
$preference->items = array($item);
$preference->back_urls = array(
    "success" => "https://reinicia.com.ar/me/plataforma/checkout-tarjetas",
    "failure" => "https://reinicia.com.ar/me/plataforma/checkout-tarjetas", 
    "pending" => "https://reinicia.com.ar/me/plataforma/checkout-tarjetas"
);
$preference->auto_return = "approved"; 
$preference->save();
$response = array(
    'id' => $preference->id,
);

?>

<script src="https://sdk.mercadopago.com/js/v2"></script>

<header class="header-checkout">

</header>

<section id="checkout">
<div class="container">
<div class="row">
  <div class="col-md-8 col-12">
  <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
          <li class="breadcrumb-item"><a href="productos.php">BOLSA</a></li>
          <li class="breadcrumb-item"><a href="<?=url('checkout')?>">PAGO</a></li>
          <li class="breadcrumb-item active" aria-current="page">RESUMEN</li>
        </ol>
      </nav>
</div>
<div class="col-md-4 col-12">
  <a href=""class="bt-back">VOLVER</a>
</div>
</div>

<div class="row">
  <div class="col">
    <h1>CHECKOUT</h1>
  </div>
  <div class="col">
    <h2 class="precio text-right">$4000 ARS</h2>
  </div>
</div>

</div>

  <div class="banner-checkout d-flex align-items-center justify-content-center">
    <div class="d-flex flex-row">
      <img src="imgs/american-express.png" alt="american express" class="img-fluid">
      <div>
<h3>DESCUENTOS EXCLUSIVOS</h3>
  <p>No dejes de disfrutar la vida sin ella.</p>
</div>
</div>
  </div>

<div class="container">
<div class="row">
<div class="col">
  <form>
    <div class="row">
      <div class="col">
        <div class="tarjetas-container d-flex flex-row border">
        <div class="d-flex align-items-center"><input type="radio" name="tarjeta" class="tarjeta-radio"></div>
        <ul class="tarjetas">
          <li><img src="imgs/mercado-pago.png" alt="mercado-pago"></li>
          <li><img src="imgs/american-express-sm.png" alt="american express"></li>
          <li><img src="imgs/visa.png" alt="visa"></li>
          <li><img src="imgs/mastercard.png" alt="mastercard"></li>
          <li><img src="imgs/diners-club.png" alt="diners club"></li>
          <li><img src="imgs/naranja.png" alt="naranja"></li>
          <li><img src="imgs/nativa.png" alt="nativa"></li>
          <li><img src="imgs/tarjeta-shopping.png" alt="tarjeta shopping"></li>
          <li><img src="imgs/censosud.png" alt="censosud"></li>
          <li><img src="imgs/cabal.png" alt="cabal"></li>
          <li><img src="imgs/argencard.png" alt="argencard"></li>
        </ul> 
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mt-3">
        <div class="form-group">
          <label class="col-form-label">Número de tarjeta</label>
          <input type="text" name="nombreapellido" class="form-control">
        </div>
      </div>

      <div class="col-md-6 mt-3">
        <div class="form-group">
          <label class="col-form-label">Tarjeta</label>
          <input type="email" name="email" class="form-control">
        </div>
      </div>
    </div>
    
    <div class="row">

    <div class="col-md-4 mt-3">
        <div class="form-group">
          <label for="localidad" class="col-form-label">Mes de vencimiento</label>
          <select class="custom-select" name="localidad">
            <option value="enero">Enero</option>
          </select>
        </div>
      </div>

      <div class="col-md-4 mt-3">
        <div class="form-group">
          <label for="localidad" class="col-form-label">Año de vencimiento</label>
          <select class="custom-select" name="localidad">
            <option value="2021">2021</option>
          </select>
        </div>
      </div>

      <div class="col-md-4 mt-3">
        <div class="form-group">
          <label for="localidad" class="col-form-label">Código de seguridad de tu tarjeta</label>
          <input type="text" name="codigopostal" class="form-control">
        </div>
      </div>
    
    </div>

    <div class="row">
      <div class="col mt-3">
        <div class="form-group">
          <label class="col-form-label">Nombre del titular</label>
          <input type="text" name="nombreapellido" class="form-control">
        </div>
      </div>
    </div>

    <div class="row mb-4">
    <div class="col-md-6 mt-3">
        <div class="form-group">
          <label for="localidad" class="col-form-label">Tipo de documento</label>
          <select class="custom-select" name="localidad">
            <option value="dni">DNI</option>
          </select>
        </div>
      </div>
      <div class="col-md-6 mt-3">
        <div class="form-group">
          <label for="localidad" class="col-form-label">Número de documento</label>
          <input type="text" name="codigopostal" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button type="button" class="btn btn-block btn-gradient mb-2">VOLVER</button>
      </div>
      <div class="col">
        <!-- <div class="cho-container"></div> -->
        <button type="button" class="btn btn-block btn-gradient mb-2">PAGAR</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</section>

<?php include_once('inc/footer.php'); ?>

 <script>
    // Agrega credenciales de SDK
    const mp = new MercadoPago('TEST-27a2f0b2-5e55-4c39-85c4-7721bfc75434', {
        locale: 'es-AR'
    });
    // Inicializa el checkout
    mp.checkout({
        preference: {
            id: '<?php echo $preference->id ?>'
        },
        render: {
                container: '.cho-container', // Indica dónde se mostrará el botón de pago
                label: 'Pagar', // Cambia el texto del botón de pago (opcional)
        }
    });
</script>
 