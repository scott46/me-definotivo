<?php 


require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";


session_start();

class TablaFaq{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	public function mostrarTabla(){

		//echo 'categorias';
		if(isset($_SESSION["tokenBack"])) {
			$token = $_SESSION["tokenBack"];
		} else {
			$token = null;
		}

		$respuesta = TablasControlador::crtMostrarTablas('faq', null, $token);
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
				if($value["activo"] == 0){
					$estado = "<button class='btn btn-outline-dark btn-sm btnActivar-faq' estadoFaq='1' idFaq='".$value["idFaqs"]."'>Desactivado</button>";
				}else{
					$estado = "<button class='btn btn-dark btn-sm btnActivar-faq' estadoFaq='0' idFaq='".$value["idFaqs"]."'>Activado</button>";
				}
				$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm editarFaq mx-2' data-toggle='modal' data-target='#editarAdministrador' idFaq='".$value["idFaqs"]."'><i class='fas fa-pencil-alt'></i></button></div>";
				$datosJson .='[
						"'.$value["idFaqs"].'",
						"'.$value["orden"].'",
						"'.$value['pregunta1'].'",
						"'.$value['respuesta1'].'",
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
$tabla = new TablaFaq();
$tabla -> mostrarTabla();



