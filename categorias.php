<?php

require_once('api/inicio.php');
define('SECCION', 'categorias');
include_once("inc/header.php");
$section = 'categorias';
//color de pagina
$color = 'black';

if(isset($_SESSION["token"])) {
  $token = $_SESSION["token"];  
} else {
$token = 'Admin';
}
$buscoLosLikes = modeloCarrito::mdlMostrarProductos('deseos/actual', '1', $token);
$arraybuscoLosLikes=json_decode($buscoLosLikes, true); 





?>

<header class="header-secciones d-flex align-items-start flex-column">
  <div class="creadores-fav d-flex flex-row align-items-center mb-auto">
    <div class="text-fav text-center">
      <img src="imgs/follow-me.svg" alt="follow me" class="img-fluid">
      <h1><?= __('categorias 0') ?><br>
      <?= __('categorias 1') ?></h1>
      <h4><?= __('categorias 2') ?></h4>
    </div>
    <div class="bg-fav bg-left">
    </div>
    <div class="bg-fav bg-right">
    </div>
  </div>
  <div class="swiper-container swiper-categorias-texto" style="overflow: hidden; position: relative;">
    <div class="swiper-wrapper">
    <?php foreach ($categoriasApi as $categoria ) { if($categoria['activo'] == 1) {?>
      <div class="swiper-slide"><a href="categorias.php#categoria-<?=strtolower(str_replace(' ', '-',$categoria['titulo1']))?>"><?=IDIOMA == 'es' ? $categoria['titulo1'] : $categoria['titulo2']?></a></div>
    <?php }} ?>      
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</header>


