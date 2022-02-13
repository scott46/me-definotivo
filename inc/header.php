<?php

if(isset($_SESSION['iniciales'])){
  $data = explode("-", $_SESSION['iniciales']);
  $iniciales = $data[0][0].$data[1][0];
  define('INICIALES', $iniciales);
}

if (isset($_SESSION["pais"])) {
  if(strtolower($_SESSION["pais"]) == 'argentina'){
    define('PAIS', 'ar');
  } else {
    define('PAIS', 'Internacional');
  }
} else {
  define('PAIS', 'ar');
}

//echo PAIS;


include_once("inc/head.php");
include_once("modal/inicio-sesion.php");
include_once("modal/registro.php");
include_once("modal/no-verificada.php");
include_once("modal/cuenta-verificada.php");  
include_once("modal/olvide-contrasena.php");
include_once("modal/registro-exito.php");
include_once("modal/email-envio.php");
include_once("modal/recupero.php");
include_once("modal/newpass-exitosa.php");
include_once("modal/reenviar-mail.php");
include_once("spinner.php");

//busco categorias
$respuestacategoriasApi = ControladorCategorias::ctrMostrarCaterogias('');
$categoriasApi = json_decode($respuestacategoriasApi, true);
if($categoriasApi != ''){
  usort($categoriasApi, function( array $elem1, $elem2 ) {
    return $elem1['orden'] <=> $elem2['orden'];
  });
}

?>
<div class="overlay" data-ini="<?=INICIALES?>"></div>
<nav class="navbar navbar-expand-lg <?php if($color == 'white') { echo 'navbar-dark';} else { echo 'navbar-light';} ?> fixed-top" id="nav-me">

  <div class="container">
    <a class="navbar-brand" href="index.php"></a>
    <div class="search-box d-flex flex-row align-items-center" id="search-box-desktop">
      <button class="bt-search" type="submit"><i class="bi bi-search"></i></button>
      <input class="form-control form-search" type="search" placeholder="Buscar..." aria-label="Search">
      <button class="bt-close"><i class="bi bi-x"></i></button>
    </div>
    <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarGeneralContent" aria-controls="navbarGeneralContent" aria-expanded="false" aria-label="Toggle navigation">
      <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
    </button>

    <!--Categorias API -->
    <div class="collapse navbar-collapse" id="navbarCategorias">
      <ul class="navbar-nav">
        <?php foreach ($categoriasApi as $row) { 
          if($row['activo']===1) {  
           ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=url('categorias')?>#categoria-<?=strtolower(str_replace(' ', '-',$row['titulo1']))?>"><?=IDIOMA == 'es' ? mb_strtoupper($row['titulo1']) : mb_strtoupper($row['titulo2'])?></a>
            </li>
            <?php  
          }
        }  ?>
      </ul>
      <i class="bi bi-chevron-left back-bt"></i>
    </div>

    <!--Perfil-->
    <div class="collapse navbar-collapse" id="navbarPerfil">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?=url('me')?>"><i class="bi bi-person-fill mr-3"></i><?= __('menu 2') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=url('me')?>?active=canales"><i class="bi bi-star-fill mr-3"></i><?= __('menu 3') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=url('me')?>?active=experiencias"><i class="bi bi-star-fill mr-3"></i><?= __('menu 4') ?></a>
        </li>
        <li class="nav-item mb-3">
          <a class="nav-link" data-toggle="modal" data-target="#mecodigos"><i class="bi bi-star-fill mr-3"></i><?= __('menu 5') ?></a>
        </li>
        <li class="nav-item border-top border-white border-bottom pb-2 pt-2">
          <a class="nav-link" href="me.php?active=deseos"><i class="bi bi-heart mr-3"></i><?= __('menu 6') ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="salir.php"><i class="bi bi-power mr-3"></i><?= __('menu 7') ?></a>
        </li>
      </ul>
      <i class="bi bi-chevron-left back-bt"></i>
    </div>

    <div class="collapse navbar-collapse" id="navbarGeneralContent">
      <div class="search-box d-flex flex-row align-items-center" id="search-box-mobile">
        <button class="bt-search" type="submit"><i class="bi bi-search"></i></button>
        <input class="form-control form-search" type="search" placeholder="Buscar..." aria-label="Search">
        <button class="bt-close"><i class="bi bi-x"></i></button>
      </div>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navbar-collapse bt-categoria" href="#" data-toggle="collapse" data-target="#navbarCategorias" aria-controls="navbarCategorias" aria-expanded="false" aria-label="Toggle navigation"><?= __('menu 0') ?> <i class="bi bi-chevron-down"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=url('preguntas-frecuentes')?>"><?= __('menu 1') ?></a>
        </li>

        <?php if (!isset($_SESSION["token"])) { ?>
        <li class="nav-item">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#registro"><?= __('menu 8') ?></button>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#iniciarsesion"><?= __('menu 9') ?></button>
        </li>
        <?php } ?>

        <li class="nav-item nav-icon nav-search">
          <a class="nav-link search-open" href="#"><i class="bi bi-search"></i></a>
        </li>

        <?php if (isset($_SESSION["token"])) { ?>
        <li class="nav-item nav-icon box-lenght">
          <a class="nav-link" href="<?=url('productos')?>"><i class="bi bi-bag"></i></a>
        </li>
        <?php } ?>

        <?php if (isset($_SESSION["token"])) { ?>
        <li class="nav-item nav-icon bt-person" >
          <a class="nav-link navbar-collapse" href="#" data-toggle="collapse" data-target="#navbarPerfil" aria-controls="navbarPerfil" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-person"></i></a>
        </li>
        <?php } ?>

        <li class="nav-item">
          <p class="nav-link idioma">
            <?php
              $contenido = isset($_GET['contenido']) ? '?contenido='.$_GET['contenido'] : '';
              $elemento = isset($_GET['elemento']) ? '?elemento='.$_GET['elemento'] : '';
            ?>
            <a <?=IDIOMA==='es' ? 'style="text-decoration: underline"' :'' ?> href="<?= Url::actual('es').$contenido.$elemento?>" >ESP</a> | <a <?=IDIOMA==='en' ? 'style="text-decoration: underline"' :'' ?> href="<?= Url::actual('en').$contenido.$elemento?>" >ENG</a>
          </p>
        </li>
      </ul>
    </div>
    
  </div>
</nav>

<style>
  #navbarCategorias {
  left: <?= isset($_SESSION["token"]) ? '19%' : '19%'; ?>;
}

@media (min-width: 1200px) {
  #navbarCategorias {
    left: <?= isset($_SESSION["token"]) ? '45%;' : '32%'; ?>;
  }
}
.box-lenght {
  position: relative;
}
.car-lenght {
  width: 21px;
  background: #000;
  font-size: 10px;
  color: #fff;
  position: absolute;
  border-radius: 50%;
  height: 20px;
  top: 15px;
  left: 20px;
  text-align: center;
  line-height: 20px;
}
#navbarCategorias.navbar-collapse, #navbarPerfil.navbar-collapse {
  <?=IDIOMA == 'en' ? 'left: 60%' : ''?>
}
#navbarPerfil {
  max-width: 240px;
  <?=IDIOMA == 'en' ? 'left: 80%!important' : ''?>
}
.nav-item:nth-child(even) button{
  border-left: none;
}

</style>