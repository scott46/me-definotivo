<?php 

    $archivoEncoding = ControladorContenidos::ctrBuscoArchivo($elementos[0]['IdElemento'], $token);
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