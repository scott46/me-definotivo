<?php 

if(isset($_SESSION["token"])){
  $base64 = base64_decode($_SESSION["token"]);
  $porciones = explode("{", $base64);
  $user = explode("}", $porciones[2]);
  $datos = explode(",", $user[0]);
  $email = explode(":", $datos[0]);
} 

$metas = Metas::obtener(SECCION);
$empresa = Config::obtener('empresa');

?>


<!doctype html>
<html lang="<?= IDIOMA ?>" class="html-class">

<head >

  <meta charset="utf-8">
  <title><?= $metas->titulo?></title>
  <meta name="description"            content="<?= $metas->descripcion;?>"/>

  <!-- Twitter Card data -->
  <meta name="twitter:card"           content="summary_large_image"/>
  <?php if(isset($empresa->redes['tw']) AND $empresa->redes['tw']){ ?>
  <meta name="twitter:site"           content="@<?= $empresa->redes['tw'] ?>"/>
  <?php } ?>
  <meta name="twitter:title"          content="<?= $metas->titulo ?>" />
  <meta name="twitter:description"    content="<?= $metas->descripcion;?>" />
  <meta name="twitter:image"          content="<?= $metas->img ?>" />

  <!-- Open Graph data -->
  <meta property="og:title"           content="<?= $metas->titulo ?>" />
  <meta property="og:description"     content="<?= $metas->descripcion;?>"/>
  <meta property="og:image"           content="<?= $metas->img; ?>" />
  <meta property="og:site_name"       content="<?= $empresa->nombre ?>"/>
  <meta property="og:url"             content="<?= Url::actual(); ?>"/>
  <meta name="robots"   content="all">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="<?=BASE_URL.'node_modules/bootstrap-icons/font/bootstrap-icons.css'?>" rel="stylesheet">
  <!-- swiper -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
  <link rel="stylesheet" href="<?=BASE_URL.'css/main.css'?>">

  <title>Me Member Experiences</title>

  <!-- Archivos de idiomas -->
  <base href="<?= BASE_URL ?>">
  <link rel="canonical" href="<?= Url::actual() ?>" />
  <?php 
  if( Idioma::deteccionHabilitada() ){
    foreach(Idioma::idiomasDisponibles() AS $idioma){
      echo '<link rel="alternate" hreflang="'.$idioma.'" href="'.Url::actual($idioma).'" />'."\r\n";
    }
  } ?>

  <link rel="icon" href="imgs/favicon/favicon-32x32.png" sizes="40x40">
  
</head>
<body>

