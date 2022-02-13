<?php


    if($valorPuntaje == 0 || $valorPuntaje == null ){
        for ($i=0; $i<5; $i++) { ?>
        <img width="22px" src="imgs/star-01.svg" alt="">
        <?php }
    } else {
        $promedio = $valorPuntaje/$cantidadPuntajes; 
        $float = floor($promedio); 
        $eq = $promedio-$float; 
        $tota = $eq > 0 ? floor($promedio)+1 : floor($promedio);

        for ($i=0; $i < $float ; $i++) { 
            echo '<img width="22px" src="imgs/star-03.svg" alt="">';
        } 
        for ($i=0; $i < $promedio-$float ; $i++) {
            echo '<img width="22px" src="imgs/star-02.svg" alt="">';
        }
        for ($i=0; $i < 5-$tota ; $i++) { 
            echo '<img width="22px" src="imgs/star-01.svg" alt="">';
        }
    }


?>