<?php 

require_once('api/core/Config.php');
$paises = Config::obtener('paises');


?>





<!--registro-->
<div class="modal fade" id="registro" tabindex="-1" aria-labelledby="labelregistro" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-line gradient-1"></div>
        <div class="modal-header">
          <h5 class="modal-title" id="labelregistro"><?= __('registro 0') ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-register">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="group-nombre">
                  <label for="nombre" class="col-form-label"><?= __('registro 1') ?></label>
                  <input type="text" name="nombre" class="form-control" id="nombre">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" id="group-apellido">
                  <label for="apellido" class="col-form-label"><?= __('registro 2') ?></label>
                  <input type="text" name="apellido" class="form-control" id="apellido">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="group-nacimiento">
                  <label for="nacimiento" class="col-form-label"><?= __('registro 3') ?></label>
                  <input type="date" name="nacimiento" class="form-control" id="nacimiento"  min='1900-01-01' max='9999-12-31'>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-0">
                  <label class="col-form-label"><?= __('registro 4') ?></label>
                </div>

                <div class="form-group mb-0">
                  <input type="radio" name="genero" value="femenino"><label class="genero mb-0"><?= __('registro 5') ?></label>
                  <input type="radio" name="genero" value="no binario"><label class="genero mb-0"><?= __('registro 6') ?></label>
                </div>
                <div class="form-group" id="group-genero">
                  <input type="radio" name="genero" value="masculino"><label class="genero"><?= __('registro 7') ?></label>
                  <input type="radio" name="genero" value="prefiero no decirlo"><label class="genero"><?= __('registro 8') ?></label>
                </div>

              </div>
            </div>

            <div class="row">

              <div class="col">
                <div class="form-group" id="group-pais">
                  <label class="col-form-label"><?= __('registro 9') ?>*</label>
                  <select class="custom-select" name="pais" id="pais">
                      <option value=""><?= __('registro 9') ?></option>
                    <?php  foreach ($paises as $row) { ?>
                      <option value="<?= $row['nombre'] ?>"><?= $row['nombre'] ?></option>
                     <?php } ?>
                  </select>
                  <p class="sm-text text-left"><?= __('registro 10') ?></p>
                </div>           
              </div>

            </div>
            
            
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label"><?= __('registro 11') ?></label>
                  <select class="custom-select bg-white" name="codigopais" id="codigopais" disabled style="color: #495057">
                      <option value=""><?= __('registro 12') ?></option>
                    <?php  foreach ($paises as $row) { ?>
                      <option name="<?= $row['nombre'] ?>" value="<?= $row['phone_code'] ?>"><?= $row['nombre'].' ( +'.$row['phone_code'].' )' ?>  </option>
                     <?php } ?>
                  </select>
                </div>
            
              </div>
            
              <div class="col-md-6">
                <div class="form-group" id="group-telefono">
                  <label for="apellido" class="col-form-label"><?= __('registro 13') ?></label>
                  <input type="number" name="telefono" class="form-control" id="telefono">
                </div>
              </div>
            
            </div>
            
            <div class="row">
              <div class="col">
                <div class="form-group" id="group-email">
                  <label for="email" class="col-form-label"><?= __('registro 14') ?>*</label>
                  <input type="email" name="email" class="form-control" id="email" size="30" multiple>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" id="group-clave">
                  <label class="col-form-label"><?= __('registro 15') ?></label>
                  <input type="password" class="form-control" name="password-reg" id="password-reg" maxlength="8">
                  <p class="sm-text text-left"><input type="checkbox" class="mr-1" onclick="passFunction($(this))"><?= __('registro 16') ?></p>
                  <p class="sm-text text-left" style="line-height: inherit"><?= __('registro 17') ?></p>
                </div>
              </div>
            
              <div class="col-md-6">
                <div class="form-group" id="group-repiteclave">
                  <label class="col-form-label"><?= __('registro 18') ?>*</label>
                  <input type="password" class="form-control" name="repetirpassword-reg" id="repetirpassword-reg" maxlength="8">
                  <p class="sm-text text-left"><input type="checkbox" class="mr-1" onclick="passFunction($(this))"><?= __('registro 16') ?></p>
                    <p class="sm-text text-left" style="line-height: inherit"><?= __('registro 19') ?></p>
                </div>
              </div>
            </div>
            
            <div class="row">
            
              <div class="col mb-3"> 
                <div class="form-group d-flex flex-row mb-0">
                  <input type="checkbox" name="terminos" value="terminos" >
                  <p class="sm-text ml-2 mt-0 mb-0" style="line-height: inherit"><?= __('registro 20') ?> <a
                      href="terminos-condiciones.php"><?= __('registro 21') ?> </a> <?= __('registro 22') ?></p>
                </div>
                <div id="group-acepto"></div>
              </div>
            
            </div>
            <div class="row">
            
              <div class="col">
                <div class="form-group d-flex flex-row">
                  <input type="checkbox" name="recibirmail" value="recibirmail">
                  <p class="sm-text ml-2 mt-0"><?= __('registro 23') ?></p>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-bg btn-block btn-registro"><?= __('registro 24') ?></button>

            <div id="group-mensaje"></div>

            <?php include_once('inc/terms.php') ?>

          </form>
        </div>
      </div>
    </div>
  </div>




<script type="text/javascript">
  function passFunction(e) {
    var input = e[0].parentElement.parentElement.firstChild.nextSibling.nextSibling.nextElementSibling;
    if(input.type === 'password') {
      input.type = 'text'
    } else {
      input.type = 'password'
    }
}
</script>
<style>
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
  }
</style>