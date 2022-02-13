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

		$respuesta = TablasControlador::ctrTraerDatosGC('giftcard', '/all', $token);
		$arrayrta = json_decode($respuesta, true);

		//var_dump($arrayrta);

		//echo count($arrayrta);

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
				if($value["activo"] == 0){
					$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-gift' estadoGiftcard='1' idGiftcards='".$value["idGiftcards"]."'>Desactivado</button></div>";
				}else{
					$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-gift' estadoGiftcard='0' idGiftcards='".$value["idGiftcards"]."'>Activado</button></div>";
				}
				// acciones
				// $acciones = "<div class='text-center'><button class='btn btn-dark btn-sm editarAutor mx-2' idAutores='".$value["idGiftcards"]."'><i class='fas fa-pencil-alt'></i></button></div>";

				$datosJson .='[
							"'.$value['fechaCreacion'].'",
							"'.$value['codigo'].'",
							"'.$value['compradoUsuarioId'].'",
							"'.$value['contenidoId'].'",
							"'.$value['tipoMoneda'].'",
							"'.$value['monto'].'",
							"'.$value['redimidoUsuarioId'].'",
							"'.$estado.'"
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



