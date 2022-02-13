<?php

require_once('api/inicio.php');
define('SECCION', 'contenido');
$color = 'white';
include_once("inc/header.php");




$section = 'categorias';
//color de pagina
if(isset($_GET['contenido'])) {
    $token = isset($_SESSION["token"]) ? $_SESSION["token"] : 'Admin';
    $idioma = IDIOMA == 'es' ? 1 : 2;

    // traigo los datos del canal
    $idContenido = $_GET['contenido'];
    $respuestaContenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($idioma, $idContenido, 'Admin');
    $contenido = json_decode($respuestaContenido,true);
    $elementos = $contenido;
    usort($elementos, function( array $elem1, $elem2 ) {
        return $elem1['ElementoOrden'] <=> $elem2['ElementoOrden'];
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
    
    // armo el tiempo total del los elementos del canal
    function conversorSegundosHoras($tiempo_en_segundos) {
        $horas = floor($tiempo_en_segundos / 3600);
        $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
        $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
        $hora_array = [];
        if ($horas > 0 ) {
            array_push($hora_array, intval((($horas)/3600)/3600));
        }
        if ($minutos > 0 ) {
            array_push($hora_array, intval($minutos));
        }
        if ($segundos > 0 ) {
            array_push($hora_array, intval($segundos));
        }
        return $hora_array;
    }

    $infoHoras = 0;
    $infoMinutos = 0;
    $infoSegundos = 0;
    if(count(conversorSegundosHoras($duracionTotal)) >2){
        $infoHoras = conversorSegundosHoras($duracionTotal)[0];
        $infoMinutos = conversorSegundosHoras($duracionTotal)[1];
        $infoSegundos = conversorSegundosHoras($duracionTotal)[2];
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

    //acumulador del puntaje del contenido
    $puntajeTotalDelContenido = 0;
    $cantidadPuntajesTotal = 0;
        
    //duracion suscripcion
    $fechainicial = new DateTime($contenido[0]["vigenciaDesde"]); 
    $fechafinal = new DateTime($contenido[0]["vigenciaHasta"]); 
    $diferencia = $fechainicial->diff($fechafinal); 
    $meses = ($diferencia->y*12)+$diferencia->m; 
    $dias = ($diferencia->days); 
    $datoDuracion = $meses == 0 ? $dias.' Dias' : $meses.' Meses'; 
    $date = strtotime(date("d-m-Y H:i:00",time())) < strtotime(date('d-m-Y H:i:00',strtotime($contenido[0]["vigenciaDesde"]))) ? 'PROXIMAMENTE' : date("d/m/Y",strtotime($contenido[0]['vigenciaDesde'])).' al '.date("d/m/Y",strtotime($contenido[0]['vigenciaHasta']));

    // si la fecha de hoy es mayor a la "desde", redirecciona
    if(strtotime(date("d-m-Y H:i:00",time())) > strtotime(date('d-m-Y H:i:00',strtotime($contenido[0]["vigenciaHasta"])))) {
        echo '<script>window.location = "http://c2370883.ferozo.com/md/me/index";</script>';
    }

    $compraOk = '';
    //reviso si el canal está pago o no
    if($token != 'Admin'){
        $misproductos = ControladorCarrito::ctrTreMisProductos($token);
        if($misproductos != ''){
            $arrayMisProductos = json_decode($misproductos, true);
            $compraOk = in_array($idContenido, array_column($arrayMisProductos, 'contenidoId'));
        }
    }

    $buscoLosLikes = modeloCarrito::mdlMostrarProductos('deseos/actual', '1', $token);
    $arraybuscoLosLikes=json_decode($buscoLosLikes, true); 
    //var_dump($contenido);

} else {
    echo '<script>window.location="index"</script>';
}

?>

<?php include_once('inc/modal/agregar-carrito.php'); ?>
<?php include_once('inc/modal/duplicado-carrito.php'); ?>
<?php include_once('inc/modal/error-pago.php'); ?>
<?php  ?>

<!-- SWEET ALERT 2 -->	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<header class="main-experience" style="background-image: url(backend/<?=$contenido[0]['previewRutaContenido']?>);">
    <div class="bg-black-op"></div>
    <div class="container">
        <div class="content-main-experience w-100">
            <div class="row row-eq-height">
                <div class="col-md-8">
                    <h1 class="text-uppercase"><?=$contenido[0]['elementoTitulo']?></h1>
                    <h3><?=$date?></h3>
                    <h4><?=$video > 0 ? 'Video' : ''?> <?=$audio > 0 ? '+ Audio' : ''?> <?=$pdf > 0 ? '+ PDF descargable' : ''?></h4>
                    <p class="info-experience" style="min-height: 60px"><?=$contenido[0]['elementoDescripcion']?></p>
                    <div class="cant-experience d-flex flex-row" style="min-height: 50px;">
                        <p class="mr-3"><?=$video > 0 ? $video.' videos' : '' ?></p>
                        <?php if($contenido[0]['tipoContenidoId'] != 2) {?>
                        <p><i class="bi bi-clock"></i> 
                        <?php if(count($elementos) > 0) {   
                            if($infoHoras > 0){
                                echo $infoHoras.'hrs ';
                            }
                            if($infoMinutos > 0){
                                echo $infoMinutos.'min ';
                            }
                            if($infoSegundos > 0){
                                echo $infoSegundos.'s ';
                            }
                        ?></p>
                        <?php }} ?>
                    </div>
                </div>
                <div  class="col-md-4">
                    <div class="box-info d-flex flex-column">
                        <p class="precio-exp"><?=PAIS == 'ar' ? '$ '.$contenido[0]['precioPesos'] : 'USD '.$contenido[0]['precioDolares'] ?></p>
                        <p class="fecha-exp"><?=$datoDuracion?></p>
                        <?php if(isset($_SESSION['token'])) { ?>
                            <?php if($compraOk == '') { ?>
                                <button type="button" style="position: relative; top:0" class="btn btn-info m-auto btn-add" data-int="<?=base64_encode($idContenido)?>" ><?= __('contenidos 0') ?></button>
                            <?php } ?>
                        <?php } else { ?>
                            <button type="button" data-toggle="modal" data-target="#iniciarsesion" style="position: relative; top:0" class="btn btn-info m-auto" ><?= __('contenidos 0') ?></button>
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
        <h2><?=strtoupper($contenido[0]['contenidoTituloVideos'])?></h2>
        <div class="row" style="<?=$contenido[0]['tipoContenidoId'] == 2 ? 'justify-content: center; margin-top: 80px; margin-bottom: 40px' : ''?>">
            <?php if($contenido[0]['tipoContenidoId'] == 1) { ?>

                <!-- video de preview -->
                <?php include "inc/contenidoCanalVideoPreview.php"; ?>

                <!-- todos los demas videos -->
                <?php include "inc/contenidoCanalVideosAll.php"; ?>
                
            <?php } else if( !isset($elementos[0]['activo']) || $elementos[0]['activo'] == 1 ) {  ?>

                <!-- Experiencia -->
                <?php include "inc/contenidoCanalExperiencia.php"; ?>
                
            <?php } ?>
        </div>
    </div>
</section>


<section class="content-review">
    <div class="container content-experience">
        <div class="row border-bottom mb-5 pb-1">
            <div class="col-md-12">
                <h3 class="title-ce"><?= __('contenidos 1') ?></h3>
            </div>
            <div class="col">
                <div class="rate">

                     <?php include "inc/puntajeContenido.php"; ?>
                    
                    <p>(<?=$cantidadPuntajesTotal?> <?= __('contenidos 4') ?>)</p>
                </div>
            </div>
            <div class="col">
                <div class="share d-flex flex-row justify-content-end align-items-center">

                    <?php if(isset($_SESSION['token'])) { ?>
                        <?php $deseoOk = in_array($idContenido, array_column($arraybuscoLosLikes, 'contenidoId')); ?>
                        <a style="color: #A8A8A8" data-estado="<?=$deseoOk == 0 ? '0' : '1'?>" data-like="<?=$idContenido?>"><i class="bi bi-heart<?=$deseoOk == 1 ? '-fill' : ''?>"></i></small></a>
                        <p class="align-self-center"><?= __('contenidos 3') ?></p>
                    <?php } else {?>
                        <a href="#" data-toggle="modal" data-target="#iniciarsesion" class="mt-1"><i class="bi bi-heart"></i></a>
                        <p class="align-self-center"><?= __('contenidos 3') ?></p>
                     <?php } ?>

                </div>
            </div>
        </div>
    
        <?php if(isset($_SESSION['token'])) { ?>
        <div class="row">
            <div class="col">
                <form>
                    <textarea placeholder="<?= __('contenidos 5') ?>" class="comment-review" rows="4" id="comentarioContenido"></textarea>
                    <button type="button" class="btn btn-gradient gradient-1 ml-auto mt-2 btn-comentarioContenido" data-tipo="contenidos" data-comentario="<?=$idContenido?>"><?= __('contenidos 6') ?></button>
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
            <button type="button" type="button" data-toggle="collapse" data-target="#verMasContenedorComentarios" class="btn btn-outline-more m-auto"><?= __('contenidos 7') ?></button>
        </div>
        <?php } ?>

    </div>
</section>

<section class="canal-extra">
    <?php if($contenido[0]['idContenidos'] != ''){?>
    <div class="banner-canal bc-img" style="background: url('backend/<?=$contenido[0]['previewRutaContenido']?>') center center no-repeat; background-size: cover">
        <div class="bc-info d-flex align-items-center justify-content-end">
            <div class="bc-content">
                <h6><?=$contenido[0]['tipoContenidoId'] == 1 ? 'CANAL' : 'EXPERIENCIA ÚNICA'?></h6>
                <h4 class="bc-title"><?=$contenido[0]['contenidoTitulo']?></h4>
                <a style="font-size: 0.75rem;padding: .8rem 3.5rem;text-transform: uppercase;max-width: 212px" href="<?=url('contenido')?>?contenido=<?=$contenido[0]['idContenidos']?>" class="btn btn-info m-auto"><?= __('contenidos 8') ?></a>
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
                <h4 class="bc-title"><?= __('contenidos 9') ?></h4>
                <?php if(!isset($_SESSION['token'])) {?>
                <button type="button" class="btn btn-info m-auto" data-toggle="modal" data-target="#iniciarsesion" ><?= __('contenidos 8') ?></button>
                <?php } else { ?>
                <button type="button" class="btn btn-info m-auto" data-toggle="modal" data-target="#regalaContenido" ><?= __('contenidos 8') ?></button>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include_once('inc/footer.php'); ?>
<?php include_once('inc/modal/regalaContenido.php'); ?>

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
    .bi-heart-fill:before {
        font-size: 1.5rem;
    }
</style>


<?php 
    if(isset($_GET['er'])) {
        $estado = base64_decode($_GET['er']);
        if($estado == 'approved'){
            //echo $estado;

            $mm1 = base64_decode($_COOKIE['data1']);
            $mm2 = base64_decode($_COOKIE['data2']);
            $texto = base64_decode($_COOKIE['data3']);
            $monto = base64_decode($_GET['mm']);
            $nrocompra = base64_decode($_GET['ib']);
            $proveedor = base64_decode($_GET['pp']);
            $moneda = base64_decode($_GET['mn']);
            $email = $mm1.'@'.$mm2;
            if( $nrocompra == 'datamp'){
                $nrocompra = $_GET['payment_id'];
            }
            $arrayCompra = array(
                "nroOper" => $nrocompra,
                "monto" => $monto, 
                "tipoMoneda" => $moneda,
                "proveedor" => $proveedor
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
                echo "<script>$('#muestraCodigoGift').modal('toggle');</script>";
            }
        } else {
            echo "<script>$('#error-pago').modal('toggle');</script>";
        }
    } else {
        if(isset($_SESSION['token'])){
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
    }
?>

<script>
var newURL = window.location.href.split("?")[0]+'?'+window.location.href.split("?")[1];
window.history.pushState('object', document.title, newURL);
</script>

