<?php

  include_once('inicio.php');

  $modelo    = isset($_GET['m']) ? ucfirst($_GET['m']) : false;
  $filtros   = isset($_GET['f']) ? $_GET['f'] : false;
  $metodo = isset($_GET['p']) ? $_GET['p'] : '';
  $profile   = isset($_GET['profile']) ? true : false;


   echo 
  '<fieldset style=" padding: 20px; margin-bottom: 20px;">
      <p>
        <strong>Modelo:</strong>
        <span>'. $modelo .'</span>
      </p>
      <p>
        <strong>Filtros:</strong>
        <span>'. ($filtros ? json_encode($filtros) : '-') .'</span>
      </p>
      <p>
        <strong>Método:</strong>
        <span>'. ($metodo ? $metodo : '-') .'</span>
      </p>
    </fieldset>';


  if(! $modelo){
    die('Tenés que indicar algún modelo.');
  }

  if(! is_callable($modelo.'::obtener')){
    die('El modelo "'.$modelo.'" no existe.');
  }

  if($profile){
    $bench = new Ubench;
    $bench->start();
  }

  if( $filtros ){
    $resultado =  call_user_func( $modelo.'::obtener', $filtros);
  }else{
    $resultado = call_user_func($modelo.'::obtener');
  }

  if($metodo){
    if(method_exists($resultado, $metodo)){
      $resultado = $resultado->$metodo();
    }else{
      die('Este método no existe.');
    }
    
  }

  if($profile){
    $bench->end();
    echo '<pre style="font-size: 18px;">';
    echo 'Tiempo: '.$bench->getTime(false, '%d%s')."\n"; // 156ms or 1s
    echo 'Memoria max: '.$bench->getMemoryPeak()."\n";  // 152B or 90.00Kb or 15.23Mb
    echo 'Memoria uso: '.$bench->getMemoryUsage()."\n"; // 152B or 90.00Kb or 15.23Mb
    echo '</pre>';
  }

  $formato = isset($_GET['formato']) ? $_GET['formato'] : 'default';
  switch($formato){
    case 'html' :
      echo '<pre>';
      print_r($resultado);
      echo '</pre>';

    case 'json' :
      if($resultado !== null){
        header('Content-type: application/json');
        echo json_encode($resultado);
      }else{
        // header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
      }
      break;

    default :
      if($resultado !== null){
        echo '<pre>';
        print_r($resultado);
        echo '</pre>';
      }else{
        die('No hay resultados o hubo un problema.');
      }
      break;
  }


  exit;