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

		$respuesta = TablasControlador::crtMostrarTablas('operaciones/all', null, $token);
		$arrayrta = json_decode($respuesta, true);

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
				// if($value["activo"] == 0){
				// 	$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-autor' estadoAutor='1' idAutores='".$value["idAutores"]."'>Desactivado</button></div>";
				// }else{
				// 	$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-autor' estadoAutor='0' idAutores='".$value["idAutores"]."'>Activado</button></div>";
				// }
				// acciones
				// $acciones = "<div class='text-center'><button class='btn btn-dark btn-sm editarAutor mx-2' idAutores='".$value["idAutores"]."'><i class='fas fa-pencil-alt'></i></button></div>";
    //             $id = " <div class='text-center'>".$value['idAutores']."</div>";

				$datosJson .='[
                            "'.$value['nroOperacion'].'",
                            "'.$value['contenidoId'].'",
							"'.$value['fecha'].'",
							"'.$value['proveedor'].'",
							"'.$value['usuarioId'].'",
							"'.$value['tipoMoneda'].' '.$value['monto'].'"
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



