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

		$respuesta = TablasControlador::ctrTraerDatosPP('politicas', null, $token);
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
					$estado = "<button class='btn btn-outline-dark btn-sm btnActivar-pp' estadoPp='1' idPp='".$value["idPoliticas"]."'>Desactivado</button>";
				}else{
					$estado = "<button class='btn btn-dark btn-sm btnActivar-pp' estadoPp='0' idPp='".$value["idPoliticas"]."'>Activado</button>";
				}
				$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm editarPp mx-2' data-toggle='modal' data-target='#editarAdministrador' idPp='".$value["idPoliticas"]."'><i class='fas fa-pencil-alt'></i></button></div>";
				$datosJson .='[
						"'.$value["idPoliticas"].'",
						"'.$value["orden"].'",
						"'.$value['titulo1'].'",
						"'.$value['parrafo1'].'",
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



