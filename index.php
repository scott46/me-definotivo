<?php
require_once('api/inicio.php');
define('SECCION', 'home');
$section = 'home';
$color = 'white';
include_once("inc/header.php");




$idioma = IDIOMA == 'es' ? 1 : 2;
$traeHome = modeloUsuarios::mdlBuscaHome('home/', '1');
$home = json_decode($traeHome, true);
$respuestaContenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $home[0]['contenidoId'], 'Admin');
$contenido = json_decode($respuestaContenido,true);


$banner = ControladorCategorias::ctrMostrarBanner();
$arrayBarrer = json_decode($banner, true);
usort($arrayBarrer, function( array $elem1, $elem2 ) {
  return $elem1['orden'] <=> $elem2['orden'];
});
//var_dump($arrayBarrer);

?>

<header>
  <div class="loader-inner ball-pulse"></div>

  <div class="swiper-container" id="swiper-home">
    <div class="swiper-pagination"></div>
    <div class="swiper-wrapper">
      <?php foreach ($arrayBarrer as $row) { if($row['activo'] == 1){ ?>
      <div class="swiper-slide swiper-white" style="background: url('backend/<?=$row['ruta']?>') no-repeat;background-size: cover;background-position: top;">
        <div class="container wrapper-home d-flex align-items-center">
          <div class="content-text-home">
            <h1><?=IDIOMA == 'es' ? $row['titulo1'] : $row['titulo2'] ?></h1>
            <h3><?=IDIOMA == 'es' ? $row['subtitulo1'] : $row['subtitulo2'] ?></h3>
          </div>
          <a  href="<?=url($row['link'])?>"  class="btn btn-info ml-auto"><?= __('home 2') ?></a>
        </div>
      </div>
      <?php }} ?>

    </div>
  </div>

