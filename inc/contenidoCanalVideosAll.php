<?php
//foreach(array_slice($elementos, 1) as $elemento) {
foreach($elementos as $elemento) {
    if($elemento['esPreview'] == 0) {

        $puntajeContenido = ControladorComentarios::ctrMostrarPuntaje($elemento['IdElemento'], 'elementos', $token);
        $arraypuntajeContenido = json_decode($puntajeContenido,true);
        $valorPuntaje = 0;
        $cantidadPuntajes = 0;
        if(count($arraypuntajeContenido) != 0){
            foreach($arraypuntajeContenido as $row) {
                $valorPuntaje += intval($row['puntaje']);
                $cantidadPuntajes ++;
                $puntajeTotalDelContenido += intval($row['puntaje']);
                $cantidadPuntajesTotal ++;
            }
        }

        foreach($arrayTipos as $tipo){
            if($elemento['tipoId'] == $tipo['idTipos']){
                $tipoElemento = IDIOMA == 'es' ? $tipo['descripcion1'] : $tipo['descripcion1'];
            }
        }     

        if($elemento['activo'] == 1 ) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-image">
                        <div class="bg-black-card"></div>
                        <div class="material-video">
                            <?php if(isset($_SESSION["token"]) && $compraOk != '') { ?>
                            <a href="<?=url('elemento')?>?elemento=<?=base64_encode($elemento['IdElemento'])?>">
                                <div class="play">
                                    <img src="imgs/play.svg" alt="play">
                                </div>
                                <div class="review">
                                    <p><?=IDIOMA == 'es' ? $elemento['elementoDescripcion'] : $elemento['elementoDescripcion']?></p>

                                    <?php include "inc/puntaje.php"; ?>

                                </div>
                            </a>
                            <?php } else {?>
                                <div class="play">
                                    <img src="imgs/candado.svg" alt="play">
                                </div>
                                <div class="review">
                                    <p><?=IDIOMA == 'es' ? $elemento['elementoDescripcion'] : $elemento['elementoDescripcion']?></p>

                                     <?php include "inc/puntaje.php"; ?>

                                </div>
                            <?php } ?>
                        </div>
                        <img src="backend/<?=$elemento['previewElementoRuta']?>" class="card-img-top" alt="<?=$elemento['elementoTitulo']?>">
                    </div>
                    <div class="d-flex">
                        <div class="card-body">
                            <h5 class="card-title"><?=IDIOMA == 'es' ? $elemento['elementoTitulo'] : $elemento['elementoTitulo']?></h5>
                            <h6 class="card-experience mb-2"><?=IDIOMA == 'es' ? strtoupper($elemento['elementoSubtitulo']) : strtoupper($elemento['elementoSubtitulo'])?></h6>
                        </div>
                        <div class="card-links d-flex align-items-top mt-3 justify-content-end">
                            <?php include "inc/enlaces_redes.php"; ?>
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
    } ?>