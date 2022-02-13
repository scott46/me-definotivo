<?php
require_once('api/inicio.php');
define('SECCION', 'acerca');
$section = 'preguntas-frecuentes';
$color = 'black';
include_once("inc/header.php");


?>
<header class="header-acerca-me d-flex justify-content-center align-items-center flex-column bg-terms-2">
  <h1><?= __('acerca 0')?></h1>
  <h2><?= __('acerca 1')?></h2>
</header>
<section class="main-acerca">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
      <h3><?= __('acerca 2')?></h3>
  <h4><?= __('acerca 3')?></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 d-flex justify-content-center align-items-center">
        <h5><?= __('acerca 4')?></h5>
      </div>
      <div class="col-md-6">
        <img src="imgs/acerca-me-img.png" alt="acerca ME" class="img-fluid">
      </div>
      <div class="col-md-3 d-flex justify-content-center align-items-center">
        <h5><?= __('acerca 5')?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h3><?= __('acerca 6')?></h3>
      </div>
    </div>
  </div>
  <div class="sumate d-flex justify-content-center align-items-center">
    <img src="imgs/sumate-comunidad.png" alt="sumate comunidad" class="img-fluid">
  </div>
</section>
<?php include_once('inc/footer.php'); ?>

