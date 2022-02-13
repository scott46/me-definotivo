<?php


require_once('../forms/libs/PHPMailer/PHPMailerAutoload.php');
require_once('../core/Config.php');
//agregamos los formularios de envios de email
require_once("formEnvios/registro.form.php");
require_once("formEnvios/olvido.form.php");
require_once("formEnvios/bienvenida.form.php");
require_once("formEnvios/reenvioemailverificacion.form.php");
require_once("formEnvios/contrasenaok.form.php");
require_once("formEnvios/enviaCodigo.form.php");


class Email {



	static public function send ($usuario, $tipo) {
		//var_dump($usuario);
		//var_dump($tipo);
		$empresa = Config::obtener('empresa');
		// echo $usuario->email;
		// echo $empresa->emailRmitente;
		// echo $empresa->remitente;
		//$destinatarios = array($usuario->email);
		//construye el mensaje para el cliente
		if($tipo['motivo'] === 'registro'){
			$envio = registroForm ($usuario, $empresa, $tipo['token']);
			return $envio;
		} 
		if($tipo['motivo'] === 'olvido') {
			$envio = olvidoForm ($usuario, $empresa, $tipo['token']);
			return $envio;
		} 
		if($tipo['motivo'] === 'bienvenida') {
			$envio = bienvenidaForm ($usuario, $empresa);
			return $envio;
		}
		if($tipo['motivo'] === 'reenvioemailverificacion') {
			$envio = reenvioemailverificacion ($usuario, $empresa, $tipo['token']);
			return $envio;
		}
		if($tipo['motivo'] === 'contrasenaok') {
			$envio = contrasenaok ($usuario, $empresa);
			return $envio;
		}
		if($tipo['motivo'] === 'enviaCodigo') {
			$envio = enviaCodigo ($usuario, $empresa, $tipo['codigo'], $tipo['texto'], $tipo['quienRegala']);
			return $envio;
		}
	}



	static public function sendEmpresaRegistro ($usuario, $asunto) {
		$empresa = Config::obtener('empresa');
		echo $usuario->email;
		echo $empresa->emailRmitente;
		echo $empresa->remitente;
		//construye el mensaje para la empresa
		//$asunto = 'Usuario nuevo registrado';
		$cuerpo = '
			<hr>
			<label>Apellido: '.$usuario->apellido.'</label><br>
			<label>Nombre: '.$usuario->nombre.'</label><br>
			<label>Email: '.$usuario->email.'</label><br>
			<label>Genero: '.$usuario->genero.'</label><br>
			<label>Pais: '.$usuario->pais.'</label><br>
			<label>Fecha Nac: '.$usuario->nacimiento.'</label><br>
			<label>Ip: '.$usuario->ipAcepto.'</label><br>
			<hr>';
		$destinatarios = $empresa->emailRegistros;
		$mensaje = array();
		$mensaje['emailRemitente'] = $empresa->emailRmitente;
		$mensaje['nombreRemitente'] = $empresa->remitente;
		$mensaje['cuerpo'] = $cuerpo;
		$mensaje['asunto'] = $asunto;
		$envio = Email::enviarMensaje($destinatarios, $mensaje);
		//return $envio;
	}


	static public function enviarMensaje($destinatarios, $mensaje) {
		echo 'enviando email';
		$PHPMailer = new PHPMailer(true);
		$PHPMailer->isSMTP();
		// $PHPMailer->SMTPDebug = 4;
		$PHPMailer->Debugoutput = 'html';

		$PHPMailer->Host = 'base.synapsis.com.ar';
		$PHPMailer->Port = 587;
		$PHPMailer->SMTPSecure = 'tls';
		$PHPMailer->SMTPAuth = true;
		$PHPMailer->Username = 'base';
		$PHPMailer->Password = '-vCA_%v*1#7.';

		$PHPMailer->CharSet  = "UTF-8";
		$PHPMailer->IsHTML(true);
		$PHPMailer->Subject  = $mensaje['asunto'];
		$PHPMailer->From     = $mensaje['emailRemitente'];
		$PHPMailer->FromName = $mensaje['nombreRemitente'];
		$PHPMailer->Body = $mensaje['cuerpo'];
		
		foreach($destinatarios as $d){
			$PHPMailer->AddAddress($d);
		}
		
		// Se realizan hasta 3 intentos de envio del correo	
		for($i=0; $i<3; $i++){
			if($enviado = $PHPMailer->Send()){
				break;
			}
			sleep(2);
		}
			
		if($enviado){
			return 'ok';
		}else{
			return ('error');
		}
	}

}