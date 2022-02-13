<?php

class ControladorAdministradores{

	/*=============================================
	Ingreso Administradores
	=============================================*/

	public function ctrIngresoAdministradores(){
		if(isset($_POST["ingresoUsuario"])){
		
			$item = "usuarios/login";
			
			$valor = array(
				'user' => $_POST["ingresoUsuario"],
				'password' => $_POST["ingresoPassword"]
			);

			$respuesta = ModeloAdministradores::mdlMostrarAdministradores($item, $valor);
			$object = base64_decode($respuesta);
			$array = explode("}", $object);
			$datosUser = $array[1].'}';
			$arrayDeDatos = json_decode($datosUser, true);
			$nivel = $arrayDeDatos['nivel'];
			
			if($nivel === 'admin') {
				$_SESSION["nivel"] = 'admin';
				$_SESSION["validarSesionBackend"] = "ok";
				$_SESSION["tokenBack"] = $respuesta;
				$_SESSION['tiempo']=time();
				echo '<script>
					window.location = "../backend/index.php";
				</script>';
			}else if($nivel === 'user') {
				echo "<div class='alert alert-danger mt-3 small'>Datos Incorrectos</div>";
			} else {
				echo "<div class='alert alert-danger mt-3 small'>".$respuesta."</div>";	
			}
			
		}
	}

	/*=============================================
	Mostrar Administradores
	=============================================*/

	// static public function ctrMostrarAdministradores($item, $valor){

	// 	$tabla = "administradores";

	// 	$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

	// 	return $respuesta;

	// }

	/*=============================================
	Registro de administrador
	=============================================*/

	// public function ctrRegistroAdministrador(){

	// 	if(isset($_POST["registroNombre"])){

	// 		if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["registroNombre"]) &&
	// 		   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroUsuario"]) &&
	// 		   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){

	// 		   	$encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

	// 			$tabla = "administradores";

	// 			$datos = array("nombre" => $_POST["registroNombre"],
	// 						   "usuario" =>  $_POST["registroUsuario"],
	// 						   "password" => $encriptarPassword,
	// 						   "perfil" => $_POST["registroPerfil"],
	// 						   "estado" => 0);

				
	// 			$respuesta = ModeloAdministradores::mdlRegistroAdministradores($tabla, $datos);
				
	// 			if($respuesta == "ok"){

	// 				echo'<script>

	// 					swal({
	// 							type:"success",
	// 						  	title: "¡CORRECTO!",
	// 						  	text: "El administrador ha sido creado correctamente",
	// 						  	showConfirmButton: true,
	// 							confirmButtonText: "Cerrar"
							  
	// 					}).then(function(result){

	// 							if(result.value){   
	// 							    window.location = "administradores";
	// 							  } 
	// 					});

	// 				</script>';

	// 			}


	// 		}else{

	// 			echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";
	// 		}

	// 	}


	// }

	/*=============================================
	Editar administrador
	=============================================*/

	// public function ctrEditarAdministrador(){

	// 	if(isset($_POST["editarNombre"])){

	// 		if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editarNombre"]) &&
	// 		   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])){

	// 		   	if($_POST["editarPassword"] != ""){

	// 		   		if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

	// 		   			$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');  			

	// 		   		}else{

	// 		   			echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";

	// 		   			return;

	// 		   		}

	// 		   	}else{

	// 		   		$password = $_POST["passwordActual"];
	// 		   	}

	// 			$tabla = "administradores";

	// 			$datos = array("id"=> $_POST["editarId"],
	// 						   "nombre" => $_POST["editarNombre"],
	// 						   "usuario" =>  $_POST["editarUsuario"],
	// 						   "password" => $password,
	// 						   "perfil" => $_POST["editarPerfil"]);

				
	// 			$respuesta = ModeloAdministradores::mdlEditarAdministrador($tabla, $datos);
				
	// 			if($respuesta == "ok"){

	// 				echo'<script>

	// 					swal({
	// 							type:"success",
	// 						  	title: "¡CORRECTO!",
	// 						  	text: "El administrador ha sido editado correctamente",
	// 						  	showConfirmButton: true,
	// 							confirmButtonText: "Cerrar"
							  
	// 					}).then(function(result){

	// 							if(result.value){   
	// 							    window.location = "administradores";
	// 							  } 
	// 					});

	// 				</script>';

	// 			}


	// 		}else{

	// 			echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";
	// 		}

	// 	}

	// }

	/*=============================================
	Eliminar Administrador
	=============================================*/

	// static public function ctrEliminarAdministrador($id){

	// 	$tabla = "administradores";

	// 	$respuesta = ModeloAdministradores::mdlEliminarAdministrador($tabla, $id);

	// 	return $respuesta;

	// }

}