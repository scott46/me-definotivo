<?php

require_once('api/inicio.php');
define('SECCION', 'me-haus');
include_once("inc/header.php");
$section = 'me-haus';
//color de pagina
$color = 'white';

?>



  <header class="header-mehaus d-flex justify-content-center align-items-center flex-column">
  <img src="imgs/me-haus-logo.png" alt="me haus">
  </header>

  <section class="main-mehaus">
    <div class="container">
      <div class="row mb-5">
        <div class="col">
         <h1><?= __('mehaus 0') ?></h1>
         <p class="inicialtext"><?= __('mehaus 1') ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <h2><?= __('mehaus 2') ?></h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mt-3">
          <div class="form-group">
            <label class="col-form-label"><?= __('mehaus 3') ?>*</label>
            <input type="text" name="nombre" class="form-control">
          </div>
        </div>

        <div class="col-md-6 mt-3">
          <div class="form-group">
            <label class="col-form-label"><?= __('mehaus 4') ?>*</label>
            <input type="text" name="apellido" class="form-control">
          </div>
        </div>

        <div class="col-md-6 mt-3">
          <div class="form-group">
            <label class="col-form-label"><?= __('mehaus 5') ?>*</label>
            <input type="email" name="email" class="form-control">
          </div>
        </div>

        <div class="col-md-6 mt-3">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="col-form-label"><?= __('mehaus 6') ?></label>
              <select class="custom-select form-control-sm" name="codigopais">
                <option value="1">Argentina (+54)</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label class="col-form-label"><?= __('mehaus 7') ?></label>
              <input type="text" name="telefono" class="form-control">
            </div>
          </div>
        </div>
        </div>
        </div>

<div class="comentario-bg">
<div class="container">
          <div class="row">

        <div class="col">
          <label class="col-form-label mb-2"><?= __('mehaus 8') ?></label>
              <textarea class="comment-review" rows="4"></textarea>
         </div>

      </div>
      </div>
    </div>
      <div class="container">
      <div class="row">
        <div class="col-md-12"> <p class="sm-text mt-4 mb-2"><?= __('mehaus 9') ?></p></div>
        <div class="col-md-12">
          <div class="form-group d-flex flex-row mb-3">
            <input type="checkbox" name="terminos" value="terminos">
            <p class="sm-text ml-2 mt-0 mb-0"><?= __('mehaus 10') ?><a href="<?=url('terminos-condiciones')?>"><?= __('mehaus 11') ?></a><?= __('mehaus 12') ?></p>
          </div>
        </div>
        <div class="col"><button type="button" class="btn btn-gradient gradient-1 ml-auto mr-auto mt-4 mb-4"><?= __('mehaus 13') ?></button></div>
      </div>

      <div class="row mb-5">
        <div class="col">
          <?php include_once('inc/terms.php'); ?>
        </div>
      </div>

    </div>
  </section>

  <?php include_once('inc/footer.php'); ?>

