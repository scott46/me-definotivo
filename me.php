<?php


require_once('api/inicio.php');
define('SECCION', 'me');
$section = 'me';
$color = 'black';
include_once("inc/header.php");
include_once("inc/modal/cancelar-canal.php");
include_once("inc/modal/cancelar-canal-exito.php");
include_once("inc/modal/cancelar-cuenta.php");
include_once("inc/modal/cancelar-cuenta-exito.php");
include_once("inc/modal/cancelar-experiencia.php");
include_once("inc/modal/cancelar-experiencia-exito.php");
$paises = Config::obtener('paises');

$idioma = IDIOMA == 'es' ? 1 : 2;

$buscaInformacionUser = ControladorUsuarios::ctrBuscaMEDatos($_SESSION["token"]);
$date = explode(' ', $buscaInformacionUser[0]["fechaAcepto"]);
$date = explode('/', $date[0]);
$token = $_SESSION['token'];

//busco me deseos
$misDeseos = ControladorCarrito::ctrTreMisDeseos($_SESSION['token']);
$arraymisDeseos = json_decode($misDeseos, true);
$cantidadDeseos = count($arraymisDeseos);

//busco me productos
$MisProductos = ControladorCarrito::ctrTreMisProductos($_SESSION['token']);
$arrayMisProductos = json_decode($MisProductos, true);
$cantidadExperiencias = 0;
$cantidadCanales = 0;
if(count($arrayMisProductos) != 0){
  foreach($arrayMisProductos as $row) {
    $contenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $row['contenidoId'], $token);
    $data = json_decode($contenido, true);
    if($data[0]['tipoContenidoId'] == 1){
      $cantidadCanales++;
    } else if($data[0]['tipoContenidoId'] == 2){
      $cantidadExperiencias++;
    }
  }
}





if(isset($_GET['active'])) {
  if($_GET['active'] == 'canales'){
    $activeCanalesTAB = 'active';
    $activeCanalesPANEL = 'show active';
  } else {
    $activeCanalesTAB = '';
    $activeCanalesPANEL = '';
  }
  if($_GET['active'] == 'experiencias'){
    $activeExperienciasTAB = 'active';
    $activeExperienciasPANEL = 'show active';
  } else {
    $activeExperienciasTAB = '';
    $activeExperienciasPANEL = '';
  }
  if($_GET['active'] == 'deseos'){
    $activeDeseosTAB = 'active';
    $activeDeseosPANEL = 'show active';
  } else {
    $activeDeseosTAB = '';
    $activeDeseosPANEL = '';
  }
  $activeConfiguracionTAB = '';
  $activeConfiguracionPANEL = '';
} else {
  $activeConfiguracionTAB = 'active';
  $activeConfiguracionPANEL = 'show active';
  $activeCanalesTAB = '';
  $activeExperienciasTAB = '';
  $activeDeseosTAB = '';
  $activeCanalesPANEL = '';
  $activeExperienciasPANEL = '';
  $activeDeseosPANEL = '';
}


?>


<header class="header-perfil">
  <div class="perfil-img" style="border: 0">
    <!-- <img src="imgs/usuarios/perfil.png" alt="perfil" class="img-fluid"> -->
    <div class="img-fluid user"><h1><?=strtoupper($buscaInformacionUser[0]["nombre"][0]).strtoupper($buscaInformacionUser[0]["apellido"][0])?></h1></div>
  </div>
  <!-- <div class="perfil-subir">
    <i class="bi bi-upload"></i>
  </div> -->
  <div class="perfil-dato">
    <h1><?=$buscaInformacionUser[0]["nombre"]?> <?=$buscaInformacionUser[0]["apellido"]?></h1>
    <p class="member"><?= __('me 0') ?> <?=$date[2]?></p>
  </div>
</header>

