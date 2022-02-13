<?php
require_once('api/inicio.php');
define('SECCION', 'terminos-condiciones');
$section = 'checkout';
$color = 'white';
include_once("inc/header.php");


$preguntasApi = ControladorFaq::ctrMostrarComponentes('tyc');
$preguntas = json_decode($preguntasApi, true);
if($preguntas != null){
usort($preguntas, function( array $elem1, $elem2 ) {
  return $elem1['orden'] <=> $elem2['orden'];
});
}

?>


  <header class="header-terms d-flex justify-content-center align-items-center flex-column bg-terms-1">
  <h1><?= __('tyc 0') ?></h1>
  <h2><?= __('tyc 1') ?></h2>
  </header>

  <section class="content-terms">
  <div class="container">
      <div class="row">
        <div class="col">


          <?php  if($preguntas != null) { foreach ($preguntas as $pregunta ) {
            if($pregunta['activo'] == 1) {
            ?>
            <div class="gradient-line"></div>
            <h3><?=IDIOMA == 'es' ? $pregunta['titulo1'] : $pregunta['titulo2']?></h3>
            <p><?=IDIOMA == 'es' ? $pregunta['parrafo1'] : $pregunta['parrafo2']?></p>
          <?php } } }?>

        
        </div>
      </div>
  </div>
  </section>

  <?php include_once('inc/footer.php'); ?>

