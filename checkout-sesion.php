<?php
require_once('api/inicio.php');
define('SECCION', 'checkout-sesion');
$section = 'checkout';
$color = 'black';
include_once("inc/header.php");


?>

<header class="header-checkout">

</header>

<section id="checkout">
<div class="container">
<div class="row">
  <div class="col-md-8 col-8">
  <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">INICIO</a></li>
          <li class="breadcrumb-item"><a href="productos.php">BOLSA</a></li>
          <li class="breadcrumb-item active" aria-current="page">PAGO</li>
          <li class="breadcrumb-item"><a href="<?=url('checkout-tarjetas')?>">RESUMEN</a></li>
        </ol>
      </nav>
</div>
<div class="col-md-4 col-4">
  <a href=""class="bt-back">VOLVER</a>
</div>
</div>

<div class="row">
  <div class="col">
    <h1>CHECKOUT</h1>
  </div>
</div>
</div>
<div class="container">
  <form>
    <div class="row">
      <div class="col-md-6 mt-3">
        <h4 class="text-center mb-4">REGISTRATE</h4>
        <p class="text-center">Si todavía no tenés una cuenta de usuario en ME utilizá esta opción para acceder 
          al formulario de registro.<br><br>
          
          Te solicitaremos la información para agilizar el proceso de compra.
          
          </p>
          <button type="button" class="btn btn-block btn-gradient mt-5 mb-5">CREÁ TU CUENTA</button>
      </div>

      <div class="col-md-6 mt-3">
        <h4 class="text-center mb-4">INICIÁ SESIÓN</h4>
      <div class="form-group mb-2">
          <label class="col-form-label">Correo electrónico o usuario*</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
        <label class="col-form-label">Contraseña:</label>
      <div class="input-group">
      <input type="password" class="form-control password" name="password" id="txtPassword">
  <div class="input-group-append">
        <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="bi bi-eye"></i></button>
  </div>
</div>
<small class="form-text text-muted mb-5"><a href="#">¿Olvidaste tu contraseña?</a></small>
        </div>
        <button type="button" class="btn btn-block btn-gradient mb-3">INICIÁ SESIÓN</button>

        <div class="d-flex flex-row">
        <button type="button" class="btn btn-block btn-gradient mr-3">Seguí comprando</button>
        <a type="button" href="<?=url('checkout-tarjetas')?>" class="btn btn-block btn-gradient">CONTINUAR</a>
        </div>
      </div>
    </div>
  </form>
</div>
</section>

<?php include_once('inc/footer.php'); ?>

