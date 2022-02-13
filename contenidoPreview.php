<?php

require_once('api/inicio.php');
define('SECCION', 'canal');
$color = 'white';
include_once("inc/header.php");


$section = 'categorias';
//color de pagina
if(isset($_GET['contenido'])) {

    if(isset($_SESSION["nivel"])){

        $token = isset($_SESSION["token"]) ? $_SESSION["token"] : 'Admin';
        $idioma = IDIOMA == 'es' ? 1 : 2;

        // traigo los datos del canal
        $idContenido = $_GET['contenido'];
        $respuestaContenido = ControladorContenidos::ctrMostrarTodoDeUnContenidoBack($idContenido);
        $contenido = json_decode($respuestaContenido,true);
        //var_dump($contenido);

        //traigo los elementos del canal
        $respuestaElementos = ControladorContenidos::ctrMostrarElementosDeUnContenidosBack($idContenido);
        $elementos = json_decode($respuestaElementos,true);
        //var_dump($elementos);
        usort($elementos, function( array $elem1, $elem2 ) {
            return $elem1['orden'] <=> $elem2['orden'];
        });

        //contabilizo los tipos de elementos
        $video = 0;
        $audio = 0;
        $pdf = 0;
        $duracionTotal = 0;
        foreach($elementos as $elemento){
            if($elemento['tipoId'] == 1){
                $video += 1;
                $duracionTotal += strtotime($elemento['duracion']);
            } else if($elemento['tipoId'] == 2) {
                $audio += 1;
                $duracionTotal += strtotime($elemento['duracion']);
            } else if($elemento['tipoId'] == 5) {
                $pdf += 1;
            }
        }

        //traigo los elementos del canal
        $tipos = ControladorContenidos::ctrMostrarTipos(null);
        $arrayTipos = json_decode($tipos,true);

        //traigo los comentarios del contenido
        $comentariosContenidos = ControladorComentarios::ctrMostrarComentarios($idContenido, 'contenidos', $token);
        $arrayContenidosTodos = json_decode($comentariosContenidos,true);
        $arrayContenidos = [];
        foreach($arrayContenidosTodos as $row){
            if($row['activo'] == 1){
                array_push($arrayContenidos, $row);
            }
        }

        //traigo el puntaje del contenido
        $puntajeContenido = ControladorComentarios::ctrMostrarPuntaje($idContenido, 'contenidos', $token);
        $arraypuntajeContenido = json_decode($puntajeContenido,true);
        $valorPuntaje = 0;
        $cantidadPuntajes = 0;
        foreach($arraypuntajeContenido as $row) {
            $valorPuntaje += intval($row['puntaje']);
            $cantidadPuntajes ++;
        }
        
        //duracion suscripcion
        $fechainicial = new DateTime($contenido[0]["vigenciaDesde"]); 
        $fechafinal = new DateTime($contenido[0]["vigenciaHasta"]); 
        $diferencia = $fechainicial->diff($fechafinal); 
        $meses = ($diferencia->y*12)+$diferencia->m; 
        $dias = ($diferencia->days); 
        $datoDuracion = $meses == 0 ? $dias.' Dias' : $meses.' Meses'; 
        $date = strtotime(date("d-m-Y H:i:00",time())) < strtotime(date('d-m-Y H:i:00',strtotime($contenido[0]["vigenciaDesde"]))) ? 'PROXIMAMENTE' : date("d/m/Y",strtotime($contenido[0]['vigenciaDesde'])).' al '.date("d/m/Y",strtotime($contenido[0]['vigenciaHasta']));

        // si la fecha de hoy es mayor a la "desde", redirecciona
        $compraOk = '';

    } else {
        echo '<script>window.location="index"</script>';
    }

} else {
    echo '<script>window.location="index"</script>';
}

?>

<?php include_once('inc/modal/agregar-carrito.php'); ?>
<?php include_once('inc/modal/duplicado-carrito.php'); ?>
<?php  ?>


<!-- SWEET ALERT 2 -->	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- JV Mercado Pago -->
<!-- <script src="https://sdk.mercadopago.com/js/v2"></script>
 -->
 <!-- JV Paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=AQj1bBHdM7d0Y0MuUSc9d-L-PEHGkmbHcjr79fjQs8jBBS0rNacQcKeJuJH7c1O5hVfSV7TV8fkwaSHQ&components=buttons"></script>

