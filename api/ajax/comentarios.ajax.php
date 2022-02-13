<?php 


require_once "../controladores/comentarios.controlador.php";
require_once "../modelos/comentarios.modelo.php";
require_once "../controladores/contenidos.controlador.php";
require_once "../modelos/contenidos.modelo.php";

session_start();
$token = $_SESSION["token"];
$user = $_SESSION["user"];

// add producto 
if(isset($_POST['comentario'])) { 
    $comentario = json_decode($_POST['comentario'], true);
    $tipo = $comentario['tipo'];
    $envio = ControladorComentarios::ctrAgregaComentario($comentario, $token, $tipo);
    if(strpos($envio, 'Added')){
        $arrayRTA = json_decode($envio, true);
        $arrayRTA['user'] = $user;
        $json = json_encode($arrayRTA);
        echo $json;
    } else {
        echo $envio;
    }
}

if(isset($_POST['addValor'])) { 
    $valuacion = json_decode($_POST['addValor'], true);
    $envio = ControladorComentarios::ctrAgregaValuacion($valuacion, $token);
    echo $envio; 
}


