<?php

require_once('api/inicio.php');
define('SECCION', 'experiencia');
$color = 'white';

include_once("inc/header.php");
$section = 'categorias';
//color de pagina



if(isset($_GET['elemento'])) {

    if(isset($_SESSION["nivel"])){

        $token = isset($_SESSION["token"]) ? $_SESSION["token"] : 'admin';
        $idElemento = $_GET['elemento'];
        //busco los datos del elemento
        $respuestaElemento = ControladorContenidos::ctrMostrarUnElemento($idElemento, $token);
        $datosElemento = json_decode($respuestaElemento, true);
        //echo $respuestaElemento;
        //var_dump($datosElemento);
        $tipoElemento = $datosElemento[0]['tipoId'];
        if($tipoElemento == 1 ) {
            $nombreTipo = 'Video';
        } else if($tipoElemento ==  2){
            $nombreTipo = 'Audio';
        } else if($tipoElemento ==  4){
            $nombreTipo = 'Imagen';
        } else if($tipoElemento ==  5){
            $nombreTipo = 'PDF';
        } else if($tipoElemento ==  6){
            $nombreTipo = 'Link';
        }

        // //busco el archivo
        $archivoEncoding = ControladorContenidos::ctrBuscoArchivo($idElemento, $token);
        
        // //traigo los comentarios del elemento
        $comentariosElementos = ControladorComentarios::ctrMostrarComentarios($idElemento, 'elementos', $token);
        $arrayContenidosTodos = json_decode($comentariosElementos,true);
        $arrayComentarios = [];
        foreach($arrayContenidosTodos as $row){
            if($row['activo'] == 1){
                array_push($arrayComentarios, $row);
            }
        }
        
        // //traigo el puntaje del elemento
        $puntajeContenido = ControladorComentarios::ctrMostrarPuntaje($idElemento, 'elementos', $token);
        $arraypuntajeContenido = json_decode($puntajeContenido,true);
        $valorPuntaje = 0;
        $cantidadPuntajes = 0;
        if(count($arraypuntajeContenido) != 0){
            foreach($arraypuntajeContenido as $row) {
                $valorPuntaje += intval($row['puntaje']);
                $cantidadPuntajes ++;
            }
        }

        // //consulto si ya fue evaluado por el usuario
        $puntajeConsulta = ControladorComentarios::ctrSaberSiFueValuado($idElemento, 'elementovalorado', $token);
        $rtaSifueValuado = json_decode($puntajeConsulta, true);
        
    } else {
        echo '<script>window.location="index"</script>';
    }
} else {
  echo '<script>window.location="index"</script>';
}



?>

<header class="main-experience" style="background-image: url(backend/<?=$datosElemento[0]['previewRuta']?>);">
    <div class="bg-black-op"></div>
    <div class="h1preview">
        <h1>ELEMENTO PREVIEW</h1>
    </div>

    <div class="container">
        <div class="content-main-experience w-100">
            <div class="row row-eq-height">
                <div class="col-md-8">
                    <h1 class="text-uppercase"><?=$datosElemento[0]['titulo1']?></h1>
                    <div class="cant-experience d-flex flex-row">
                    <i class="bi bi-play-fill"></i><p class="time"><?=$nombreTipo?> <span>(<?=$datosElemento[0]['duracion']?>)</span></p>
                    </div>
                    <p class="info-experience"><?=$datosElemento[0]['descripcion1']?></p>
                    <?php if($valorPuntaje > 0) {$promedio = $valorPuntaje/$cantidadPuntajes; $float = floor($promedio); $eq = $promedio-$float; $tota = $eq > 0 ? floor($promedio)+1 : floor($promedio)?>
                    <?php for ($i=0; $i < $float ; $i++) {  ?>
                        <img width="22px" src="imgs/star-03.svg" alt="">
                    <?php } ?>
                    <?php for ($i=0; $i < $promedio-$float ; $i++) {  ?>
                        <img width="22px" src="imgs/star-02.svg" alt="">
                    <?php } ?>
                    <?php for ($i=0; $i < 5-$tota ; $i++) {  ?>
                        <img width="22px" src="imgs/star-01.svg" alt="">
                    <?php }} else { if( isset($tota) ){ for ($i=0; $i < 5-$tota ; $i++) {?>
                        <img width="22px" src="imgs/star-01.svg" alt="">
                    <?php }} }?>
                    <!-- <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i> -->
                </div>
                <div  class="col-md-4">
                    <button type="button" class="btn btn-info m-auto">VER CONTENIDO</button>
                </div>
            </div>
        </div>
    </div>
