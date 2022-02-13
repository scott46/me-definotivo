<?php 


require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";

class TablaCategorias{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	public function mostrarTabla(){

		//echo 'categorias';

		$respuesta = TablasControlador::crtMostrarTablas('tipos', null);
		if(count($respuesta) <= 0){
			$datosJson = '{"data":[]}';
			echo $datosJson;
			return;
		} else {
			$array = json_decode($respuesta, true);
			$datosJson = '{
			"data":[';
			foreach ($array as $key => $value) {


				// if($value["id"] != 1){
				// 	if($value["estado"] == 0){
				// 		$estado = "<button class='btn btn-dark btn-sm btnActivar' estadoAdmin='1' idAdmin='".$value["id"]."'>Desactivado</button>";
				// 	}else{
				// 		$estado = "<button class='btn btn-info btn-sm btnActivar' estadoAdmin='0' idAdmin='".$value["id"]."'>Activado</button>";
				// 	}
				// }else{
				// 	$estado = "<button class='btn btn-info btn-sm'>Activado</button>";
				// }
			$acciones = "<div class='btn-group d-flex justify-content-arrow'><button class='btn btn-outline-warning btn-sm editarAdministrador mx-2' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["idTipos"]."'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-outline-danger btn-sm eliminarAdministrador mx-2' idAdministrador='".$value["idTipos"]."'><i class='fas fa-trash-alt'></i></button></div>";
			
			
			$datosJson .='[
					      "'.$value['idTipos'].'",
					      "'.$value['descripcion1'].'",
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