<?php  foreach(array_slice($categoriasApi, 0, 4) as $categoriaApi){ 
  //var_dump($categoriasApi);
  $idioma = IDIOMA == 'es' ? 1 : 2;
  $idCategoria = $categoriaApi['idCategorias'];
  $rtaContenidos = ControladorContenidos::ctrMostrarContenidosXCategoria($idioma, intval($idCategoria));
  $ContenidosIndex = json_decode($rtaContenidos, true);
  if(count($ContenidosIndex) > 0){
    usort($ContenidosIndex, function( array $elem1, $elem2 ) {
      return $elem1['ordenContenido'] <=> $elem2['ordenContenido'];
    });
  }

  if($categoriaApi['activo'] == 1) { ?>

    <?php if($categoriaApi['ae'] == 1) { ?> 
      <div class="header-experiencia-home text-center">
        <h3 class="title-exp"><?= __('categorias 3') ?></h3>
        <img src="imgs/americanexpress.svg" style="max-width: 170px;" alt="American Express">
      </div>
    <?php } ?> 

    <section id="categoria-<?=strtolower(str_replace(' ', '-',$categoriaApi['titulo1']))?>">
      <div class="header-categorias c-entretenimiento d-flex justify-content-center align-items-center" style="background: url('backend/<?=$categoriaApi['rutaBackground']?>') no-repeat; background-size: cover !important; background-position: center;">
        <h3><?=IDIOMA == 'es' ? $categoriaApi['titulo1'] : $categoriaApi['titulo2']?></h3>
        <div class="bg-black"></div>
      </div>
      <div class="container content-categorias">


        <div class="row row-cols-1 row-cols-md-3">
        <?php foreach (array_slice($ContenidosIndex, 0, 3) as $Contenido) {  $fechainicial = new DateTime($Contenido["Desde"]); $fechafinal = new DateTime($Contenido["Hasta"]); $diferencia = $fechainicial->diff($fechafinal); $meses = ($diferencia->y*12)+$diferencia->m; $dias = ($diferencia->days); 
            $datoDuracion = $meses == 0 ? $dias.' dias' : $meses.' meses'; ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                  <a href="<?=url('contenido')?>?contenido=<?=$Contenido['idContenidos']?>" style="text-decoration: none; color: #212529">
                    <div class="box-image" style="position: relative; ">
                      <img src="backend/<?=$Contenido['previewRuta']?>" class="card-img-top" alt="experiencia-juan-minujin">
                      <?=strtotime(date("d-m-Y H:i:00",time())) < strtotime(date('d-m-Y H:i:00',strtotime($Contenido["Desde"]))) ? '<div style="position: absolute; bottom: 0px; left:0px; text-align: center; color: #fff; padding: 20px; background: #2F2F2F; font-weight: bold;font-size: 13px;letter-spacing: 1px;width: 100%;">PROXIMAMENTE</div>' :''?>
                    </div>  
                    <div class="d-flex flex-row">
                      <div class="card-body">
                        <h5 class="card-title"><?=$Contenido['descripcionTipoContenido']?></h5>
                        <h6 class="card-name mb-2"><?=ucfirst($Contenido['tituloContenido'])?></h6>
                      </div>
                      <div class="card-price"><?=PAIS == 'ar' ? '$' : 'USD'?> <?=PAIS == 'ar' ? $Contenido['precio'] : $Contenido['precioDolares']?></div>
                    </div>
                  </a>
                  <div class="card-footer d-flex flex-row align-items-end">
                    <div class="card-info">
                      <p class="card-desc"><?=$Contenido['tituloVideos']?></p>
                      <p class="card-time"><?=$Contenido['descripcionTipoContenido'] != 'Canal' ? 'desde el '.date("d/m/Y H:m",strtotime($Contenido['Desde'])) : $datoDuracion?></p>
                    </div>
                    <?php if(isset($_SESSION['token'])) { ?>
                    <div class="card-links">  
                    <?php include "inc/enlaces_redes_categoria.php"; ?>
                    </div>
                      <?php $deseoOk = in_array($Contenido['idContenidos'], array_column($arraybuscoLosLikes, 'contenidoId')); ?>
                      <a data-estado="<?=$deseoOk == 0 ? '0' : '1'?>" class="like" data-like="<?=$Contenido['idContenidos']?>"><i class="bi bi-heart<?=$deseoOk == 1 ? '-fill' : ''?>"></i></small></a>
                    <?php } ?>
                  </div>
                </div>
            </div>
          <?php } ?>
        </div>

        <div class="row row-cols-1 row-cols-md-3 collapse" id="vermas<?=$categoriaApi['idCategorias']?>">
        <?php foreach (array_slice($ContenidosIndex, 3) as $Contenido) {  $fechainicial = new DateTime($Contenido["Desde"]); $fechafinal = new DateTime($Contenido["Hasta"]); $diferencia = $fechainicial->diff($fechafinal); $meses = ($diferencia->y*12)+$diferencia->m; $dias = ($diferencia->days); 
            $datoDuracion = $meses == 0 ? $dias.' dias' : $meses.' meses'; ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                  <a href="<?=url('contenido')?>?contenido=<?=$Contenido['idContenidos']?>" style="text-decoration: none; color: #212529">
                    <div class="box-image" style="position: relative; ">
                      <img src="backend/<?=$Contenido['previewRuta']?>" class="card-img-top" alt="
                    experiencia-juan-minujin">
                    </div>  
                    <?=strtotime(date("d-m-Y H:i:00",time())) < strtotime(date('d-m-Y H:i:00',strtotime($Contenido["Desde"]))) ? '<div style="position: absolute; bottom: 0px; left:0px; text-align: center; color: #fff; padding: 20px; background: #2F2F2F; font-weight: bold;font-size: 13px;letter-spacing: 1px;width: 100%;">PROXIMAMENTE</div>' :''?>
                    <div class="d-flex flex-row">
                      <div class="card-body">
                        <h5 class="card-title"><?=$Contenido['descripcionTipoContenido']?></h5>
                        <h6 class="card-name mb-2"><?=ucfirst($Contenido['tituloContenido'])?></h6>
                      </div>
                      <div class="card-price"><?=PAIS == 'ar' ? '$' : 'USD'?> <?=PAIS == 'ar' ? $Contenido['precio'] : $Contenido['precioDolares']?></div>
                    </div>
                  </a>
                  <div class="card-footer d-flex flex-row align-items-end">
                    <div class="card-info">
                      <p class="card-desc"><?=$Contenido['tituloVideos']?></p>
                      <p class="card-time"><?=$Contenido['descripcionTipoContenido'] != 'Canal' ? 'desde el '.date("d/m/Y H:m",strtotime($Contenido['Desde'])) : $datoDuracion?></p>
                    </div>
                    <?php if(isset($_SESSION['token'])) { ?>
                    <div class="card-links">  
                    <?php include "inc/enlaces_redes_categoria.php"; ?>
                    </div>
                      <?php $deseoOk = in_array($Contenido['idContenidos'], array_column($arraybuscoLosLikes, 'contenidoId')); ?>
                      <a data-estado="<?=$deseoOk == 0 ? '0' : '1'?>" class="like" data-like="<?=$Contenido['idContenidos']?>"><i class="bi bi-heart<?=$deseoOk == 1 ? '-fill' : ''?>"></i></small></a>
                    <?php } ?>
                 </div>
                </div>
            </div>
          <?php } ?>
        </div>
        <?php if(count($ContenidosIndex) >= 4) { ?>           
          <button type="button" data-toggle="collapse" data-target="#vermas<?=$categoriaApi['idCategorias']?>" class="btn btn-info btn-gray mt-4 mr-auto ml-auto vermas">ver más</button>
        <?php } ?>           
    </div>
  </section>
<?php } } ?>