<section id="me">

  <ul class="nav nav-pills nav-main-me mb-3" id="me-main-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="bi bi-chevron-down"></i>
      </button>
      <a class="nav-link <?=$activeConfiguracionTAB?>" id="perfil-tab" data-toggle="pill" href="#perfil" role="tab" aria-controls="perfil" aria-selected="false"><?= __('me 1') ?></a>
      <div class="dropdown-menu">
        <a class="" id="configuracion-tab" data-toggle="pill" href="#configuracion" role="tab" aria-controls="configuracion" aria-selected="false"><?= __('me 2') ?></a>
        <div class="dropdown-divider"></div>
        <a class="" id="pagos-tab" data-toggle="pill" href="#pagos" role="tab" aria-controls="pagos" aria-selected="false"><?= __('me 3') ?></a>
      </div>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link <?=$activeCanalesTAB?>" id="canales-tab" data-toggle="pill" href="#canales" role="tab" aria-controls="canales" aria-selected="false"><?= __('me 4') ?></a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link <?=$activeExperienciasTAB?>" id="experiencias-tab" data-toggle="pill" href="#experiencias" role="tab" aria-controls="experiencias" aria-selected="false"><?= __('me 5') ?></a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link <?=$activeDeseosTAB?>" id="lista-deseos-tab" data-toggle="pill" href="#lista-deseos" role="tab" aria-controls="lista-deseos" aria-selected="false"><?= __('me 6') ?></a>
    </li>
  </ul>

  <div class="tab-content" id="me-secondary-tabContent">

    <div class="tab-pane fade <?=$activeConfiguracionPANEL?>" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
      <div class="container">
        <div class="row">
          <div class="col">
            <ul class="nav nav-pills nav-secondary-me mb-3" id="me-secondary-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="datos-tab" data-toggle="pill" href="#datos" role="tab" aria-controls="datos" aria-selected="false"><?= __('me 7') ?></a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="usuario-tab" data-toggle="pill" href="#usuario" role="tab" aria-controls="usuario" aria-selected="false"><?= __('me 8') ?></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tab-content" id="pills-tabContent-sub">
          <!-- Datos Personales-->
          <div class="tab-pane fade <?=$activeConfiguracionPANEL?>" id="datos" role="tabpanel" aria-labelledby="datos-tab">
            <div class="row">
              <div class="col">
              <h3 class="mb-4 mt-4"><?= __('me 7') ?></h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 9') ?></label>
                    <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["nombre"]?>" name="nombre" disabled>
                    <div class="input-group-append edit">
                      <button class="btn-edit" type="button"><i class="bi bi-pencil"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 10') ?></label>
                    <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["apellido"]?>" name="apellido" disabled>
                    <div class="input-group-append edit">
                      <button class="btn-edit" type="button"><i class="bi bi-pencil"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 11') ?></label>
                    <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["email"]?>" name="email" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 12') ?></label>
                    <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["telefono"]?>" name="telefono" disabled>
                    <div class="input-group-append edit">
                      <button class="btn-edit" type="button"><i class="bi bi-pencil"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 13') ?></label>
                    <select class="form-control border-right-0" name="pais" id="paisData" disabled>
                    <?php  foreach ($paises as $row) { ?>
                      <option value="<?= $row['nombre'] ?>"><?= $row['nombre'] ?></option>
                     <?php } ?>
                    </select>
                    <!-- <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["pais"]?>" name="pais" disabled> -->
                    <div class="input-group-append edit">
                      <button class="btn-edit-select" type="button"><i class="bi bi-pencil"></i></button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 14') ?></label>
                    <input type="date" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["nacimiento"]?>" name="fecha" disabled>
                    <div class="input-group-append edit">
                      <button class="btn-edit" type="button"><i class="bi bi-pencil"></i></button>
                    </div>             
                  </div>
                  <small class="form-text text-muted"><?= __('me 15') ?></small>
                </div>
                <div class="col-md-6 d-none">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 14') ?></label>
                    <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["genero"]?>" name="genero" disabled>
                    <div class="input-group-append edit">
                      <button class="btn-edit" type="button"><i class="bi bi-pencil"></i></button>
                    </div>             
                  </div>
                  <small class="form-text text-muted"><?= __('me 15') ?></small>
                </div>
                <div class="col-md-6 d-none">
                  <div class="input-group mb-3">
                    <label class="col-form-label"><?= __('me 14') ?></label>
                    <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["quiero"]?>" name="quiero" disabled>
                    <div class="input-group-append edit">
                      <button class="btn-edit" type="button"><i class="bi bi-pencil"></i></button>
                    </div>             
                  </div>
                  <small class="form-text text-muted"><?= __('me 15') ?></small>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-gradient btn-block gradient-1 mt-5 mb-5 btn-save-user"><?= __('me 16') ?></button>
        </div>
        <!-- Usuario y Contraseña-->

        <div class="tab-pane fade show" id="usuario" role="tabpanel" aria-labelledby="usuario-tab">
          <h3 class="mb-4 mt-4"><?= __('me 17') ?></h3>
          <div class="row">
            <div class="col-md-6">
              <label class="col-form-label"><?= __('me 18') ?>:</label>
              <div class="input-group">
                <input type="text" class="form-control border-right-0" value="<?=$buscaInformacionUser[0]["email"]?>" name="nombre" disabled>
              </div>
            </div>
        
            <div class="col-md-6">
              <label class="col-form-label"><?= __('me 19') ?>:</label>
              <div class="input-group mb-3">
                <input type="password" class="form-control password" placeholder="••••••••" disabled>
              </div>
              <!-- <a class="error-password btn-olvido-pass"><?= __('me 20') ?></a> -->
            </div>
          </div>
          <h3 class="mb-4"><?= __('me 21') ?></h3>
          <div class="row">
          <div class="col-md-6">
            <label class="col-form-label"><?= __('me 22') ?>:</label>
            <div class="input-group">
              <input type="password" class="form-control password" name="password" id="txtPassword" placeholder="••••••••" maxlength="8">
              <div class="input-group-append">
                <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="bi bi-eye"></i></button>
              </div>
            </div>
            <div class="mensaje-password"></div>
          </div>
          <div class="col-md-6">
            <label class="col-form-label"><?= __('me 23') ?>:</label>
            <div class="input-group">
              <input type="password" class="form-control password" name="passwordrepeat" id="txtPasswordRepeat" placeholder="••••••••" maxlength="8">
              <div class="input-group-append">
                <button type="button" id="btnToggleRepeat" class="toggleRepeat"><i id="eyeIconRepeat"
                    class="bi bi-eye"></i></button>
              </div>
            </div>
            <div class="mensaje-passwordrepeat"></div>
          </div>
        </div>
      <button type="button" class="btn btn-gradient btn-block gradient-1 mt-5 mb-5 btn-save-pass"><?= __('me 16') ?></button>
    </div>
    </div>
    </div>
    
    </div>

  <!-- Configuracion -->

  <div class="tab-pane fade show" id="configuracion" role="tabpanel" aria-labelledby="configuracion-tab">
    <div class="container">
      <div class="row">
        <div class="col">
          <ul class="nav nav-pills nav-secondary-me mb-5" id="me-secondary-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="cancelacion-cuenta-tab" data-toggle="pill" href="#cancelacion-cuenta" role="tab" aria-controls="cancelacion-cuenta" aria-selected="false"><?= __('me 24') ?></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="cancelacion-exp-tab" data-toggle="pill" href="#cancelacion-exp" role="tab" aria-controls="cancelacion-exp" aria-selected="false"><?= __('me 25') ?></a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="cancelacion-canal-tab" data-toggle="pill" href="#cancelacion-canal" role="tab" aria-controls="cancelacion-canal" aria-selected="false"><?= __('me 26') ?></a>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-content" id="pills-tabContent-configuracion">
        <!-- Cancelacion cuenta -->
        <div class="tab-pane fade show active" id="cancelacion-cuenta" role="tabpanel" aria-labelledby="cancelacion-cuenta-tab">
        <div class="row">
          <div class="col">
            <div class="bg-cancelacion">
              <div class="row">
              <div class="col-md-8">
            <h3><?= __('me 24') ?></h3>
            <p class="text-canc"><?= __('me 27') ?></p>
            </div>
              <div class="col-md-4 d-flex align-items-center">
                <button type="button" class="btn btn-gradient btn-block gradient-1 btn-cancel-cuenta"><?= __('me 28') ?></button>
              </div>
            </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Cancelacion experiencias -->
    <div class="tab-pane fade show" id="cancelacion-exp" role="tabpanel" aria-labelledby="cancelacion-exp-tab">
      <div class="row mb-4">
        <div class="col">
          <h3><?= __('me 25') ?></h3>
          <p class="text-canc"><?= __('me 29') ?></p>
        </div>
      </div>
      <div class="row no-gutters border border-dark border-bottom-0 pt-3 pb-3 d-sm-none d-none d-md-flex">
        <div class="col-md-1"></div>
        <div class="col-md-6"><?= __('me 30') ?></div>
        <div class="col-md-2"><?= __('me 31') ?></div>
        <div class="col-md-2"><?= __('me 32') ?></div>
      </div>
      <div class="border border-dark">

          <?php 

            foreach($arrayMisProductos as $row) {
              $contenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $row['contenidoId'], $token);
              $data = json_decode($contenido, true);
              $tipo = $data[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA';
              if($data[0]['tipoContenidoId'] == 2){
            ?>
            <div class="card card-perfil pb-3 pt-3">
              <div class="row no-gutters">
                <div class="col-md-1 col-2 mb-4 d-flex align-items-center justify-content-center">
                  <input class="form-check-input m-0" type="checkbox" value="experiencia">
                </div>
                <div class="col-md-3 col-10 mb-3">
                  <div class="card-image">
                  <img src="backend/<?=$data[0]['previewRuta']?>" alt="canal-ceci-carena" class="img-fluid">
                  </div>
                  </div>
                  <div class="col-md-3 offset-2 offset-md-0 mb-3">
                  <div class="card-body">
                    <div>
                    <h5 class="card-title"><?=$tipo?></h5>
                    <h6 class="card-name"><?=$data[0]['titulo1']?></h6>
                  </div>
                  </div>
                </div>
                <div class="col-md-2 offset-2 offset-md-0 mb-3">
                  <div class="card-detail">
                  <p class="card-text"><?=$data[0]['precioPesos']?> ARS<br>
                    <span>6 meses</span></p>
                  </div>
                </div>
                <div class="col-md-2 offset-2 offset-md-0 mb-3">
                <div class="card-btn">       
                  <button class="btn cancel btn-cancel-canal"><i class="bi bi-x"></i><?= __('me 33') ?></button>
                  </div>
                </div>
              </div>
            </div>
            <?php }} ?>

        </div>
        <div class="row">
          <div class="col text-right">
        <button type="button" class="btn btn-outline-more mt-4 mb-4"><?= __('me 34') ?></button>
      </div>
      </div>
    </div>
    <!-- Cancelacion canales -->
    <div class="tab-pane fade show" id="cancelacion-canal" role="tabpanel" aria-labelledby="cancelacion-canal-tab">
      <div class="row mb-4">
        <div class="col">
          <h3><?= __('me 26') ?></h3>
          <p class="text-canc"><?= __('me 35') ?></p>
        </div>
      </div>
      <div class="row no-gutters border border-dark border-bottom-0 pt-3 pb-3 d-sm-none d-none d-md-flex">
        <div class="col-md-1"></div>
        <div class="col-md-6"><?= __('me 36') ?></div>
        <div class="col-md-2"><?= __('me 31') ?></div>
        <div class="col-md-2"><?= __('me 30') ?></div>
      </div>
      <div class="border border-dark">


          <?php foreach($arrayMisProductos as $row) {
              $contenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $row['contenidoId'], $token);
              $data = json_decode($contenido, true);
              $tipo = $data[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA';
              if($data[0]['tipoContenidoId'] == 1){
            ?>
            <div class="card card-perfil pb-3 pt-3">
              <div class="row no-gutters">
                <div class="col-md-1 col-2 mb-4 d-flex align-items-center justify-content-center">
                  <input class="form-check-input m-0" type="checkbox" value="experiencia">
                </div>
                <div class="col-md-3 col-10 mb-3">
                  <div class="card-image">
                  <img src="backend/<?=$data[0]['previewRuta']?>" alt="canal-ceci-carena" class="img-fluid">
                  </div>
                  </div>
                  <div class="col-md-3 offset-2 offset-md-0 mb-3">
                  <div class="card-body">
                    <div>
                    <h5 class="card-title"><?=$tipo?></h5>
                    <h6 class="card-name"><?=$data[0]['titulo1']?></h6>
                  </div>
                  </div>
                </div>
                <div class="col-md-2 offset-2 offset-md-0 mb-3">
                  <div class="card-detail">
                  <p class="card-text"><?=$data[0]['precioPesos']?> ARS<br>
                    <span>6 meses</span></p>
                  </div>
                </div>
                <div class="col-md-2 offset-2 offset-md-0 mb-3">
                <div class="card-btn">       
                  <button class="btn cancel btn-cancel-canal"><i class="bi bi-x"></i><?= __('me 33') ?></button>
                  </div>
                </div>
              </div>
            </div>
            <?php }} ?>
        </div>
        <div class="row">
          <div class="col text-right">
        <button type="button" class="btn btn-outline-more mt-4 mb-4"><?= __('me 34') ?></button>
      </div>
      </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Pagos -->
        <div class="tab-pane fade show" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
          <div class="container">
            <div class="row">
              <div class="col">
                <ul class="nav nav-pills nav-secondary-me mb-5" id="me-secondary-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="metodo-tab" data-toggle="pill" href="#metodo" role="tab" aria-controls="metodo" aria-selected="false"><?= __('me 37') ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="historial-tab" data-toggle="pill" href="#historial" role="tab" aria-controls="historial" aria-selected="false"><?= __('me 38') ?></a>
                  </li>
                  
                </ul>
              </div>
            </div>
        
            <div class="tab-content" id="pills-tabContent-pagos">
              <div class="tab-pane fade show active" id="metodo" role="tabpanel" aria-labelledby="metodo-tab">
              <div class="row">
                <div class="col">
                  <div class="bg-cancelacion">
                    <div class="row">
                    <div class="col">
                      <h3><?= __('me 37') ?></h3>
                      <p class="text-canc"><?= __('me 39') ?></p>
                      <img src="imgs/mercado-pago.png" alt="mercado pago" class="m-3" style="max-width: 100px;">
                      <img src="imgs/paypal.png" alt="mercado pago" class="m-3" style="max-width: 100px;">
                  </div>
                  </div>

                  </div>
                </div>
              </div>
        </div>
        
        <div class="tab-pane fade show" id="historial" role="tabpanel" aria-labelledby="historial-tab">
          <div class="row mb-4">
            <div class="col">
              <h3><?= __('me 38') ?></h3>
              <select class="form-control select-historial">
                <option>202</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">05 de Julio, 2020</div>
            <div class="col"><p class="perfil-total">TOTAL: ARS 300</p></div>
          </div>
          <div class="row no-gutters border border-dark border-bottom-0 p-3 d-sm-none d-none d-md-flex">
            <div class="col-md-5">CANAL/EXPERIENCIA</div>
            <div class="col-md-5">DETALLES</div>
            <div class="col-md-2">PAGO</div>
          </div>
          <div class="border border-dark">
              <div class="card card-perfil pb-3 pt-3">
                <div class="row no-gutters p-3">
                  <div class="col-md-2 mb-3">
                    <div class="card-image">
                    <img src="imgs/canal/canal-gonzalo-aramburu-195x110.jpg" alt="canal-gonzalo-aramburu" class="img-fluid">
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <div class="card-body">
                      <div>
                      <h5 class="card-title">Gonzalo Aramburu</h5>
                      <h6 class="card-name">MASTERCLASS DE COCINA</h6>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-5 mb-3">
                  <div class="card-btn-more"> 
                    <button class="btn bt-pago">VER</button>
                    <button class="btn bt-pago">DESCARGAR FACTURA</button>
                    <div class="card-fecha">Julio 2020</div>   
                    </div>
                  </div>
                  <div class="col-md-2 mb-3">
                    <div class="card-pago">
                    <p class="card-text">300 ARS<br>por mes</p>
                    <button class="btn bt-pago">COMPLETAR</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-info btn-gray mt-4 mr-auto ml-auto vermas">ver más</button>
            
        </div>
        </div>
              </div>
        
            </div>

      <div class="tab-pane fade <?=$activeCanalesPANEL?>" id="canales" role="tabpanel" aria-labelledby="canales-tab">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-12"><h2>me canales</h2></div>
              <div class="col-md-6 col-sm-12"><p class="cantcont">Tenés <?=$cantidadCanales?> canales disponibles</p></div>
            </div>
            <?php foreach($arrayMisProductos as $row) {
              $contenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $row['contenidoId'], $token);
              $data = json_decode($contenido, true);
              $tipo = $data[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA';
              if($data[0]['tipoContenidoId'] == 1){
            ?>
            <div class="me-content d-flex align-items-center mt-4">
              <div class="bg-card-perfil"></div>
              <div class="me-info">
                <h4><?=$tipo?></h4>
                <h3><?=$data[0]['contenidoTitulo']?></h3>
                <a type="button" href="contenido?contenido=<?=$row['contenidoId']?>" class="btn btn-sm btn-gradient">VER CANAL</a>
              </div>
              <img width="100%" src="backend/<?=$data[0]['previewRutaContenido']?>" srcset="backend/<?=$data[0]['previewRuta']?>" alt="<?=$data[0]['contenidoTitulo']?>" class="img-fluid">
            </div>
            <?php }} ?>
            <?php if($cantidadCanales != 0) {?>
            <button type="button" class="btn btn-info btn-gray mt-4 mr-auto ml-auto vermas">ver más</button>
            <?php } ?>
        </div>

      </div>
      <div class="tab-pane fade <?=$activeExperienciasPANEL?>" id="experiencias" role="tabpanel" aria-labelledby="experiencias-tab">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-12"><h2>me experiencias</h2></div>
              <div class="col-md-6 col-sm-12"><p class="cantcont">Tenés <?=$cantidadExperiencias?> experiencias disponibles</p></div>
            </div>
      
            <?php foreach($arrayMisProductos as $row) {
              $contenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $row['contenidoId'], $token);
              $data = json_decode($contenido, true);
              $tipo = $data[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA';
              if($data[0]['tipoContenidoId'] == 2){
            ?>
            <div class="me-content d-flex align-items-center mt-4">
              <div class="bg-card-perfil"></div>
              <div class="me-info">
                <h4><?=$tipo?></h4>
                <h3><?=$data[0]['contenidoTitulo']?></h3>
                <a type="button" href="contenido?contenido=<?=$row['contenidoId']?>" class="btn btn-sm btn-gradient">VER CANAL</a>
              </div>
              <img width="100%" src="backend/<?=$data[0]['previewRutaContenido']?>" srcset="backend/<?=$data[0]['previewRuta']?>" alt="<?=$data[0]['contenidoTitulo']?>" class="img-fluid">
            </div>
            <?php }} ?>
            <?php if($cantidadExperiencias != 0) {?>
            <button type="button" class="btn btn-info btn-gray mt-4 mr-auto ml-auto vermas">ver más</button>
            <?php } ?>
        </div>
      </div>
      <div class="tab-pane fade <?=$activeDeseosPANEL?>" id="lista-deseos" role="tabpanel" aria-labelledby="lista-deseos-tab">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12"><h2>Me lista de deseos</h2></div>
            <div class="col-md-6 col-sm-12"><p class="cantcont">Tenés <?=$cantidadDeseos?> contenidos o experiencias en tu lista de deseos</p></div>
          </div>


        <?php foreach($arraymisDeseos as $row) {
          $contenidoDe = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $row['contenidoId'], $token);
          $data = json_decode($contenidoDe, true);
          $tipo = $data[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA';
        ?>
          <div class="me-content d-flex align-items-center mt-4">
            <div class="bg-card-perfil"></div>
            <div class="me-info">
              <h4><?=$tipo?></h4>
              <h3><?=$data[0]['contenidoTitulo']?></h3>
              <a type="button" href="contenido?contenido=<?=$row['contenidoId']?>" class="btn btn-sm btn-gradient">COMPRÁ AHORA</a>
            </div>
            <img width="100%" src="backend/<?=$row['previewRutaContenido']?>" srcset="backend/<?=$row['previewRuta']?>" alt="<?=$data[0]['contenidoTitulo']?>" class="img-fluid">
          </div>
        <?php } ?>

        <?php if($cantidadDeseos != 0) {?>
        <button type="button" class="btn btn-info btn-gray mt-4 mr-auto ml-auto vermas">ver más</button>
        <?php }?>
      </div>
      </div>
    </div>
  </section>

  <?php include_once('inc/footer.php'); ?>
  <?php include_once('inc/modal/compra-exito.php'); ?>


