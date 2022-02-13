<?php 


require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";
require_once "../controladores/experiencia.controlador.php";
require_once "../modelos/experiencia.modelo.php";

session_start();


class TablaCategorias{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	
	public function mostrarTabla(){
		if(isset($_SESSION["tokenBack"])) {
			$token = 'admin';
		} else {
			$token = null;
		}
		
		//echo 'categorias';
        // comentarios contenidos
		$respuesta = TablasControlador::crtMostrarTablas('resenas/contenidos', null, $token);
		$arrayrta = json_decode($respuesta, true);

		// comentarios Elementos
		$respuestaEl = TablasControlador::crtMostrarTablas('resenas/elementos', null, $token);
		$arrayrtaEl = json_decode($respuestaEl, true);
        
        // categorias
        $respuestaContenidos = TablasControlador::crtMostrarTablas('contenidos', null, $token);
		$arrayrtaContenidos = json_decode($respuestaContenidos, true);

        // Elementos
        //$respuestaElmentos = TablasControlador::crtMostrarTablas('elementos', null, $token);
		//$arrayrtaElementos = json_decode($respuestaElmentos, true);

		if(count($arrayrta) <= 0){
			$datosJson = '{"data":[]}';
			echo $datosJson;
			return;

		} else {
			$datosJson = '{
			"data":[';

			foreach ($arrayrta as $key => $value) {
				// activa/desactiva
                foreach ($arrayrtaContenidos as $contenido) {
					if($value['contenidoId'] == $contenido['idContenidos']) {
						$nombreContenido = ucfirst(strtolower(substr($contenido['titulo1'], 0, 30).' ...'));
					}
				}
				$id = " <div class='text-center'>".$value['idResenaContenidos']."</div>";
				if($value["activo"] == 0){
					$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-comentario' estadoComentarior='1' data-tipo='contenidos' idComentario='".$value['idResenaContenidos']."'>Desactivado</button></div>";
				}else{
					$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-comentario' estadoComentarior='0' data-tipo='contenidos' idComentario='".$value['idResenaContenidos']."'>Activado</button></div>";
				}
				// acciones
				$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm borraComentario mx-2' data-tipo='contenidos' idComentario='".$value['idResenaContenidos']."'><i class='far fa-trash-alt'></i></button></div>";

				$datosJson .='[
                            "'.$id.'",
							"Contenido",
							"'.$nombreContenido.'",
							"'.$value['resena1'].'",
                            "'.$value['email'].'",
							"'.$value['usuario'].'",
                            "'.$estado.'",
							"'.$acciones.'"
							],';
			}


			if($arrayrtaEl != NULL){
				foreach ($arrayrtaEl as $key => $value) {
					// activa/desactiva
					$respuesta = ControladorExperiencia::ctrTraeUnElemento($value["elementoId"], $token);
					$array = json_decode($respuesta, true);
					$nombre = $array[0]['titulo1'];

					if($value["activo"] == 0){
						$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-comentario' estadoComentarior='1' data-tipo='elementos' idComentario='".$value["idResenaElementos"]."'>Desactivado</button></div>";
					}else{
						$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-comentario' estadoComentarior='0' data-tipo='elementos' idComentario='".$value["idResenaElementos"]."'>Activado</button></div>";
					}
					// acciones
					$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm borraComentario mx-2' data-tipo='elementos' idComentario='".$value["idResenaElementos"]."'><i class='far fa-trash-alt'></i></button></div>";
	                $id = " <div class='text-center'>".$value['idResenaElementos']."</div>";

					$datosJson .='[
	                            "'.$id.'",
								"Elemento",
								"'.$nombre.'",
								"'.$value['resena1'].'",
								"'.$value['email'].'",
	                            "'.$value['usuario'].'",
	                            "'.$estado.'",
								"'.$acciones.'"
								],';
				}
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