<section id="descubri-novedades">
  <div class="container">
    <h3><?= __('categorias 4') ?></h3>
    <p class="text-novedades"><?= __('categorias 5') ?></p>
    <form id="novedades">
      <div class="form-row">
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Correo electrónico">
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Nombre completo">
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-info mb-2"><?= __('categorias 6') ?></button>
        </div>
      </div>

    </form>
    <div class="row">
      <div class="col-md-12">
        <p class="text-novedades"><?= __('categorias 7') ?></p>
      </div>

      <div class="col-md-4">
        . <?= __('categorias 8') ?>
      </div>
      <div class="col-md-4">
        . <?= __('categorias 9') ?>
      </div>
      <div class="col-md-4">
        . <?= __('categorias 10') ?>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <p class="terms-registro mt-5"><?= __('categorias 11') ?></p>
      </div>
    </div>
  </div>
  </div>
</section>


<?php  foreach(array_slice($categoriasApi, 4) as $categoriaApi){ 
  //var_dump($categoriasApi);
  $idioma = IDIOMA == 'es' ? 1 : 2;
  $idCategoria = $categoriaApi['idCategorias'];
  $rtaContenidos = ControladorContenidos::ctrMostrarContenidosXCategoria($idioma, intval($idCategoria));
  $ContenidosIndex = json_decode($rtaContenidos, true);
  if(count($ContenidosIndex) > 0){
    usort($ContenidosIndex, function( array $elem1, $elem2 ) {
      return $elem1['ordenContenido'] <=> $elem2['ordenContenido'];
    });
  }

  if($categoriaApi['activo'] == 1) { ?>
    
    
    <?php if($categoriaApi['ae'] == 1) { ?> 
      <div class="header-experiencia-home text-center">
        <h3 class="title-exp"><?= __('categorias 3') ?></h3>
        <img src="imgs/americanexpress.svg" style="max-width: 170px;" alt="American Express">
      </div>
    <?php } ?> 

    <section id="categoria-<?=strtolower(str_replace(' ', '-',$categoriaApi['titulo1']))?>">
      <div class="header-categorias c-entretenimiento d-flex justify-content-center align-items-center" style="background: url('backend/<?=$categoriaApi['rutaBackground']?>') no-repeat; background-size: cover !important; background-position: center;">
        <h3><?=IDIOMA == 'es' ? $categoriaApi['titulo1'] : $categoriaApi['titulo2']?></h3>
        <div class="bg-black"></div>
      </div>
      <div class="container content-categorias">


        <div class="row row-cols-1 row-cols-md-3">
        <?php foreach (array_slice($ContenidosIndex, 0, 3) as $Contenido) {  $fechainicial = new DateTime($Contenido["Desde"]); $fechafinal = new DateTime($Contenido["Hasta"]); $diferencia = $fechainicial->diff($fechafinal); $meses = ($diferencia->y*12)+$diferencia->m; $dias = ($diferencia->days); 
            $datoDuracion = $meses == 0 ? $dias.' dias' : $meses.' meses'; ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                  <a href="<?=url('contenido')?>?contenido=<?=$Contenido['idContenidos']?>" style="text-decoration: none; color: #212529;">
                    <div class="box-image" style="position: relative; ">
                      <img src="backend/<?=$Contenido['previewRuta']?>" class="card-img-top" alt="experiencia-juan-minujin">
                      <?=strtotime(date("d-m-Y H:i:00",time())) < strtotime(date('d-m-Y H:i:00',strtotime($Contenido["Desde"]))) ? '<div style="position: absolute; bottom: 0px; left:0px; text-align: center; color: #fff; padding: 20px; background: #2F2F2F; font-weight: bold;font-size: 13px;letter-spacing: 1px;width: 100%;">PROXIMAMENTE</div>' :''?>
                    </div>
                  </a>
                  <div class="d-flex flex-row">
                    <div class="card-body">
                      <h5 class="card-title"><?=$Contenido['descripcionTipoContenido']?></h5>
                      <h6 class="card-name mb-2"><?=ucfirst($Contenido['tituloContenido'])?></h6>
                    </div>
                      <div class="card-price"><?=PAIS == 'ar' ? '$' : 'USD'?> <?=PAIS == 'ar' ? $Contenido['precio'] : $Contenido['precioDolares']?></div>
                  </div>
                  <div class="card-footer d-flex flex-row align-items-end">
                    <div class="card-info">
                      <p class="card-desc"><?=$Contenido['tituloVideos']?></p>
                      <p class="card-time"><?=$Contenido['descripcionTipoContenido'] != 'Canal' ? 'desde el '.date("d/m/Y H:m",strtotime($Contenido['Desde'])) : $datoDuracion?></p>
                    </div>
                    <?php if(isset($_SESSION['token'])) { ?>
                    <div class="card-links">  
                    <?php include "inc/enlaces_redes_categoria.php"; ?>
                    </div>
                      <?php $deseoOk = in_array($Contenido['idContenidos'], array_column($arraybuscoLosLikes, 'contenidoId')); ?>
                      <a data-estado="<?=$deseoOk == 0 ? '0' : '1'?>" class="like" data-like="<?=$Contenido['idContenidos']?>"><i class="bi bi-heart<?=$deseoOk == 1 ? '-fill' : ''?>"></i></small></a>
                    <?php } ?>
                  </div>
                </div>
            </div>
          <?php } ?>
        </div>

        <div class="row row-cols-1 row-cols-md-3 collapse" id="vermas<?=$categoriaApi['idCategorias']?>">
        <?php foreach (array_slice($ContenidosIndex, 3) as $Contenido) {  $fechainicial = new DateTime($Contenido["Desde"]); $fechafinal = new DateTime($Contenido["Hasta"]); $diferencia = $fechainicial->diff($fechafinal); $meses = ($diferencia->y*12)+$diferencia->m; $dias = ($diferencia->days); 
            $datoDuracion = $meses == 0 ? $dias.' dias' : $meses.' meses'; ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                  <a href="<?=url('contenido')?>?contenido=<?=$Contenido['idContenidos']?>" style="text-decoration: none; color: #212529">
                  <div class="box-image" style="position: relative; ">
                    <img src="backend/<?=$Contenido['previewRuta']?>" class="card-img-top" alt="experiencia-juan-minujin">
                  <?=strtotime(date("d-m-Y H:i:00",time())) < strtotime(date('d-m-Y H:i:00',strtotime($Contenido["Desde"]))) ? '<div style="position: absolute; bottom: 0px; left:0px; text-align: center; color: #fff; padding: 20px; background: #2F2F2F; font-weight: bold;font-size: 13px;letter-spacing: 1px;width: 100%;">PROXIMAMENTE</div>' :''?>
                  </div>
                  </a>
                  <div class="d-flex flex-row">
                    <div class="card-body">
                      <h5 class="card-title"><?=$Contenido['descripcionTipoContenido']?></h5>
                      <h6 class="card-name mb-2"><?=ucfirst($Contenido['tituloContenido'])?></h6>
                    </div>
                      <div class="card-price"><?=PAIS == 'ar' ? '$' : 'USD'?> <?=PAIS == 'ar' ? $Contenido['precio'] : $Contenido['precioDolares']?></div>
                  </div>
                  <div class="card-footer d-flex flex-row align-items-end">
                    <div class="card-info">
                      <p class="card-desc"><?=$Contenido['tituloVideos']?></p>
                      <p class="card-time"><?=$Contenido['descripcionTipoContenido'] != 'Canal' ? 'desde el '.date("d/m/Y H:m",strtotime($Contenido['Desde'])) : $datoDuracion?></p>
                    </div>
                    <?php if(isset($_SESSION['token'])) { ?>
                    <div class="card-links">  
                    <?php include "inc/enlaces_redes_categoria.php"; ?>
                    </div>
                      <?php $deseoOk = in_array($Contenido['idContenidos'], array_column($arraybuscoLosLikes, 'contenidoId')); ?>
                      <a data-estado="<?=$deseoOk == 0 ? '0' : '1'?>" class="like" data-like="<?=$Contenido['idContenidos']?>"><i class="bi bi-heart<?=$deseoOk == 1 ? '-fill' : ''?>"></i></small></a>
                    <?php } ?>
                  </div>
                </div>
            </div>
          <?php } ?>
        </div>
        <?php if(count($ContenidosIndex) >= 4) { ?>           
          <button type="button" data-toggle="collapse" data-target="#vermas<?=$categoriaApi['idCategorias']?>" class="btn btn-info btn-gray mt-4 mr-auto ml-auto vermas">ver más</button>
        <?php } ?>           
    </div>
  </section>
<?php } } ?>



<?php include_once('inc/footer.php'); ?>


<script>
  $(document).on('click', '.like', function (e){
    e.preventDefault();

    var dataLike = $(this).attr('data-like');
    var dataEstado = $(this).attr('data-estado');
    var boton = $(this);
    var accion = '';

    if(dataEstado == '0'){
      var accion = 'addDeseo';
    } else {
      var accion = 'removeDeseo';
    }
    var dato = {
      accion : accion,
      contenidoId: dataLike
    }
    var json = JSON.stringify(dato);
    $.ajax({
      url:"api/ajax/carrito.ajax.php",
      method: "POST",
      data: {deseoAccion: json},
      success:function(respuesta){ 
        if(respuesta.includes('Added')){
          $(boton).empty();
          $(boton).append('<i class="bi bi-heart-fill"></i>');
          $(boton).attr('data-estado', '1');
        } else if(respuesta.includes('Removed')){
          $(boton).empty();
          $(boton).append('<i class="bi bi-heart"></i>');
          $(boton).attr('data-estado', '0');
        }
        console.log(respuesta);
      }
    });
  });
</script>

<style type="text/css">
  .card-links {
    text-align: center;
  }
  .bi-heart, .bi-heart-fill {
    color: #707070;
  }
  
</style>