<script>
  $('.btn-cancel-canal').click((e) => {
    $('#cancelarCanal').modal('toggle');
  })
  $('.btn-cancel-exp').click((e) => {
    $('#cancelarExperiencia').modal('toggle');
  })
  $('.btn-cancel-cuenta').click((e) => {
    $('#cancelarCuenta').modal('toggle');
  })


  $('.avanza-cancelar-cuenta').click((e) => {
    $('#cancelarCuenta').modal('toggle');
    $('.over').css('display', 'block');
    setTimeout(function(){ 
      $('.over').css('display', 'none');
      $('#exitoCancelacionCuenta').modal('toggle'); 
    }, 3000);
  })

  $('.avanza-cancelar-canal').click((e) => {
    $('#cancelarCanal').modal('toggle');
    $('.over').css('display', 'block');
    setTimeout(function(){ 
      $('.over').css('display', 'none');
      $('#exitoCancelacionCanal').modal('toggle'); 
    }, 3000);
  })

  $('.avanza-cancelar-exp').click((e) => {
    $('#cancelarExperiencia').modal('toggle');
    $('.over').css('display', 'block');
    setTimeout(function(){ 
      $('.over').css('display', 'none');
      $('#exitoCancelacionExp').modal('toggle'); 
    }, 3000);
  })
  $('#perfil-tab').click((e) => {
    $('#datos').addClass('show active')
  })

