<?php

require_once('api/inicio.php');
define('SECCION', 'experiencia');
include_once("inc/header.php");
$section = 'categorias';
//color de pagina
$color = 'white';


?>



  <header class="main-experience" style="background-image: url(imgs/experiencia/experiencia-juan-minujin-principal.jpg);">
    <div class="bg-black-op"></div>
    <div class="container">

    <div class="content-main-experience">
        <div class="row row-eq-height">
            <div class="col-md-8">
                <h1>JUAN MINUJÍN</h1>
                <h3>Desde el 01-03 a las 12:00 pm</h3>
                <h4>Audio + PDF descargable</h4>
                <p class="info-experience">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <div class="cant-experience d-flex flex-row">
                    <p><i class="bi bi-clock"></i> 2hrs 17 min</p>
                </div>
            </div>
            <div  class="col-md-4">
                <p class="precio-exp">$80</p>
                <div class="online">
                <button type="button" class="btn btn-info">comprá ahora</button>
                  <img src="imgs/display.svg" alt="display"><p>ONLINE EXPERIENCE</p></div> 
            </div>
    </div>
</div>
</div>
</header>

  <section class="experiencia">
      <div class="container content-experience">
      <div class="row">
          <div class="col"><h2>CONVIRTIÉNDOSE EN UN ACTOR</h2></div>
          <div class="col"><a href="" class="bt-back">VOLVER</a></div>
        </div>

      <div class="audio d-flex align-items-end" style="background-image:url(imgs/experiencia/experiencia-juan-minujin-audio-1.jpg)">
        <div class="audio-content">
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

    <div class="row">
      <div class="col">
        <div class="pdf d-flex">
        <p>Descargar PDF</p>
        <div class="ml-auto"> 
          <a href="pdf/ME-Experiences-A4.pdf"><i class="bi bi-eye-pdf"></i></a>
          <a href="pdf/ME-Experiences-A4.pdf" download=""><i class="bi bi-download"></i></a>
        </div>
      </div>
      </div>
    </div>

      </div>
  </section>
  <section class="content-review">
      <div class="container content-experience">
      <div class="row border-bottom mb-5 pb-1 mt-5">
          <div class="col-md-12">
            <h3 class="title-ce">Reseñas</h3>
          </div>
          <div class="col">
              <div class="rate">
                <i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><p>(15 reseñas)</p>
              </div>
          </div>
          <div class="col">
              <div class="share d-flex flex-row justify-content-end">
                <a href="#"><i class="bi bi-upload"></i></a><p class="align-self-center">Compartir</p>
                <a href="#" class="mt-1"><i class="bi bi-heart"></i></a><p class="align-self-center">Me gusta</p>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col">
              <form>
                  <textarea placeholder="Escribí tu comentario" class="comment-review" rows="4"></textarea>
                  <button type="button" class="btn btn-gradient gradient-1 ml-auto mt-2">ENVIAR</button>
              </form>
          </div>
      </div>
      <div class="row mt-5 mb-5">
        <div class="col-md-6 d-flex flex-row mb-4">
            <div class="follower">
                <img src="imgs/usuarios/seguidor-1.png" alt="seguidor">
              </div>
            <div class="follower-comment">
                <h5>Seguidor 1</h5>
                <h6>Febrero 01</h6>
                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim ipsum non quam volutpat, a ornare orci iaculis. Sed sodales porttitor nisi. Morbi in dolor quis nisl rhoncus auctor. Proin et vulputate augue, vitae tincidunt nisi. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam dolor enim, elementum et lorem gravida, tempus tincidunt dui. In imperdiet quis libero eget laoreet.
                </p>
            </div>
        </div>

        <div class="col-md-6 d-flex flex-row mb-4">
            <div class="follower">
                <img src="imgs/usuarios/seguidor-1.png" alt="seguidor">
            </div>
            <div class="follower-comment">
                <h5>Seguidor 1</h5>
                <h6>Febrero 01</h6>
                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim ipsum non quam volutpat, a ornare orci iaculis. Sed sodales porttitor nisi. Morbi in dolor quis nisl rhoncus auctor. Proin et vulputate augue, vitae tincidunt nisi. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam dolor enim, elementum et lorem gravida, tempus tincidunt dui. In imperdiet quis libero eget laoreet.
                </p>
            </div>
        </div>

        <div class="col-md-6 d-flex flex-row mb-4">
            <div class="follower">
                <img src="imgs/usuarios/seguidor-1.png" alt="seguidor">
            </div>
            <div class="follower-comment">
                <h5>Seguidor 1</h5>
                <h6>Febrero 01</h6>
                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim ipsum non quam volutpat, a ornare orci iaculis. Sed sodales porttitor nisi. Morbi in dolor quis nisl rhoncus auctor. Proin et vulputate augue, vitae tincidunt nisi. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam dolor enim, elementum et lorem gravida, tempus tincidunt dui. In imperdiet quis libero eget laoreet.
                </p>
            </div>
        </div>

        <div class="col-md-6 d-flex flex-row mb-4">
            <div class="follower">
                <img src="imgs/usuarios/seguidor-1.png" alt="seguidor">
            </div>
            <div class="follower-comment">
                <h5>Seguidor 1</h5>
                <h6>Febrero 01</h6>
                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque dignissim ipsum non quam volutpat, a ornare orci iaculis. Sed sodales porttitor nisi. Morbi in dolor quis nisl rhoncus auctor. Proin et vulputate augue, vitae tincidunt nisi. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam dolor enim, elementum et lorem gravida, tempus tincidunt dui. In imperdiet quis libero eget laoreet.
                </p>
            </div>
        </div>
        <button type="button" class="btn btn-outline-more m-auto">Ver todas las reseñas</button>
      </div>

      </div>
  </section>

  <section class="fechas-disponibles">
      <div class="container content-experience">
      <div class="row">
        <div class="col mb-4">
            <h3 class="title-ce">CONOCÉ OTRAS FECHAS DISPONIBLES</h3>
            <h4 class="disponible">4 Disponibles</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
            <div class="otras-fechas">
                <span>MIER, FEB 17</span><br><br>
                9:00 PM - 10:30 PM (ART)<br>
                60 cupos disponibles<br><br>
                $80 ARS 
            </div>
            <button type="button" class="btn btn-gradient btn-block mt-3 mb-4">COMPRá AHORA</button>
        </div>
        <div class="col-md-4">
            <div class="otras-fechas">
                <span>MIER, FEB 17</span><br><br>
                9:00 PM - 10:30 PM (ART)<br>
                60 cupos disponibles<br><br>
                $80 ARS 
            </div>
            <button type="button" class="btn btn-gradient btn-block mt-3 mb-4">COMPRá AHORA</button>
        </div>
        <div class="col-md-4">
            <div class="otras-fechas">
                <span>MIER, FEB 17</span><br><br>
                9:00 PM - 10:30 PM (ART)<br>
                60 cupos disponibles<br><br>
                $80 ARS 
            </div>
            <button type="button" class="btn btn-gradient btn-block mt-3 mb-4">COMPRá AHORA</button>
        </div>
    </div>
    </div>
  </section>

  <section class="experienca-extra">
      <div class="banner-canal bc-gift">
        <div class="bc-info d-flex align-items-center flex-row">
            <div>
            <img src="imgs/gift-card-canal.png" alt="gift card" class="mr-auto img-fluid">
        </div>
          <div class="bc-content ml-auto">
            <h4 class="bc-title">Regalá experiencias Descubrí un mundo de opciones para cada momento</h4>
            <button type="button" class="btn btn-info m-auto">comprá ahora</button>
          </div>
        </div>
      </div>

      <div class="header-experiencia-home text-center">
        <h3 class="title-exp">Disfrutá de experiencias<br>exclusivas con</h3>
        <img src="imgs/amex-logo.png" alt="american express no vivas la vida sin ella">
      </div>

      <div class="container content-categorias">
          <h3 class="title-ce mb-4">DESCUBRÍ EXPERIENCIAS SIMILARES</h3>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <img src="imgs/canal/canal-pedro-barguero.jpg" class="card-img-top" alt="canal-pedro-barguero">
              <div class="d-flex flex-row">
                <div class="card-body">
                  <h5 class="card-title">CANAL</h5>
                  <h6 class="card-name mb-2">Pedro Barguero</h6>
                </div>
                <div class="card-price">$100</div>
              </div>
              <div class="card-footer d-flex flex-row align-items-end">
                <div class="card-info">
                  <p class="card-desc">Masterclass de cocina (16 videos)</p>
                  <p class="card-time">6 meses</p>
                </div>
                <small class="d-flex align-items-end"><a href="#"><i class="bi bi-upload"></i></a><a href="#" class="like active"><i class="bi bi-heart"></i></small></a>
              </div>
            </div>
          </div>
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <img src="imgs/experiencia/experiencia-fernando-trocca.jpg" class="card-img-top" alt="experiencia-fernando-trocca">
              <div class="d-flex flex-row">
                <div class="card-body">
                  <h5 class="card-title">EXPERIENCIA POR ÚNICA VEZ</h5>
                  <h6 class="card-name mb-2">Fernando Trocca</h6>
                </div>
                <div class="card-price">$100</div>
              </div>
              <div class="card-footer d-flex flex-row align-items-end">
                <div class="card-info">
                  <p class="card-desc">Cocinando en la Patagonia</p>
                  <p class="card-time">desde el 24-02 a las 6:00 pm</p>
                </div>
                <small class="d-flex align-items-end"><a href="#"><i class="bi bi-upload"></i></a><a href="#" class="like"><i class="bi bi-heart"></i></small></a>
              </div>
            </div>
          </div>
  
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
              <img src="imgs/canal/canal-gonzalo-aramburu.jpg" class="card-img-top" alt="canal-gonzalo-aramburu">
              <div class="d-flex flex-row">
                <div class="card-body">
                  <h5 class="card-title">CANAL</h5>
                  <h6 class="card-name mb-2">Gonzalo Aramburu</h6>
                </div>
                <div class="card-price">$100</div>
              </div>
              <div class="card-footer d-flex flex-row align-items-end">
                <div class="card-info">
                  <p class="card-desc">Masterclass de cocina (16 videos)</p>
                  <p class="card-time">6 meses</p>
                </div>
                <small class="d-flex align-items-end"><a href="#"><i class="bi bi-upload"></i></a><a href="#" class="like"><i class="bi bi-heart"></i></small></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  <script src="https://unpkg.com/wavesurfer.js"></script>
  <script src="https://unpkg.com/wavesurfer.js/dist/plugin/wavesurfer.regions.min.js"></script>
  <?php include_once('inc/footer.php'); ?>


