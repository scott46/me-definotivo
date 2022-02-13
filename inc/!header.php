<?php
//inicio sesion
include_once("modal/inicio-sesion.php");

//registro
include_once("modal/registro.php");

?>

<nav class="navbar navbar-expand-lg <?php if($color == 'white') { echo 'navbar-dark';} else { echo 'navbar-light';} ?> fixed-top" id="nav-me">
  <div class="container">

    <!--Buscador-->
    <!--<div class="searchbox-content">
      <form class="searchbox" id="formSearch">
        <a class="close-search"><i class="bi bi-chevron-left"></i></a>
        <input type="search" placeholder="Buscar" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
        <button type="submit" form="formSearch" value="Submit" class="searchbox-submit bi bi-search"></button>
        <span class="searchbox-icon bi bi-search"></span>
      </form>
    </div>-->
    <a class="navbar-brand" href="index.php">
  </a>
    <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarGeneralContent" aria-controls="navbarGeneralContent" aria-expanded="false" aria-label="Toggle navigation">
      <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
    </button>

    <!--Categorias-->
    <div class="collapse navbar-collapse" id="navbarCategorias">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-gastronomia">Gastronomia, vinos y maridajes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-moda-estilo">Moda y estilo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-bienestar-salud">Bienestar y salud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-musica">Música, arte y cultura</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-deportes">Deportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-viajes">Viajes y aventuras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-cursos">Cursos y capacitación</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php#categoria-entretenimiento">Entretenimiento</a>
        </li>
      </ul>
      <i class="bi bi-chevron-left back-bt"></i>
    </div>

    <!--Perfil-->
    <div class="collapse navbar-collapse" id="navbarPerfil">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-person-fill mr-3"></i>ME Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-star-fill mr-3"></i>Me Canales</a>
        </li>
        <li class="nav-item mb-3">
          <a class="nav-link" href="#"><i class="bi bi-star-fill mr-3"></i>ME Experiencas</a>
        </li>
        <li class="nav-item border-top border-white border-bottom pb-2 pt-2">
          <a class="nav-link" href="#"><i class="bi bi-heart mr-3"></i>Lista de Deseos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-power mr-3"></i>Cerrar Sesión</a>
        </li>
      </ul>
      <i class="bi bi-chevron-left back-bt"></i>
    </div>
    <div class="collapse navbar-collapse" id="navbarGeneralContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navbar-collapse bt-categoria" href="#" data-toggle="collapse" data-target="#navbarCategorias" aria-controls="navbarCategorias" aria-expanded="false" aria-label="Toggle navigation">Categorías<i class="bi bi-chevron-down"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="preguntas-frecuentes.php">Preguntas Frecuentes</a>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#registro">Registrate</button>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#iniciarsesion">Iniciar Sesión</button>
        </li>
        <!--<li class="nav-item nav-icon">
          <a class="nav-link bt-search"><i class="bi bi-search"></i></a>
        </li>-->
        <li class="nav-item nav-icon dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarSearch" role="button" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-search"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarSearch">
          <li>  <form class="form-inline">
    <input class="form-control form-search mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
  </form></li>
        </ul>
      </li>
        <li class="nav-item nav-icon">
          <a class="nav-link" href="productos.php"><i class="bi bi-bag"></i></a>
        </li>
        <li class="nav-item nav-icon bt-person">
          <a class="nav-link navbar-collapse" href="#" data-toggle="collapse" data-target="#navbarPerfil" aria-controls="navbarPerfil" aria-expanded="false" aria-label="Toggle navigation"><i class="bi bi-person"></i></a>
        </li>
        <li class="nav-item">
        <p class="nav-link idioma"><a href="#">ESP</a> | <a href="#">ENG</a></p>
        </li>
      </ul>

    </div>
  </div>

  </div>
</nav>

