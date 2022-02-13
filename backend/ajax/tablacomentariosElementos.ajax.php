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
			$token = 'admin';
		} else {
			$token = null;
		}
		
		//echo 'categorias';
        //comentarios
		$respuesta = TablasControlador::crtMostrarTablas('resenas/elementos', null, $token);
		$arrayrta = json_decode($respuesta, true);
        
        // categorias
        $respuestaContenidos = TablasControlador::crtMostrarTablas('elementos', null, $token);
		$arrayrtaContenidos = json_decode($respuestaContenidos, true);



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

                foreach ($arrayrtaContenidos as $contenido) {
					if($value['contenidoId'] == $contenido['idContenidos']) {
						$nombreContenido = ucfirst(strtolower(substr($contenido['titulo1'], 0, 30).' ...'));
					}
				}

				if($value["activo"] == 0){
					$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-autor' estadoAutor='1' idAutores='".$value["idResenaContenidos"]."'>Desactivado</button></div>";
				}else{
					$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-autor' estadoAutor='0' idAutores='".$value["idResenaContenidos"]."'>Activado</button></div>";
				}
				// acciones
				$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm editarAutor mx-2' idAutores='".$value["idResenaContenidos"]."'><i class='far fa-trash-alt'></i></button></div>";
                $id = " <div class='text-center'>".$value['idResenaContenidos']."</div>";

				$datosJson .='[
                            "'.$id.'",
							"'.$nombreContenido.'",
							"'.$value['resena1'].'",
                            "'.$value['usuario'].'",
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



