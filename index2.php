<?php
require_once('api/inicio.php');
define('SECCION', 'home');
$section = 'home';
$color = 'white';
include_once("inc/header.php");

$token = json_decode($_SESSION["token"], true);
$banners = mdlMostrarBanner($token);
$arrayBanner = json_decode($banners, true);


function mdlMostrarBanner($token){
  $url = "https://resetea.com.ar/banners/";
  $envioJSON = '';
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_POST, FALSE);
  curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json', 'Authorization: Bearer '.$token.'']);
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
  //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $resultado = curl_exec($curl);
  curl_close($curl);
  return $resultado;
}

?>

<header>
  <div class="loader-inner ball-pulse"></div>

  <div class="swiper-container" id="swiper-home">
  <div class="swiper-pagination"></div>
    <div class="swiper-wrapper">


    <?php foreach ($arrayBanner as $banner) { if($banner['activo'] == 1) {?>
      <div class="swiper-slide swiper-white " style="background: url('https://reinicia.com.ar/me/plataforma/backend/<?=$banner['ruta']?>') center center no-repeat; background-size: cover">
        <div class="container wrapper-home d-flex align-items-center">
          <div class="content-text-home">
            <h2><?=IDIOMA == 'es' ? $banner['titulo1'] : $banner['titulo2']?></h2>
            <h3><?=IDIOMA == 'es' ? $banner['subtitulo1'] : $banner['subtitulo2']?></h3>
          </div>
          <?php if($banner['link'] != '') {?>
          <a href="<?=$banner['link']?>" type="button" class="btn btn-info ml-auto">EXPLORá las experiencias</a>
          <?php } ?>
        </div>
      </div>
      <?php }} ?>




<!--       
      <div class="swiper-slide swiper-white img-home-1">
        <div class="container wrapper-home d-flex align-items-center">

      <div class="content-text-home">
      <h1><?= __('home 0') ?></h1>
      <h3>Generamos contenidos unicos para una audiencia global exigente<br>y potenciamos talentos como parte de un negocio rentable.</h3>
      </div>
      <button type="button" class="btn btn-info ml-auto">EXPLORá las experiencias</button>
      </div>

      </div>

      <div class="swiper-slide swiper-white img-home-2">
        <div class="container wrapper-home d-flex align-items-center">
          <div class="content-text-home">
          <h2>Experiencias<br>Únicas</h2>
          <h3>Accedé a experiencias únicas, creá recuerdos memorables junto a los creadores del momento.</h3>
          </div>
          <button type="button" class="btn btn-info ml-auto">EXPLORá las experiencias</button>
          </div>
      </div>

      <div class="swiper-slide swiper-black img-home-4">
        <div class="container wrapper-home d-flex align-items-center">

          <div class="content-text-home">
          <h2 class="text-white">CREAMOS<br>CONTENIDO</h2>
          <h3 class="text-white">Descubre los mejores contenido y<br>disfrutá las mejores experiencias<br>dónde quieras, cuándo quieras.</h3>
          </div>
          <button type="button" class="btn btn-info ml-auto">EXPLORá las experiencias</button>
          </div>
      </div> -->

    </div>
  </div>

</header>



  <section id="followme">

    <div class="creadores-fav d-flex flex-row align-items-center mb-auto">
      <div class="text-fav text-center">
      <img src="imgs/follow-me.svg" alt="follow me" class="img-fluid">
      <h3>Seguí a tus<br>
        creadores favoritos</h3>
        <h4>Explorá nuestras categorías, accedé a contenidos streaming y on-demand de los creadores que te inspiran.</h4>
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
          usort($ContenidosIndex, function( array $elem1, $elem2 ) {
              return $elem1['precio'] <=> $elem2['precio'];
          });
          $precioMasBajo = $ContenidosIndex[0]['precio'];
          $idPrecioMasBajo = $ContenidosIndex[0]['idContenidos'];
         ?> 

        <div class="swiper-slide">
          <div class="card">
            <a href="<?=url('categorias').'#categoria-'.strtolower(str_replace(' ', '-',$categoria['titulo1']))?>" style="color: #000">
              <img src="backend/<?=$categoria['rutaBackground']?>" class="card-img-top img-fluid" alt="viajes aventuras">
            </a>
            <div class="card-body">
              <a href="<?=url('categorias').'#categoria-'.strtolower(str_replace(' ', '-',$categoria['titulo1']))?>" style="color: #000">
                <h5 class="card-title"><?=IDIOMA == 'es' ? $categoria['titulo1'] : $categoria['titulo2']?></h5>
                <a href="<?=url('contenido')?>?contenido=<?=$idPrecioMasBajo?>" class="btn btn-secondary">Desde $<?=$precioMasBajo?></a>
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
      <h3 class="title-exp">Disfrutá de experiencias<br>exclusivas con</h3>
      <img src="imgs/amex-logo.png" alt="american express no vivas la vida sin ella">
    </div>
    <div class="banner-experiencia-home be-home-img">
      <div class="be-home-info d-flex align-items-center justify-content-end">
        <div class="be-content">
          <h4 class="title-banner">CARNAROLI<br>ENTRERRIANO</h4>
          <button type="button" class="btn btn-info m-auto">suscribite</button>
        </div>
      </div>
    </div>
  </section>
  <section id="gift-card-home">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4 class="title-banner gray">Regalale a alguien especial el contenido que te gusta</h4>
          <button type="button" class="btn btn-info btn-gray">comprar ahora</button>
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
            <p>En ME Haus encontrarás el mejor espacio para realizar
              tus contenidos. Te ofrecemos herramientas de comunicación, capacitación profesional,
              locaciones exclusivas y servicios de producción audiovisual.</p>
            <a href="me-haus" type="button" class="btn btn-info m-auto" style="width: 238 px;">CONTACTATE AHORA</a>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!--<div class="gradient-line"></div>
  <section id="descarga-me">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="imgs/descarga-me.png" alt="descarga ME" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center">
          <div class="descarga-content">
            <h4 class="title-descarga-me">Descargá</h4>
            <p class="desc-descarga">Disfrutá de todo el contenido<br>cuando quieras, donde quieras.</p>
            <a href=""><img src="imgs/bt-appstore.jpg" alt="app store"></a>
            <a href=""><img src="imgs/bt-googleplay.jpg" alt="app store" class="ml-2"></a>
          </div>
        </div>
      </div>
    </div>

  </section>-->
<!--   <script>

    setTimeout(function(){ 
      $('.spinner-entrada').addClass('invible');
      $(".html-class").removeClass('hmtl-activa');   
    }, 500);
  

</script>
 -->
<?php include_once('inc/footer.php'); ?>




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



