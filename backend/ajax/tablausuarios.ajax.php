<?php 


require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";

session_start();


class TablaCategorias{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	
	public function mostrarTabla(){
		if(isset($_SESSION["tokenBack"])) {
			$token = json_decode($_SESSION["tokenBack"], true);
		} else {
			$token = null;
		}
		$respuesta = TablasControlador::ctrMostrarTablasUser('usuarios/', 'all', $token);
		$arrayrta = json_decode($respuesta, true);
		if(count($arrayrta) <= 0){
			$datosJson = '{"data":[]}';
			echo $datosJson;
			return;
		} else {
			$array = json_decode($respuesta, true);
			$datosJson = '{
			"data":[';
			foreach ($array as $key => $value) {
				// activa/desactiva
				if($value["estado"] == 'inactivo'){
					$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-usuario' estado='1' idUsuarios='".$value["idUsuarios"]."'>Desactivado</button></div>";
				} if($value["estado"] == 'activo'){
					$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-usuario' estado='0' idUsuarios='".$value["idUsuarios"]."'>Activado</button></div>";
				} if($value["estado"]== 'pendiente'){
					$estado = "<div class='text-center'><button class='btn btn-info btn-sm btnActivar-usuario' estado='1' idUsuarios='".$value["idUsuarios"]."'>Pendiente</button></div>";
				}
				// acciones
				$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm editarUsuario mx-2' idUsuarios='".$value["idUsuarios"]."'><i class='fas fa-pencil-alt'></i></button></div>";
                $id = " <div class='text-center'>".$value['idUsuarios']."</div>";

				$datosJson .='[
                            "'.$id.'",
							"'.$value['email'].'",
							"'.strtoupper($value['apellido']).'",
							"'.strtoupper($value['nombre']).'",
							"'.$value['telefono'].'",
							"'.$value['nacimiento'].'",
							"'.$value['pais'].'",
							"'.$value['nivel'].'",
							"'.$estado.'",
							"'.$acciones.'"
							],';

			}

			$datosJson = substr($datosJson, 0, -1);
			$datosJson .= ']}';
			echo $datosJson;
		}
	}

}

/*=============================================
Tabla Tags
=============================================*/ 
$tabla = new TablaCategorias();
$tabla -> mostrarTabla();