<header class="main-experience" style="background-image: url(backend/<?=$contenido[0]['previewRuta']?>);">
    <div class="bg-black-op"></div>
    <div class="h1preview">
        <h1>CONTENIDO PREVIEW</h1>
    </div>
    <div class="container">
        <div class="content-main-experience w-100">
            <div class="row row-eq-height">
                <div class="col-md-8">
                    <h1 class="text-uppercase"><?=$contenido[0]['titulo1']?></h1>
                    <h3><?=$date?></h3>
                    <h4><?=$video > 0 ? 'Video' : ''?> <?=$audio > 0 ? '+ Audio' : ''?> <?=$pdf > 0 ? '+ PDF descargable' : ''?></h4>
                    <p class="info-experience" style="min-height: 60px"><?=$contenido[0]['descripcion1']?></p>
                    <div class="cant-experience d-flex flex-row" style="min-height: 50px;">
                        <p class="mr-3"><?=$video > 0 ? $video.' videos' : '' ?></p>
                        <?php if($contenido[0]['tipoContenidoId'] != 2) {?>
                        <p><i class="bi bi-clock"></i> <?= count($elementos) >0 ? date("h", $duracionTotal) : '0'?>hrs <?= count($elementos) >0 ? date("m", $duracionTotal) : '0'?>min</p>
                        <?php } ?>
                    </div>
                </div>
                <div  class="col-md-4">
                    <div class="box-info d-flex flex-column">
                        <p class="precio-exp">$<?=$contenido[0]['precioPesos']?></p>
                        <p class="fecha-exp"><?=$datoDuracion?></p>
                        <?php if(isset($_SESSION['token'])) { ?>
                            <?php if($compraOk == '') { ?>
                                <button type="button" style="position: relative; top:0" class="btn btn-info m-auto" data-int="<?=base64_encode($idContenido)?>" >comprá ahora</button>
                            <?php } ?>
                        <?php } else { ?>
                            <button type="button" data-toggle="modal" data-target="#iniciarsesion" style="position: relative; top:0" class="btn btn-info m-auto" >comprá ahora</button>
                        <?php } ?>
                        <div class="online" ><img src="imgs/display.svg" alt="display"> <p>ONLINE EXPERIENCE</p></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="canal">
    <div class="container content-experience">
        <h2><?=strtoupper($contenido[0]['tituloVideos1'])?></h2>
        <div class="row" style="<?=$contenido[0]['tipoContenidoId'] == 2 ? 'justify-content: center; margin-top: 80px; margin-bottom: 40px' : ''?>">
            <?php if($contenido[0]['tipoContenidoId'] == 1) {


                // video de preview
                foreach(array_slice($elementos, 0, 1) as $elemento) {
                    foreach($arrayTipos as $tipo){
                        if($elemento['tipoId'] == $tipo['idTipos']){
                            $tipoElemento = IDIOMA == 'es' ? $tipo['descripcion1'] : $tipo['descripcion2'];
                        }
                    }
                    if($elemento['activo'] == 1 ) { ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-image">
                                    <div class="bg-black-card"></div>
                                    <div class="material-video">
                                        <a href="elementoPreview.php?elemento=<?=$elemento['idElementos']?>">
                                            <div class="play">
                                                <img src="imgs/play.svg" alt="play">
                                            </div>
                                            <div class="review">
                                                <p><?=IDIOMA == 'es' ? $elemento['descripcion1'] : $elemento['descripcion2']?></p>
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <img src="backend/<?=$elemento['previewRuta']?>" class="card-img-top" alt="<?=$elemento['titulo1']?>">
                                </div>
                                <div class="d-flex">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=IDIOMA == 'es' ? $elemento['titulo1'] : $elemento['titulo2']?></h5>
                                        <h6 class="card-experience mb-2"><?=IDIOMA == 'es' ? strtoupper($elemento['subtitulo1']) : strtoupper($elemento['subtitulo2'])?></h6>
                                    </div>
                                    <div class="card-links d-flex align-items-top mt-3">
                                        <small><a href="http://c2370883.ferozo.com/md/me/elementoPreview?elemento=<?=$elemento['idElementos']?>"><i class="bi bi-upload mr-1"></i></a><a href="#"><i class="bi bi-heart"></i></a></small>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-end">
                                    <i class="bi bi-play-fill"></i>
                                    <p class="time"><?=$tipoElemento?> <span>(<?=$elemento['duracion']?>)</span></p>
                                </div>
                            </div>
                        </div>
                    <?php } 
                } 

                // todos los demas videos
                foreach(array_slice($elementos, 1) as $elemento) {
                    foreach($arrayTipos as $tipo){
                        if($elemento['tipoId'] == $tipo['idTipos']){
                            $tipoElemento = IDIOMA == 'es' ? $tipo['descripcion1'] : $tipo['descripcion2'];
                        }
                    }                           
                    if($elemento['activo'] == 1 ) { ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-image">
                                    <div class="bg-black-card"></div>
                                    <div class="material-video">
                                        <?php if(isset($_SESSION["token"]) && $compraOk != '') { ?>
                                        <a href="elemento.php?elemento=<?=$elemento['idElementos']?>">
                                            <div class="play">
                                                <img src="imgs/play.svg" alt="play">
                                            </div>
                                            <div class="review">
                                                <p><?=IDIOMA == 'es' ? $elemento['descripcion1'] : $elemento['descripcion2']?></p>
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                                            </div>
                                        </a>
                                        <?php } else {?>
                                            <div class="play">
                                                <img src="imgs/candado.svg" alt="play">
                                            </div>
                                            <div class="review">
                                                <p><?=IDIOMA == 'es' ? $elemento['descripcion1'] : $elemento['descripcion2']?></p>
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <img src="backend/<?=$elemento['previewRuta']?>" class="card-img-top" alt="gonzalo-aramburu">
                                </div>
                                <div class="d-flex">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=IDIOMA == 'es' ? $elemento['titulo1'] : $elemento['titulo2']?></h5>
                                        <h6 class="card-experience mb-2"><?=IDIOMA == 'es' ? strtoupper($elemento['subtitulo1']) : strtoupper($elemento['subtitulo2'])?></h6>
                                    </div>
                                    <div class="card-links d-flex align-items-top mt-3">
                                        <small><a href="elemento?elemento=<?=$elemento['idElementos']?>"><i class="bi bi-upload mr-1"></i></a><a href="#"><i class="bi bi-heart"></i></a></small>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-end">
                                    <i class="bi bi-play-fill"></i>
                                    <p class="time"><?=$tipoElemento?> <span>(<?=$elemento['duracion']?>)</span></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    } 
                    //Sep 30, 2021 00:00:00
            } else if( !isset($elementos[0]['activo']) || $elementos[0]['activo'] == 1 ) {  
                $archivoEncoding = ControladorContenidos::ctrBuscoArchivo($elementos[0]['idElementos'], $token);

                //echo $archivoEncoding;

                 ?>

                <?php if(isset($archivoEncoding)) { ?>
                <div class="container content-experience">
                     <h1 style="color: #707070; font-weight: lighter; text-align: center;margin-bottom: 40px;">PREVIEW</h1>
                    <div class="row mb-5">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9 border">
                                <video id="video-test" class="video-fluid z-depth-1"  controls><source src="data:video/mp4;base64,<?=base64_encode($archivoEncoding)?>#t=0.1"></source></video>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($compraOk != '') { ?>
                <div class="contador w-100">
                    <div class="container text-center">
                        <div id="headline" ></div>
                        <div id="countdown">
                            <h1 style="color: #707070; font-weight: lighter">PRÓXIMO EVENTO</h1>
                            <ul>
                                <li><span id="days"></span>Días</li>
                                <li><span id="hours"></span>Horas</li>
                                <li><span id="minutes"></span>Minutos</li>
                                <li><span id="seconds"></span>Segundos</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <style>
                    .contador .container #countdown ul {
                        list-style: none;
                        display: flex;
                        justify-content: center
                    }
                    .contador .container #countdown ul li{
                        display: inline-block;
                        font-size: 1.5em;
                        list-style-type: none;
                        padding: 1em;
                        text-transform: uppercase;
                    }
                    .contador .container #countdown ul li span {
                        display: block;
                        font-size: 4.5rem;
                    }
                </style>
                <script>
                    <?php if($compraOk != '') { ?>
                    (function () {
                        const second = 1000,
                        minute = second * 60,
                        hour = minute * 60,
                        day = hour * 24;
                        var date = `<?=$contenido[0]['vigenciaDesde']?>`; 
                        var arrayDate = date.split(" ");
                        var fecha = arrayDate[0].split("-");
                        let birthday = fecha[1]+' '+fecha[2]+', '+fecha[0]+' '+arrayDate[1],
                        //let birthday = "Aug 8, 2021 16:59:00",     
                            countDown = new Date(birthday).getTime(),
                            x = setInterval(function() {    
                                let now = new Date().getTime(),
                                distance = countDown - now;
                                document.getElementById("days").innerText = Math.floor(distance / (day)),
                                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
                                //do something later when date is reached
                                if (distance <= 0) {
                                    let headline = document.getElementById("headline"),
                                    countdown = document.getElementById("countdown"),
                                    content = document.getElementById("content");
                                    clearInterval(x);
                                    $(headline).append(`<div class='mt-4'><iframe width="100%" height="650" src="https://player.vimeo.com/video/<?=$elementos[0]['link'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></div>`).fadeIn(1000);
                                    countdown.style.display = "none";
                                    //content.style.display = "block";
                                } 
                                //seconds
                            }, 0)
                    }());
                    <?php } ?>
                </script>
                <?php 
            } //var_dump($elementos);?>
        </div>
    </div>
</section>


<section class="content-review">
    <div class="container content-experience">
    <div class="row border-bottom mb-5 pb-1">
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
                <?php }} else if(isset($tota)) { for ($i=0; $i < 5-$tota ; $i++) {?>
                    <img width="22px" src="imgs/star-01.svg" alt="">
                <?php }} ?>
                <!-- <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i
                    class="bi bi-star"></i> -->
                <p>(<?=count($arrayContenidos)?> reseñas)</p>
            </div>
        </div>
        <div class="col">
            <div class="share d-flex flex-row justify-content-end">
                <a ><i class="bi bi-upload"></i></a>
                <p class="align-self-center">Compartir</p>
                <a class="mt-1"><i class="bi bi-heart"></i></a>
                <p class="align-self-center">Me gusta</p>
            </div>
        </div>
    </div>
    
    <?php if(isset($_SESSION['token'])) { ?>
    <div class="row">
        <div class="col">
            <form>
                <textarea placeholder="Escribí tu comentario" class="comment-review" rows="4" id="comentarioContenido"></textarea>
                <button type="button" class="btn btn-gradient gradient-1 ml-auto mt-2 " data-tipo="contenidos" data-comentario="<?=$idContenido?>">ENVIAR</button>
            </form>
        </div>
    </div>
    <?php } ?>

    <div class="row mt-5" id="ContenedorComentarios">
        <?php foreach (array_slice($arrayContenidos, 0, 4) as $row) { if($row['activo'] == 1) {?>
        <div class="col-md-6 d-flex flex-row mb-4">
            <div class="follower">
                <div class="box-user">
                    <p class="comment"><?=$row['usuario']?></p>
                    <!-- <img src="imgs/usuarios/seguidor-1.png" alt="seguidor"> -->
                </div>
            </div>
            <div class="follower-comment">
                <h5><?=$row['email']?></h5>
                <p class="comment"><?=$row['resena1']?> </p>
            </div>
        </div>
        <?php }} ?>
    </div>

    <div class="row collapse" id="verMasContenedorComentarios">
        <?php foreach (array_slice($arrayContenidos, 4) as $row) { if($row['activo'] == 1) {?>
        <div class="col-md-6 d-flex flex-row mb-4">
            <div class="follower">
                <div class="box-user">
                    <p class="comment"><?=$row['usuario']?></p>
                    <!-- <img src="imgs/usuarios/seguidor-1.png" alt="seguidor"> -->
                </div>
            </div>
            <div class="follower-comment">
                <h5><?=$row['email']?></h5>
                <p class="comment"><?=$row['resena1']?> </p>
            </div>
        </div>
        <?php }} ?>
    </div>
        


    <?php if(count($arrayContenidos) >=5){  ?>
    <div class="row mt-5">
        <button type="button" type="button" data-toggle="collapse" data-target="#verMasContenedorComentarios" class="btn btn-outline-more m-auto">Ver todas las reseñas</button>
    </div>
    <?php } ?>
