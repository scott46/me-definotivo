<?php 


define('SESSIONBACK', 'inicio');
  /*
  if($admin["perfil"] != "Administrador"){

    echo '<script>

      window.location = "banner";

    </script>';

    return;

  }
*/
 ?>

 <div class="content-wrapper" style="min-height: 717px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Specs</h1>
        </div>

        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active px-3">Specs</li>
          </ol>
        </div> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <button onclick="topFunction()" id="myBtn" title="Resumen"><i class="fas fa-arrow-up"></i></button>
    <div class="container">
      <div class="row py-4 px-3">

        <div class="col-4">

        </div>



        <div class="col-12">

          <!-- Menu -->
          <label for="">Resumen</label>
          <div>
            <ul>
              <li>
                <a href="#Banner">Banner</a> <span>-> Controla los banner que se verán en tu web</span>
              </li>
              <li>
                <a href="#Autores">Autores</a> <span>-> Los autores son los dueños de los contenidos</span>
              </li>
              <li>
                <a href="#Categorias">Categorias</a> <span>-> Agrupa tus contenidos en Categorias</span>
              </li>
              <li>
                <a href="#Contenidos">Contenidos</a> <span>-> Los Contenidos son experiencias. Pueden contenier una Experiencia única o un conjunto de elementos.</span>
              </li>
              <li>
                <a href="#Elementos">Elementos</a> <span>-> Los elementos estan agrupados dentro de un contenido y pueden ser diferentes tipos videos, audios y PDF.</span>
              </li>
              <li>
                <a href="#Faq">Faq</a> <span>-> Controla las Preguntas Frecuentes que se verán en tu web</span>
              </li>
              <li>
                <a href="#pp">Política de privacidad</a> <span>-> Controla tu Política de privacidad que se verán en tu web</span>
              </li>
              <li>
                <a href="#tyc">Términos y Condiciones</a> <span>-> Controla tus Términos y Condiciones que se verán en tu web</span>
              </li>
              <li>
                <a href="#Resenas">Reseñas</a> <span>-> Controla todas las Reseñas de tu sitio</span>
              </li>
              <li>
                <a href="#GiftCard">Gift Card</a> <span>-> Controla las Gift Card que se generan desde tu sitio</span>
              </li>
              <li>
                <a href="#usuarios">Usuarios</a> <span>-> Accede a los Usuarios registrados</span>
              </li>
            </ul>
          </div>
          <hr>
          <br>
          <br>







          <!-- Pantallas -->
          <div id="Banner">
            <h1 for="">Banner</h1>
            <img src="" alt="">
            <p>Proceso de Banner</p>
          </div>

          <div id="Autores">
            <h1 for="">Autores</h1>
            <img src="" alt="">
            <p>Proceso de Autores</p>
          </div>

          <div id="Categorias">
            <h1 for="">Categorias</h1>
            <img src="" alt="">
            <p>Proceso de Categorias</p>
          </div>

          <div id="Contenidos">
            <h1 for="">Contenidos</h1>
            <img src="" alt="">
            <p>Proceso de Contenidos</p>
          </div>

          <div id="Elementos">
            <h1 for="">Elementos</h1>
            <img src="" alt="">
            <p>Proceso de Elementos</p>
          </div>

          <div id="Faq">
            <h1 for="">Preguntas Frecuentes</h1>
            <img src="" alt="">
            <p>Proceso de Preguntas Frecuentes</p>
          </div>
          
          <div id="pp">
            <h1 for="">Política de privacidad</h1>
            <img src="" alt="">
            <p>Proceso de Política de privacidad</p>
          </div>

          <div id="tyc">
            <h1 for="">Términos y Condiciones</h1>
            <img src="" alt="">
            <p>Proceso de Términos y Condiciones</p>
          </div>

          <div id="Resenas">
            <h1 for="">Reseñas</h1>
            <img src="" alt="">
            <p>Proceso de Términos y Reseñas</p>
          </div>

          <div id="GiftCard">
            <h1 for="">Gift Card</h1>
            <img src="" alt="">
            <p>Proceso de Gift Card</p>
          </div>

          <div id="usuarios">
            <h1 for="">Usuarios</h1>
            <img src="" alt="">
            <p>Proceso de Usuarios</p>
          </div>





        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<style>
.box-data h1 {
  font-size: 5rem;
}
#myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: #2d7ac0; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}
#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}
</style>
<script>
mybutton = document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>