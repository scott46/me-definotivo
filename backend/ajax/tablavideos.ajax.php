<?php 


require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";

class TablaCategorias{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	public function mostrarTabla(){
		$respuesta = TablasControlador::crtMostrarTablas('contenidos', null);
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

			if($value['activo'] === 1) {
				$iconEstado = "<button class='btn btn-info btn-sm editarAdministrador mx-4' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["idTipoContenidos"]."'>Activo</button>";
			} else {
				$iconEstado = "<button class='btn btn-info btn-sm editarAdministrador mx-4' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["idTipoContenidos"]."'>Oculto</button>";
			}

			$acciones = "<div class='btn-group d-flex justify-content-arrow'><button class='btn btn-outline-secondary btn-sm verVideo mx-2' idContenidos='".$value["idContenidos"]."'><i class='fas fa-play'></i></button><button class='btn btn-outline-warning btn-sm editarAdministrador mx-2' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["idContenidos"]."'><i class='fas fa-pencil-alt'></i></button><button class='btn btn-outline-danger btn-sm eliminarAdministrador mx-2' idAdministrador='".$value["idContenidos"]."'><i class='fas fa-trash-alt'></i></button></div>";

			$preview = "<img style='width: 90px;height: auto' src='https://reinicia.com.ar/me/nuevo/backend/preview/1/me-preview-2021-06-07%2508%3A53%3A42.jpg' alt=".$value["titulo1"].">";

			
			$datosJson .='[
					      "'.$preview.'",
					      "'.$value['idContenidos'].'",
					      "'.$value['titulo1'].'",
  					      "'.$value['descripcion1'].'",
					      "$ '.$value['precioPesos'].'",
					      "U$D '.$value['precioDolares'].'",
					      "'.$iconEstado.'",
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



