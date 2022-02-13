<?php

require_once "../controladores/carrito.controlador.php";
require_once "../modelos/carrito.modelo.php";
require_once "../controladores/contenidos.controlador.php";
require_once "../modelos/contenidos.modelo.php";

session_start();
$token = $_SESSION["token"];

// add producto 
if(isset($_POST['agregaProducto'])) { 
    $idProducto = $_POST['agregaProducto'];
    $envio = ControladorCarrito::ctrAgregaProducto($idProducto, $token);
    echo $envio;
}

//remove producto
if(isset($_POST['removeProducto'])) { 
    $idProducto = $_POST['removeProducto'];
    $envio = ControladorCarrito::ctrRemoveProducto($idProducto, $token);
    echo $envio;
}

// vacia carrito
if(isset($_POST['removeAllProducto'])) { 
    $idProducto = $_POST['removeAllProducto'];
    $envio = ControladorCarrito::ctrRemoveAllProducto($idProducto, $token);
    echo $envio;
}


// busca carrito
if(isset($_POST['buscaCarrito'])) { 
    $null = $_POST['buscaCarrito'];
    $productos = ControladorCarrito::ctrMuesraProductos(1, $token);
    //$productosArray = json_decode($productos,true);
    echo $productos;
}

// desep
if(isset($_POST['deseoAccion'])) { 
    $dato = json_decode($_POST['deseoAccion'], true);
    $accion = $dato['accion'];
    if($accion == 'addDeseo'){
        $link = 'deseos/add/';
        $valor = $dato['contenidoId'];
        $respuesta = modeloCarrito::mdlProductos($link, $valor, $token);
        echo $respuesta;
    } else {
        $link = 'deseos/remove/';
        $valor = $dato['contenidoId'];
        $respuesta = modeloCarrito::mdlProductos($link, $valor, $token);
        echo $respuesta;
    }
}


// agrega gifcard
if(isset($_POST['giftAdd'])) { 
    $data = json_decode($_POST['giftAdd'], true);
    $resultado = ControladorCarrito::ctrGiftAdd($data, $token);
    echo($resultado);
}




// busca la giftcard
if(isset($_POST['canjeaGift'])) { 
    $data = $_POST['canjeaGift'];
    $resultado = ControladorCarrito::ctrBuscaGift($data, $token);
    //var_dump($resultado);
    if(is_array($resultado)) {
        $contenidoId = $resultado['contenidoId'];
        $contenido = ControladorContenidos::ctrMostrarTodoDeUnContenido($contenidoId, $token);
        if($contenido == '[]') {
            echo "<script>$('#mensaje-gif').append('<p>Código vencido</p>')</script>";
        } else {
            $array = json_decode($contenido, true);
            //var_dump($contenido);
            $codigo = base64_encode($data);
            echo "<script>
                $('.review').append('<p>".$array[0]['descripcion1']."</p>');
                $('.img-gift').attr('src', 'backend/".$array[0]['previewRuta']."');
                $('.card-title').text('".$array[0]['titulo1']."');
                $('.card-experience').text('".$array[0]['descripcion1']."');
                $('.precio-exp').text('$ ".$array[0]['precioPesos']."');
                $('.btn-canjea').attr('data', '".$codigo."');
                $('#datosDelContenido').collapse({toggle: true});
            </script>";
        }
    } else {
        echo $resultado;
    }
}



if(isset($_POST['usaGift'])) { 
    //echo 'usaGift';
    $codigo = base64_decode($_POST['usaGift']);
    $respuesta = ControladorCarrito::ctrCanjeaGift($token, $codigo);
    if (strlen(strstr($respuesta,'contenidoId'))>0) {
        $array = json_decode($respuesta, true);
        $contenidoId = $array['contenidoId'];
        echo "<script>
            $('#enlace-giftAdd').attr('href', 'contenido.php?contenido=".$contenidoId."');
            $('#mecodigos').modal('toggle');
            $('#giftAddSS').modal('toggle');
        </script>";
    }
    if (strlen(strstr($respuesta,'ya adquirido'))>0) {
        echo "<script>
            $('#mensaje-gif-canje').append('<p>Ya tienes ese contenido</p>');
        </script>";
    }
    if (strlen(strstr($respuesta,'canjeado'))>0) {
        echo "<script>
            $('#mensaje-gif-canje').append('<p>Inexistente o canjeado</p>');
        </script>";
    }

}

