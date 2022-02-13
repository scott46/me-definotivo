<?php
session_start();



Class ControladorUsuarios{



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/
	static public function ctrRegistroUsuario($usuario){

		// 1- validamos todos los campos esten completos
		$error = array();
		$arraytel = explode( '-',$usuario->telefono) ;
		if($arraytel[1] === ''){
			$campo = [
				'campo'=>'telefono',
				'mensaje' => 'Campo Obligatorio',
				'tipo' => 'input'
			];
			array_push($error, $campo);
		}
		foreach ($usuario as $row => $key) {
			if($key === '' || $key === '0'){
				if($row != 'quiero'){
					$campo = [
						'campo'=>$row,
						'mensaje' => 'Campo Obligatorio',
						'tipo' => 'input'
				];
				array_push($error, $campo);
				}
			}
		}

		if(count($error) != 0){
			return json_encode($error, true);
		} else {

			// 2- validamos que el input email sea un email
			if (filter_var($usuario->email, FILTER_VALIDATE_EMAIL) === FALSE) {
				$campo = [
						'campo'=>'email',
						'mensaje' => 'El email ingresado es incorrecto',
						'tipo' => 'input'
					];
				array_push($error, $campo);
				return json_encode($error, true);
			}

			// validamos si la fecha de cunmpleaños es logica
			$minimo = strtotime("01-01-1950");
			$maximo = strtotime("01-05-2021");
			$mayoredad = date("d-m-Y",strtotime($usuario->nacimiento."+ 18 year"));
			$numeromayoredad = strtotime($usuario->nacimiento."+ 18 year");
			$fechaNacimiento = strtotime($usuario->nacimiento);
			if($fechaNacimiento <= $maximo && $fechaNacimiento >= $minimo) {
			} else {
				$campo = [
					'campo'=>'nacimiento',
					'mensaje' => 'Ingrese la fecha correcta',
					'tipo' => 'input'
				];
				array_push($error, $campo);
				return json_encode($error, true);
			}
			$fecha_actual = strtotime(date("d-m-Y"));
			if($numeromayoredad > $fecha_actual) {
				$campo = [
					'campo'=>'nacimiento',
					'mensaje' => 'Lo sentimos, tienes que ser mayor de edad para loguearte a este sitio',
					'tipo' => 'input'
				];
				array_push($error, $campo);
				return json_encode($error, true);
			} 

			// 3- validamos si el pass tiene 8 digitos y una mayuscula
			// 3A) FUNCION PARA VALIDAR QUE TENGA POR LO MENOS UNA MAYUSCULA
			function determinarNotacion($cadena){
    			if ($cadena === strtoupper($cadena)) {
        			return 1;
				}
			    if ($cadena === strtolower($cadena)) {
        			return -1;
    			}
			    return 0;
			}
			//echo determinarNotacion($usuario->clave);
			// 3B) validamos si la cadena tiene 8 caracteres
			if(strlen($usuario->clave)!=8 || determinarNotacion($usuario->clave) !== 0){
				$campo = [
						'campo'=>'clave',
						'mensaje' => 'La contraseña debe tener como máximo 8 catacteres y un caracter en Mayuscula',
						'tipo' => 'input'
					];
				array_push($error, $campo);
				return json_encode($error, true);
			}

			// 4- validamos sio el pass y el repite pass son iguales
			if($usuario->clave !== $usuario->repiteclave) {
				$campo = [
					'campo'=>'clave',
					'mensaje' => 'Las contraseñas no son iguales',
					'tipo' => 'input'

				];
				array_push($error, $campo);
				$camporep = [
					'campo'=>'repiteclave',
					'mensaje' => 'Las contraseñas no son iguales',
					'tipo' => 'input'
				];
				array_push($error, $camporep);
				return json_encode($error, true);
			}
			// 5- validamos si acepto las condiciones
			/*
			if($usuario->acepto != 1) {
				echo '<div class="py-2 bg-danger mt-4 text-center text-light text-uppercase">error Debes aceptar las condiciones</div>';
				return;
			}*/
			// 6- validamos caracteres especiales
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $usuario->nombre) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $usuario->email) && preg_match('/^[a-zA-Z0-9]+$/', $usuario->clave) ){
				$email = base64_encode($usuario->email);
				// valido. Si esta OK. envio a BD
				$respuesta = modeloUsuarios::mdlAddUser($usuario);
				// si esta ok, envio email 
				$json = json_decode($respuesta, true);
				//echo $respuesta;				

				if(strpos($json['estado'], 'Added')) {
					$ruta = 'http://c2370883.ferozo.com/md/me/index.php?vrrtcah='.$email.'&mjysiis='.$json['codigo'];
					$tipo = ['motivo' => 'registro','token' => $ruta];
					$enviar = Email::send($usuario, $tipo);
						if($enviar === 'ok'){
							return 'ok';
						} else {
							$campo = [
								'campo'=>'mensaje',
								'mensaje' => 'No se ha podido enviar el email, intente nuevamente.',
								'tipo' => 'cajon'
							];
							array_push($error, $campo);
							return json_encode($error, true);
						}
				} else if($respuesta == 'Usuario existente') {
					$campo = [
						'campo'=>'mensaje',
						'mensaje' => 'Usuario Existente',
						'tipo' => 'cajon'
					];
					array_push($error, $campo);
					return json_encode($error, true);
				} else {
					$campo = [
						'campo'=>'mensaje',
						'mensaje' => 'El usuario no se ha podido registrar, intente nuevamente',
						'tipo' => 'cajon'
					];
					array_push($error, $campo);
					return json_encode($error, true);
				}
			} else {
				$campo = [
					'campo'=>'mensaje',
					'mensaje' => 'No se permiten caracteres especiales',
					'tipo' => 'cajon'
				];
				array_push($error, $campo);
				return json_encode($error, true);
			}
		}
	}			




	/*=============================================
	1- VALIDA EMAIL
	=============================================*/
	static public function ctrValidarEmail($valor){
		// codificar
		$respuesta = modeloUsuarios::mdlValidarEmail($valor);
		if($respuesta == "Usuario activado"){
			echo'<script>
			$("#cuentaVerificada").modal("toggle");
			console.log("Enviando email de bienvenida");
			$.ajax({
				url:"api/ajax/user.ajax.php",
				method: "POST",
				data: {emailbienvenida: "'.$valor['usuario'].'"},
				success:function(respuesta){ 
				  BorrarHistorial();
				  console.log(respuesta);
				}
			});
			function BorrarHistorial(){
				history.pushState({data:true}, "Titulo", "index.php");
			}
			</script>';
		} 
	}
	/*=============================================
	2- EMAIL BIENVENIDA
	=============================================*/
	static public function ctrEmailBienvenida($email){
		// codificar
		$tipo = ['motivo' => 'bienvenida','token' => ''];
		$user = (object) [
			'email' => $email
		];
		Email::send($user, $tipo);

	}





	/*=============================================
	LOGIN
	=============================================*/
	static public function ctrInicioSessionDirecto($user) {
		// reralizar validaciones
		// 1- validamos todos los campos esten completos
		// foreach ($user as $key) {
		// 	if($key === '') {
		// 		echo '<div class="py-2 bg-danger mt-4 text-center text-light text-uppercase">error Todos los campos tienen que estar completos</div>';
		// 		return;
		// 	}
		// }
		$error = array();
		foreach ($user as $row => $key) {
			if($key === '' || $key === '0'){
				if($row != 'quiero'){
					$campo = [
						'campo'=>$row,
						'mensaje' => 'Campo Obligatorio',
						'tipo' => 'input'
				];
				array_push($error, $campo);
				}
			}
		}
		if(count($error) != 0){
			return json_encode($error, true);
		} else {
			// si esta ok
			$userp = array(
				'user' => $user->email,
				'password' => $user->password
			);
			$respuesta = modeloUsuarios::mdlInicioSessionDirecto($userp);
			if($respuesta === 'Datos incorrectos' || $respuesta === ''){
					$campo = [
						'campo'=> 'mensaje-inicio',
						'mensaje' => 'Los Datos son Incorrectos',
						'tipo' => 'cajon'
				];
				array_push($error, $campo);
				return json_encode($error, true);
				// echo '<div class="py-2 bg-danger my-4 text-center text-light text-uppercase"> error Los Datos son Incorrectos </div>';
			} else if($respuesta === 'Cuenta sin validar') {
				echo '<script>limpiarFormulario("form-login");$("#iniciarsesion").modal("toggle");$("#noVerificada").modal("toggle");</script>';
			}else{ 
				function string_sanitize($s) {
					$result = preg_replace("/[^a-zA-Z0-9]+/", "", $s);
					return $result;
				}
				$_SESSION["token"] = json_decode($respuesta, true);
				$_SESSION["user"] = string_sanitize(explode(':', explode(',', explode('{', base64_decode($_SESSION["token"]))[2])[0])[1]);

				$buscaInformacionUser = ControladorUsuarios::ctrBuscaMEDatos($_SESSION["token"]);
				$_SESSION["iniciales"] = $buscaInformacionUser[0]['nombre'].'-'.$buscaInformacionUser[0]['apellido'];
				$_SESSION["pais"] = $buscaInformacionUser[0]['pais'];
				
				echo '<script>window.location.reload()</script>';
			}
		}	
	}



	static public function ctrOlvideContrasena($email){
		$error = array();
		if($email != ''){
			$codigo = "";
			$respuesta = modeloUsuarios::mdlOlvideContrasena($email);
			if($respuesta != 'Error'){
				$json = json_decode($respuesta);
				$emailbase64 = base64_encode($email);
				$ruta = 'http://c2370883.ferozo.com/md/me/index.php?oollis='.$emailbase64.'&isdfi='.$json->codigo;
				$tipo = ['motivo' => 'olvido','token' => $ruta];
				$usuario = (object) [
					'email' => $email
				];
				$enviar = Email::send($usuario, $tipo);
				//echo $enviar;
				if($enviar === 'ok'){
					return 'ok';
				}
			} else {
				$campo = [
					'campo'=>'mensaje-olvido',
					'mensaje' => 'Datos incorrectos',
					'tipo' => 'cajon'
				];
				array_push($error, $campo);
				return json_encode($error, true);
			}
		} else {
			$campo = [
				'campo'=>'email-olvido',
				'mensaje' => 'Campo Obligatorio',
				'tipo' => 'input'
			];
			array_push($error, $campo);
			return json_encode($error, true);
			//echo '<script>$("#email-olvido").addClass("error-txt");</script>';
		}
	}




	/*=============================================
	NUEVA PASS RECUPERO
	=============================================*/
	static public function ctrNuevaContrasena($dato){
		$error = array();
		// validar que coincidan // uy que no este vacio
		foreach ($dato as $row => $key) {
			if($key === '' || $key === '0'){
				if($row != 'quiero'){
					$campo = [
						'campo'=>$row,
						'mensaje' => 'Campo Obligatorio',
						'tipo' => 'input'
				];
				array_push($error, $campo);
				}
			}
		}
		if(count($error) != 0){
			return json_encode($error, true);
		} else {

			// 1 - validamos si el pass tiene 8 digitos y una mayuscula
			// 1A) FUNCION PARA VALIDAR QUE TENGA POR LO MENOS UNA MAYUSCULA
			function determinarNotacion($cadena){
				if ($cadena === strtoupper($cadena)) {
	    			return 1;
				}
			    if ($cadena === strtolower($cadena)) {
	    			return -1;
				}
			    return 0;
			}
			//echo determinarNotacion($usuario->clave);
			// 1B) validamos si la cadena tiene 8 caracteres
			if(strlen($dato['password'])!=8 || determinarNotacion($dato['password']) !== 0){
				$campo = [
						'campo'=>'password',
						'mensaje' => 'La contraseña debe tener como máximo 8 catacteres y un caracter en Mayuscula',
						'tipo' => 'input'
					];
				array_push($error, $campo);
				$campo2 = [
						'campo'=>'repassword',
						'mensaje' => 'La contraseña debe tener como máximo 8 catacteres y un caracter en Mayuscula',
						'tipo' => 'input'
					];
				array_push($error, $campo2);
				return json_encode($error, true);
			}
			// 2 - validamos sio el pass y el repite pass son iguales
			if($dato['password'] !== $dato['repassword']) {
				$campo = [
					'campo'=>'password',
					'mensaje' => 'Las contraseñas no son iguales',
					'tipo' => 'input'

				];
				array_push($error, $campo);
				$campo2 = [
					'campo'=>'repassword',
					'mensaje' => 'Las contraseñas no son iguales',
					'tipo' => 'input'

				];
				array_push($error, $campo2);
				return json_encode($error, true);
			}
			//var_dump($dato);
			// si toto esta ok, decodifico los datos
			$emailusuario = base64_decode($dato['usuario']);
			$nuevodato = array(
				"password" => $dato['password'],
	  			"repitpassword" => $dato['repitpassword'],
	  			"usuario" => $emailusuario,
	    		"codigo" => $dato['codigo'],
			);
			//var_dump($nuevodato);
			$respuesta = modeloUsuarios::mdlNuevaContrasena($nuevodato);
			if($respuesta === 'Error'){
				$campo = [
					'campo'=>'clave',
					'mensaje' => 'No se pudo modificar su contrase&ntilde;a. <br> Realice el proceso de recupero de contrase&ntilde;a nuevamente.',
					'tipo' => 'cajon'
				];
				array_push($error, $campo);
				return json_encode($error, true);
			} if($respuesta === 'OK') {
				// si todo esta ok enviamos email confirmando los cambios
				$usuario = (object) [
					'email' => $emailusuario
				];
				$tipo = ['motivo' => 'contrasenaok','token' => ''];
				$enviar = Email::send($usuario, $tipo);
				if($enviar === 'ok'){
					return 'OK';
				}
			}
		}
	}




	/*=============================================
	REENVIA EMAIL DE VERIFICACION
	=============================================*/
	static public function ctrReenviaEmailVarificacion($email){
		$error = array();
		if($email === ''){
			$campo = [
				'campo'=>'email-reenvia',
				'mensaje' => 'Campo Obligatorio',
				'tipo' => 'input'
			];
			array_push($error, $campo);
			return json_encode($error, true);
		} else {
			$respuesta = modeloUsuarios::mdlReenviaEmailVarificacion($email);
			if($respuesta === 'Error') {
				$campo = [
					'campo'=>'mensaje',
					'mensaje' => 'El email ingresado no se encuentra pendiente de verificacion',
					'tipo' => 'cajon'
				];
				array_push($error, $campo);
				return json_encode($error, true);
			} else {
				$codigo = json_decode($respuesta, true);
				$emailEncriptado = base64_encode($email);
				$usuario = (object) [
					'email' => $email
				];
				$ruta = 'http://c2370883.ferozo.com/md/me/index.php?vrrtcah='.$emailEncriptado.'&mjysiis='.$codigo['codigo'];
				$tipo = ['motivo' => 'reenvioemailverificacion','token' => $ruta];
				$enviar = Email::send($usuario, $tipo);

				if($enviar === 'ok'){
					return 'ok';
				} else {
					$campo = [
						'campo'=>'mensaje',
						'mensaje' => 'No se ha podido enviar el email, intente nuevamente.',
						'tipo' => 'cajon'
					];
					array_push($error, $campo);
					return json_encode($error, true);
				}
			}
		}
	}



	static public function ctrBuscaMEDatos($token){ 
		$link = 'usuarios/mydetails';
		$valor = '';
		$respuesta = modeloUsuarios::mdlBuscaMEDatos($link, $valor, $token);
		return json_decode($respuesta, true);
	}

	static public function ctrModificaDatosUser($user, $token){ 
		$link = 'usuarios/modifyuser';
		$respuesta = modeloUsuarios::mdlModificaDatosUser($link, $user, $token);
		return $respuesta;
	}


	static public function ctrModificaPassUser($user, $token){ 
		$link = 'usuarios/modifyuserpassword';
		$respuesta = modeloUsuarios::mdlModificaDatosUser($link, $user, $token);
		return $respuesta;
	}

	

}