</section>

<section class="canal-extra">

    <?php if($contenido[0]['idContenidos'] != ''){?>
    <div class="banner-canal bc-img" style="background: url('backend/<?=$contenido[0]['previewRuta']?>') center center no-repeat; background-size: cover">
        <div class="bc-info d-flex align-items-center justify-content-end">
            <div class="bc-content">
                <h6><?=$contenido[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA'?></h6>
                <h4 class="bc-title"><?=IDIOMA == 'es' ? $contenido[0]['titulo1'] : $contenido[0]['titulo2']?></h4>
                <a style="font-size: 0.75rem;padding: .8rem 3.5rem;text-transform: uppercase;max-width: 212px" class="btn btn-info m-auto">comprá ahora</a>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="banner-canal bc-gift">
        <div class="bc-info d-flex align-items-center flex-row">
            <div>
                <img src="imgs/gift-card-canal.png" alt="gift card" class="mr-auto img-fluid">
            </div>
            <div class="bc-content ml-auto">
                <h4 class="bc-title">Regalá experiencias Descubrí un mundo de opciones para cada momento</h4>
                <?php if(!isset($_SESSION['token'])) {?>
                <button type="button" class="btn btn-info btn-gray" data-toggle="modal" >comprár ahora</button>
                <?php } else { ?>
                <button type="button" class="btn btn-info btn-gray" data-toggle="modal"  >comprár ahora</button>
                <?php } ?>
            </div>
        </div>
    </div>
  </section>

<?php include_once('inc/footer.php'); ?>

<style>
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
<script>


// <?php if($contenido[0]['precioPesos'] > 0){ ?>
//   const mp = new MercadoPago('TEST-b7c00cb2-1641-45cb-b31e-54d8e9bde086', {
//       locale: 'es-AR'
//   });
//   // Inicializa el checkout
//   mp.checkout({
//     preference: {
//       id: '<?php //echo $preference->id ?>'
//     },
//     render: {
//       container: '.cho-container', // Indica dónde se mostrará el botón de pago
//       label: 'Continuar', // Cambia el texto del botón de pago (opcional)
//     },
//     theme: {
//       elementsColor: '#8e44ad' // Color oscuro
//     }
//   });
// <?php } ?>



</script>

<?php 
    if(isset($_GET['er'])) {
        $estado = base64_decode($_GET['er']);
        if($estado == 'approved'){
            $mm1 = base64_decode($_GET['xo']);
            $mm2 = base64_decode($_GET['xi']);
            $texto = base64_decode($_GET['t']);
            $monto = base64_decode($_GET['mm']);
            $nrocompra = base64_decode($_GET['ib']);
            $email = $mm1.'@'.$mm2;
            //echo $email;
            $arrayCompra = array(
                "nroOper" => $nrocompra,
                "monto" => $monto, 
                "tipo de moneda" => 'pesos'
            );
            $resultadoGift = ControladorCarrito::ctrGiftOk($token, $email, $arrayCompra);
            $arrayGift = json_decode($resultadoGift, true);
            $quienRegala = ucfirst($arrayGift['regala'][0]['nombre']).' '.ucfirst($arrayGift['regala'][0]['apellido']);

            //var_dump($arrayGift);
            
            if($arrayGift != null){

                ?>
                <script>
                function enviaEmailGift(codigo, email, texto, quienRegala) {
                    console.log('enviando email');  
                    var data = {
                        codigo: codigo,
                        email: email,
                        texto: texto,
                        quienRegala: quienRegala
                    }
                    var json = JSON.stringify(data)
                    $.ajax({                        
                       type: "POST",                 
                       url: 'api/ajax/gift.ajax.php',                     
                       data: {enviaEmailGift : json}, 
                       success: function(respuesta){
                            var newURL = location.href.split("?")[0]+'?'+location.href.split("?")[1];
                            window.history.pushState('object', document.title, newURL);
                            console.log(respuesta)               
                       }
                    });
                }
                enviaEmailGift('<?=$arrayGift['giftCard']['codigo']?>', '<?=$email?>', '<?=$texto?>', '<?=$quienRegala?>');
                </script>
                <?php
                include_once('inc/modal/muestraCodigoGift.php');
                //var_dump($arrayGift);
                echo "<script>
                    $('#muestraCodigoGift').modal('toggle');
                </script>";

            }
        }
    } else {
    function vaciarCarrito($token) {
    //var_dump($user);

        $url = 'https://resetea.com.ar/carritogift/removeall';
        $envioJSON = 'null';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, FALSE);
        $headers[] = "Authorization: Bearer ".$token;
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        //curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $envioJSON);
        //curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $resultado = curl_exec($curl);
        curl_close($curl);
        //echo $resultado;
    }
     vaciarCarrito($_SESSION["token"]);

    }



?>
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
    .nav-item:before {
        content: "";
        background: transparent;
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
<script>
var newURL = location.href.split("?")[0]+'?'+location.href.split("?")[1];
window.history.pushState('object', document.title, newURL);
</script>
