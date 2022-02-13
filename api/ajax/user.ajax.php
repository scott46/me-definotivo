<?php
//session_start();

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
require_once '../forms/core/Emails.php';

session_start();
$token = $_SESSION["token"];

function getRealIP(){
    if (isset($_SERVER["HTTP_CLIENT_IP"])){
        return $_SERVER["HTTP_CLIENT_IP"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
        return $_SERVER["HTTP_X_FORWARDED"];
    }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_FORWARDED"])){
        return $_SERVER["HTTP_FORWARDED"];
    }else{
        return $_SERVER["REMOTE_ADDR"];
    }
}       


// registrar usuario
if(isset($_POST['addUser'])) {
	$user = json_decode($_POST['addUser']);
	$user->ipAcepto = getRealIP();
	$respuesta = ControladorUsuarios::ctrRegistroUsuario($user);
	echo $respuesta;
}



// iniciar session
if(isset($_POST['startUser'])) {
    $user = json_decode($_POST['startUser']);
    $respuesta = ControladorUsuarios::ctrInicioSessionDirecto($user);
    echo $respuesta;
}


// olvido
if(isset($_POST['olvido'])) {
    $email = $_POST['olvido'];
    $respuesta = ControladorUsuarios::ctrOlvideContrasena($email);
    if($respuesta === 'ok'){
        echo'<script>$("#olvidecontrasena").modal("toggle");$("#emailolvido").modal("toggle");</script>';        
    } else {
        echo $respuesta;
    }
}


// nueva contraseña de olvido
if(isset($_POST['nuevapassolvido'])) {
    $dato = $_POST['nuevapassolvido'];
    $respuesta = ControladorUsuarios::ctrNuevaContrasena($dato);
    //echo $respuesta;
    if($respuesta === 'OK'){
        echo'<script>$("#recuperocontrasena").modal("toggle");$("#newpassexitosa").modal("toggle");</script>';        
    } else {
        echo $respuesta;
    }
}


// enviamos email de bienvenida
if(isset($_POST['emailbienvenida'])) { 
    $email = $_POST['emailbienvenida'];
    $envio = ControladorUsuarios::ctrEmailBienvenida($email);
    echo $envio;
}

            
// reenvia email de verificacion
if(isset($_POST['reenviaEmail'])) { 
    $email = $_POST['reenviaEmail'];
    $envio = ControladorUsuarios::ctrReenviaEmailVarificacion($email);
    if($envio === 'ok'){
        echo'<script>$("#reenviaEmail").modal("toggle");$("#verificacionreenvio").modal("toggle");</script>';        
    } else {
        echo $envio;
    }
}

            
// modifica datos user
if(isset($_POST['modif'])) { 
    $user = $_POST['modif'];
    $modifica = ControladorUsuarios::ctrModificaDatosUser($user, $token);
    echo $modifica;
}

// modifica datos user
if(isset($_POST['modifPass'])) { 
    $user = $_POST['modifPass'];
    $modifica = ControladorUsuarios::ctrModificaPassUser($user, $token);
    echo $modifica;
}
