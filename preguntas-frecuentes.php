<?php

require_once('api/inicio.php');
define('SECCION', 'preguntas-frecuentes');
$section = 'preguntas-frecuentes';
$color = 'white';
include_once("inc/header.php");

$preguntasApi = ControladorFaq::ctrMostrarComponentes('faq');
$preguntas = json_decode($preguntasApi, true);
usort($preguntas, function( array $elem1, $elem2 ) {
  return $elem1['orden'] <=> $elem2['orden'];
});


?>


  <header class="header-terms d-flex justify-content-center align-items-center flex-column bg-terms-2">
    <h1><?= __('faq 0')?></h1>
  </header>

  <section class="main-question">
    <div class="container">
      <h2 class="text-center pt-6 pb-6"><?= __('faq 1')?></h2>
      <?php  foreach ($preguntas as $pregunta ) {
        if($pregunta['activo'] == 1) {
        ?>
      <div class="row">
        <div class="col">
          <div class="gradient-line"></div>
          <div class="container-question">
          <h3><?=IDIOMA == 'es' ? $pregunta['pregunta1'] : $pregunta['pregunta2']?></h3>
          <p><?=IDIOMA == 'es' ? $pregunta['respuesta1'] : $pregunta['respuesta2']?></p>
        </div>
        </div>
      </div>
      <?php } } ?>
    </div>
  </section>

<?php include_once('inc/footer.php'); ?>