</header>



  <section id="followme">

    <div class="creadores-fav d-flex flex-row align-items-center mb-auto">
      <div class="text-fav text-center">
      <img src="imgs/follow-me.svg" alt="follow me" class="img-fluid">
      <h3><?= __('home 7') ?></h3>
        <h4><?= __('home 8') ?></h4>
        </div>
    <div class="bg-fav bg-left">
  
    </div>
    <div class="bg-fav bg-right">
  
    </div>
  
  </div>
    <div class="swiper-container" id="swiper-categorias-home" style="overflow: hidden">
      <div class="swiper-wrapper">
 
        <?php foreach($categoriasApi as $categoria ) { if($categoria['activo'] == 1) {
          $idioma = IDIOMA == 'es' ? 1 : 2;
          $idCategoria = $categoria['idCategorias'];
          $rtaContenidos = ControladorContenidos::ctrMostrarContenidosXCategoria($idioma, intval($idCategoria));
          $ContenidosIndex = json_decode($rtaContenidos, true);

          if(PAIS == 'ar') {
            usort($ContenidosIndex, function( array $elem1, $elem2 ) {
                return $elem1['precio'] <=> $elem2['precio'];
            });
          } else {
            usort($ContenidosIndex, function( array $elem1, $elem2 ) {
                return $elem1['precioDolares'] <=> $elem2['precioDolares'];
            });
          }
          if(count($ContenidosIndex) > 0){
            $precioMasBajo = PAIS == 'ar' ? $ContenidosIndex[0]['precio'] : $ContenidosIndex[0]['precioDolares'];
            $idPrecioMasBajo = $ContenidosIndex[0]['idContenidos'];
          } else {
            $precioMasBajo = '';
            $idPrecioMasBajo = '';
          }
         ?> 

        <div class="swiper-slide">
          <div class="card">
            <a href="<?=url('categorias').'#categoria-'.strtolower(str_replace(' ', '-',$categoria['titulo1']))?>" style="color: #000">
              <img src="backend/<?=$categoria['rutaBackground']?>" class="card-img-top img-fluid" alt="viajes aventuras">
            </a>
            <div class="card-body">
              <a href="<?=url('categorias').'#categoria-'.strtolower(str_replace(' ', '-',$categoria['titulo1']))?>" style="color: #000">
                <h5 class="card-title"><?=IDIOMA == 'es' ? $categoria['titulo1'] : $categoria['titulo2']?></h5>
                <a href="<?=url('categorias').'#categoria-'.strtolower(str_replace(' ', '-',$categoria['titulo1']))?>" style="color: #000" class="btn btn-secondary"><?=IDIOMA == 'es' ? 'Desde ' : 'From '?><?=PAIS == 'ar' ? ' $' : ' USD'?><?=$precioMasBajo?></a>
              </a>
            </div>
          </div>
        </div>
        <?php }} ?>

      </div>
      <div class="swiper-button-next swiper-button-white"></div>
      <div class="swiper-button-prev swiper-button-white"></div>
    </div>
  </section>

  <section id="experiencia-exclusiva">
    <div class="header-experiencia-home text-center">
      <h3 class="title-exp"><?= __('home 9') ?></h3>
      <img src="imgs/americanexpressIndex.svg" style="max-width: 230px;" alt="american express no vivas la vida sin ella">
    </div>
    
    <?php if($contenido != NULL){?>
    <div class="banner-experiencia-home be-home-img" style="background: url('backend/<?=$contenido[0]['previewRutaContenido']?>') center center no-repeat; background-size: cover">
      <div class="be-home-info d-flex align-items-center justify-content-end">
        <div class="be-content">
          <h4 class="title-banner"><?=$contenido[0]['elementoTitulo']?></h4>
          <a href="<?=url('contenido')?>?contenido=<?=$contenido[0]['idContenidos']?>" class="btn btn-info m-auto"><?= __('home 10') ?></a>
        </div>
      </div>
    </div>
    <?php } ?>

  </section>
  <section id="gift-card-home">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4 class="title-banner gray text-left"><?= __('home 11') ?></h4>
          <?php if(!isset($_SESSION['token'])) {?>
          <button type="button" class="btn btn-info btn-gray" data-toggle="modal" data-target="#iniciarsesion" ><?= __('home 12') ?></button>
          <?php } else { ?>
          <a class="btn btn-info btn-gray" href="<?=url('categorias')?>"><?= __('home 12') ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <section id="me-haus-home">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center d-flex align-items-center justify-content-start">
          <div class="me-haus-home-content">
            <img src="imgs/me-haus-logo.png" alt="me haus">
            <p><?= __('home 13') ?></p>
            <a href="me-haus" type="button" class="btn btn-info m-auto" style="width: 238 px;"><?= __('home 14') ?></a>
          </div>
        </div>
      </div>
    </div>

  </section>

<?php include_once('inc/footer.php'); ?>

<style>
.swiper-button-next, .swiper-button-prev {
    display: none;
}
.swiper-horizontal > .swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal {
    bottom:  -10px;
}

@media (max-width: 480px){
  #followme .creadores-fav {
      height: 590px;
  } 
  .title-banner {
      padding-right: 10px;
  }
  .footer-med {
    padding-top: 20px;
    padding-bottom: 40px;
  }
  .btn-info {
    max-width: 316px;
    padding: 0.8rem 2.5rem;
  }
}

</style>


<?php
/*=============================================
VALIDAR CORREO REGISTRO DIRECTO
=============================================*/
if(isset($_GET["vrrtcah"])){
  $emailusuario = base64_decode($_GET["vrrtcah"]);
  $codigo =$_GET["mjysiis"];
  $valor = array (
    "usuario" => $emailusuario,
    "codigo" => $codigo
  );
  $validarCorreo = ControladorUsuarios::ctrValidarEmail($valor);
  echo $validarCorreo ;
}


/*=============================================
MODAL RECUPERO CONTRASEÑA
=============================================*/
if(isset($_GET["oollis"])){
  //$emailusuario = base64_decode($_GET["oollis"]);
  $codigo =$_GET["isdfi"];
  echo'<script>$(".btn-recupero").attr("data-olf", "'.$_GET["oollis"].'");$(".btn-recupero").attr("data-weis", "'.$codigo.'");
  $("#recuperocontrasena").modal("toggle");
  </script>';        
}





?>