$('.btn-edit').on('click', function () {
  var input = $(this).parent().parent().children('input');
  $(input).attr('disabled', false)
});
$('.btn-edit-select').on('click', function () {
  var input = $(this).parent().parent().children('select');
  $(input).attr('disabled', false)
});

//var paisSeleccionado = "<?=$buscaInformacionUser[0]["pais"]?>";
$("#paisData option[value='<?=ucfirst($buscaInformacionUser[0]["pais"])?>'").attr("selected",true);


$('.btn-save-user').on('click', function(e) { 
  e.preventDefault();
  $('.over').css('display', 'block');
  var nombre = $('#pills-tabContent-sub input[name="nombre"]').val();
  var apellido = $('#pills-tabContent-sub input[name="apellido"]').val();
  var telefono = $('#pills-tabContent-sub input[name="telefono"]').val();
  var pais = $('#paisData option:selected').val().toLowerCase();
  var fechaNac = $('#pills-tabContent-sub input[name="fecha"]').val();
  var quiero = $('#pills-tabContent-sub input[name="quiero"]').val();
  var genero = $('#pills-tabContent-sub input[name="genero"]').val();
  var datosUser = {
    nombre: nombre,
    apellido: apellido,
    telefono: telefono,
    pais: pais,
    nacimiento: fechaNac,
    quiero: parseInt(quiero),
    genero: genero,   
  }
  console.log(datosUser);
  $('.over').css('display', 'block');
  var json = JSON.stringify(datosUser);
  $.ajax({
    url:"api/ajax/user.ajax.php",
    method: "POST",
    data: {modif: json},
    success:function(respuesta){ 
      console.log(respuesta);
      if(respuesta.includes('Modified')){
        window.location='salir';
      }
    }
  });
});
$('.btn-save-pass').on('click', function(e) { 
  e.preventDefault();
  var pass = $('#pills-tabContent-sub input[name="password"]').val();
  var passRepeat = $('#pills-tabContent-sub input[name="passwordrepeat"]').val();

  if(pass == '' || pass < 9) {
    var padrePass = $('.mensaje-password')
    $(padrePass).empty();
    $(padrePass).append('<span class="text-danger" style="font-size: 10px">El campo no puede estar vacío y tiene que tener hasta 8 caracteres</span>')
  } else if (passRepeat == '' || passRepeat < 9) {
    var padrePassRepeat = $('.mensaje-passwordrepeat')
    $(padrePassRepeat).empty();
    $(padrePassRepeat).append('<span class="text-danger" style="font-size: 10px">El campo no puede estar vacío y tiene que tener hasta 8 caracteres</span>')
  } else {
    if(pass != passRepeat) {
      var padrePass = $('.mensaje-password')
      var padrePassRepeat = $('.mensaje-passwordrepeat')
      $(padrePass).empty();
      $(padrePassRepeat).empty();
      $(padrePass).append('<span class="text-danger" style="font-size: 10px">Las contraseñas no son iguales</span>')
      $(padrePassRepeat).append('<span class="text-danger" style="font-size: 10px">Las contraseñas no son iguales</span>')
    }  else {

      var data = {
        clave: pass
      }
      var json = JSON.stringify(data);
      $('.over').css('display', 'block');
      $.ajax({
        url:"api/ajax/user.ajax.php",
        method: "POST",
        data: {modifPass: json},
        success:function(respuesta){ 
          console.log(respuesta);
          if(respuesta.includes('Modified')){
            window.location = 'salir'
          }
        }
      });    
    }
  }



})

</script>
<style>
  .user {
    background: #c4637d;
    background: -webkit-gradient(linear, left top, right top, from(#c4637d), to(#784595));
    background: linear-gradient(90deg, #c4637d 0%, #784595 100%);
    width: 100%;
    height: 100%;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center
  }
  .user h1 {
    color: #fff;
    font-size: 70px;
    margin-bottom: 0;
  }

</style>



<?php

if(isset($_GET['er'])) {
  $estado = base64_decode($_GET['er']);
  if($estado == 'approved'){
    $monto = base64_decode($_GET['mm']);
    $nrocompra = base64_decode($_GET['ib']);
    $proveedor = base64_decode($_GET['pp']);
    $moneda = base64_decode($_GET['mn']);
    //echo $email;
    $arrayCompra = array(
        "nroOper" => $nrocompra,
        "monto" => $monto, 
        "tipoMoneda" => $moneda,
        "proveedor" => $proveedor
    );
    $respuesta = ControladorCarrito::ctrCompraOK($arrayCompra, $_SESSION['token']);
    echo $respuesta;


  }
}




?>  