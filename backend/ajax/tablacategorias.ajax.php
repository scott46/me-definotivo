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
			$token = $_SESSION["tokenBack"];
		} else {
			$token = null;
		}

		//echo 'categorias';

		$respuesta = TablasControlador::crtMostrarTablas('categorias', null, $token);
		$arrayrta = json_decode($respuesta, true);

		//echo count($arrayrta);

		if($arrayrta == NULL){
			$datosJson = '{"data":[]}';
			echo $datosJson;
			return;
		} else {
			$array = json_decode($respuesta, true);
			$datosJson = '{
			"data":[';
			foreach ($array as $key => $value) {
				// activa/desactiva
				if($value["activo"] == 0){
					$estado = "<div class='text-center'><button title='Activa' class='btn btn-outline-dark btn-sm btnActivar' estadoCategoria='1' idCategoria='".$value["idCategorias"]."'>Desactivado</button></div>";
				}else{
					$estado = "<div class='text-center'><button title='Desactiva' class='btn btn-dark btn-sm btnActivar' estadoCategoria='0' idCategoria='".$value["idCategorias"]."'>Activado</button></div>";
				}
				if($value["ae"] == 1) {
					$ae = "<div class='ml-4 mr-2'><button title='Quita Banner AE' type='checkbox' class='btn btn-dark btn-sm checkAE' checked estadoCheck='0' idCategoria='".$value["idCategorias"]."'><i class='fas fa-star'></i></button></div>";
				} else {
					$ae = "<div class='ml-4 mr-2'><button title='Agrega Banner AE' type='checkbox' class='btn btn-outline-dark btn-sm checkAE' estadoCheck='1' idCategoria='".$value["idCategorias"]."' ><i class='fas fa-star'></i></button></div>";
				}
				// acciones
				$acciones = "<div class='d-flex text-center'>$ae<button title='Edita detalles' class='btn btn-dark btn-sm editarCategoria mx-2' idCategoria='".$value["idCategorias"]."'><i class='fas fa-pencil-alt'></i></button><button title='Edita Background' class='btn btn-dark btn-sm editarBackgroundCategoria mx-2' idCategoria='".$value["idCategorias"]."'><i class='fas fa-image'></i></button></div>";
				//imagenes
				if($value["rutaBackground"] != ''){
					$imagen = "<div class='text-center'><img style='width: auto;height: 50px' src='../backend/".$value["rutaBackground"]."' alt='imagen'></div>";
				} else {
					$imagen = '';
				}

				$datosJson .='[
							"'.$value['idCategorias'].'",
							"'.$value['orden'].'",
							"'.strtoupper($value['titulo1']).'",
							"'.strtoupper($value['titulo2']).'",
							"'.$imagen.'",
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