</header>

  <section>
    <div class="container content-experience">
        <div class="row">
            <div class="col"><h2>CONTENIDO <?=$datosElemento[0]['tipoId']== 6 ? 'DE LA EXPERIENCIA' : 'DEL CANAL' ?></h2></div>
            <div class="col"><a href="javascript:history.back(-1);" class="bt-back">VOLVER</a></div>
        </div>

        <?php sleep(2); if($tipoElemento == 1) { ?>
            <div class="row mb-5">
                <div class="col">
                    <div class="embed-responsive embed-responsive-16by9 border">
                        <video controlsList="nodownload" id="video-test" class="video-fluid z-depth-1"  controls ><source src="data:video/mp4;base64,<?=base64_encode($archivoEncoding)?>#t=0.1"></source></video>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if($tipoElemento == 2) { ?>
            <script src="https://unpkg.com/wavesurfer.js"></script>
            <script src="https://unpkg.com/wavesurfer.js/dist/plugin/wavesurfer.regions.min.js"></script>
            <div class="audio d-flex align-items-end" style="background-image:url(backend/<?=$datosElemento[0]['previewRuta']?>)">
                <div  class="audio-content">
                    <div class="controls d-flex align-items-center">
                        <button onclick="wavesurfer.playPause()" class="playaudio">
                        <i class="bi bi-play-circle"></i>
                        </button>
                    </div>
                    <div class="content-waveform">
                        <div class="waveform"></div>
                        <div class="time d-flex justify-content-start">
                            <div class="waveform__counter">0:00</div>
                            <div class="waveform__duration ml-auto">0:00</div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var wavesurfer = WaveSurfer.create({
                    container: '.waveform',
                    waveColor: 'white',
                    progressColor: '#939191',
                    scrollParent: false,
                    responsive: true,
                    hideScrollbar: true,
                    barWidth: 2,
                    barHeight: 1,
                    barGap: null
                });
                var formatTime = function (time) {
                    return [
                        Math.floor((time % 3600) / 60), // minutes
                        ('00' + Math.floor(time % 60)).slice(-2) // seconds
                    ].join(':');
                };
                // Show current time
                wavesurfer.on('audioprocess', function () {
                    $('.waveform__counter').text( formatTime(wavesurfer.getCurrentTime()) );
                });
                // Show clip duration
                wavesurfer.on('ready', function () {
                    $('.waveform__duration').text( formatTime(wavesurfer.getDuration()) );
                });
                // si no fue votado el AUDIO, le solicita que lo vote
                <?php if($rtaSifueValuado['result'] != 'Votado') { ?>
                    wavesurfer.on('finish', function () {
                        $('#calificar').modal('toggle');
                    });
                <?php } ?>
            </script>
            <script>wavesurfer.load('data:video/mp4;base64,<?=base64_encode($archivoEncoding)?>');</script>
        <?php } if($tipoElemento == 5) {?>
            <div class="box-pdf my-5">
                <embed  src="data:application/pdf;base64,<?=base64_encode($archivoEncoding)?>"  type="application/pdf" width="100%" height="600px"/>
                <!-- <iframe src="data:base64,<?=base64_encode($archivoEncoding)?>"> -->
            </div>
        <?php } ?>

        <div class="row border-bottom mt-5 pb-1">
            <div class="col-md-12">
                <h3 class="title-ce">Reseñas</h3>
                </div>
                <div class="col">
                    <div class="rate">
                    <?php if($valorPuntaje > 0) {$promedio = $valorPuntaje/$cantidadPuntajes; $float = floor($promedio); $eq = $promedio-$float; $tota = $eq > 0 ? floor($promedio)+1 : floor($promedio)?>
                    <?php for ($i=0; $i < $float ; $i++) {  ?>
                        <img width="22px" src="imgs/star-03.svg" alt="">
                    <?php } ?>
                    <?php for ($i=0; $i < $promedio-$float ; $i++) {  ?>
                        <img width="22px" src="imgs/star-02.svg" alt="">
                    <?php } ?>
                    <?php for ($i=0; $i < 5-$tota ; $i++) {  ?>
                        <img width="22px" src="imgs/star-01.svg" alt="">
                    <?php }} else { if( isset($tota) ){ for ($i=0; $i < 5-$tota ; $i++) {?>
                        <img width="22px" src="imgs/star-01.svg" alt="">
                    <?php }} } ?>
                    </div>
                </div>
                <div class="col">
                    <div class="share d-flex flex-row justify-content-end">
                    <a><i class="bi bi-upload"></i></a><p class="align-self-center">Compartir</p>
                    <a class="mt-1"><i class="bi bi-heart"></i></a><p class="align-self-center">Me gusta</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form>
                    <textarea placeholder="Escribí tu comentario" class="comment-review" id="comentarioContenido-ele" rows="4"></textarea>
                    <button type="button" class="btn btn-gradient gradient-1 ml-auto mt-2 " data-tipo="elementos" data-comentario="<?=$idElemento?>">ENVIAR</button>
                </form>
            </div>
        </div>

        <div class="row mt-5" id="ContenedorComentarios-ele">
            <?php foreach (array_slice($arrayComentarios, 0, 4) as $row) { if($row['activo'] == 1) {?>
            <div class="col-md-6 d-flex flex-row mb-4">
                <div class="follower">
                    <div class="box-user">
                        <p class="comment"><?=$row['usuario']?></p>
                        <!-- <img src="imgs/usuarios/seguidor-1.png" alt="seguidor"> -->
                    </div>
                </div>
                <div class="follower-comment d-flex align-items-center">
                    <h5><?=$row['resena1']?></h5>
                    <!-- <p class="comment"><?=$row['resena1']?> </p> -->
                </div>
            </div>
            <?php }} ?>
        </div>

        <div class="row collapse" id="verMasContenedorComentarios-ele">
            <?php foreach (array_slice($arrayComentarios, 4) as $row) { if($row['activo'] == 1) {?>
            <div class="col-md-6 d-flex flex-row mb-4">
                <div class="follower">
                    <div class="box-user">
                        <p class="comment"><?=$row['usuario']?></p>
                        <!-- <img src="imgs/usuarios/seguidor-1.png" alt="seguidor"> -->
                    </div>
                </div>
                <div class="follower-comment d-flex align-items-center">
                    <h5><?=$row['resena1']?></h5>
                    <!-- <p class="comment"><?=$row['resena1']?> </p> -->
                </div>
            </div>
            <?php }} ?>
        </div>

        <?php if(count($arrayComentarios) >=5){  ?>
            <div class="row mt-5">
                <button type="button" type="button" data-toggle="collapse" data-target="#verMasContenedorComentarios-ele" class="btn btn-outline-more m-auto">Ver todas las reseñas</button>
            </div>
        <?php } ?>

    </div>
  </section>

  <?php include_once('inc/footer.php'); ?>
  <?php include_once('inc/modal/califica.php'); ?>


<script>
// si no fue votado el VIDEO, le solicita que lo vote
<?php if($rtaSifueValuado['result'] != 'Votado') { ?>
    $(document).ready(function(){
    $("#video-test").on('ended', function(){
        $('#calificar').modal('toggle');
    });
    // blindamos que no pueda descargar el video
    $('#video-test').bind('contextmenu',function() { return false; });
    });
<?php } ?>

$('.playaudio').on('click', function (e) {
    if($(this).find('.bi').hasClass('bi-play-circle')) {
        $(this).find('.bi').removeClass('bi-play-circle').addClass('bi-pause-circle');
    } else {
        $(this).find('.bi').removeClass('bi-pause-circle').addClass('bi-play-circle');
    }
});




// $('.content-experience').ready = function() {
//     console.log('termino de cargar');
// }
</script>
<style>
video::-internal-media-controls-download-button {
    display:none;
}
video::-webkit-media-controls-enclosure {
    overflow:hidden;
}
video::-webkit-media-controls-panel {
    width: calc(100% + 30px); /* Ajústalo a tu gusto */
}
.box-user {
    width: 40px;
    height: 40px;
    background: #707070;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.box-user p {
    color: #fff;
    padding: 5px 8px;
    margin-bottom: 0px;
}
</style>
<style>
    .h1preview {
        text-align: center;
        position: fixed;
        top: 50px;
        right: -50px;
        z-index: 2000000;
        background: #ffcf11;
        padding: 10px 40px;
        transform: rotate(45deg)
    }
    .h1preview h1 {
        font-size: 15px;
        text-shadow: 0px 1px 1px #333;
        margin-bottom: 0px;
    }
    .nav-item:before, footer:before{
    content: "";
    background: transparent;
    height: 100%;
    width: 100%;
    position: absolute;
    z-index: 1000;
    max-height: 400px;
        max-width: 1299px;

    }
    
</style>