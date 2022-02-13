<?php 


require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";

session_start();


class TablaComentaiosXTema{
	/*=============================================
	Tabla Tags
	=============================================*/ 
	
	public function mostrarTabla(){
		if(isset($_SESSION["tokenBack"])) {
			$token = 'admin';
		} else {
			$token = null;
		}
        if(isset($_POST['tipoConsulta'])){
            $consulta = $_POST['tipoConsulta'];
        }
		
		//echo 'categorias';
        // comentarios contenidos
		$respuesta = TablasControlador::crtMostrarTablas('resenas/'.$consulta, null, $token);
		$arrayrta = json_decode($respuesta, true);

		// comentarios Elementos
		// $respuestaEl = TablasControlador::crtMostrarTablas('resenas/contenidos', null, $token);
		// $arrayrtaEl = json_decode($respuestaEl, true);
        
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
				if(isset($value["idResenaContenidos"])){
					$id=$value["idResenaContenidos"];
					$tipo = 'Contenido';
				} else {
					$id=$value["idResenaElementos"];
					$tipo = 'Elemento';
				}

				// activa/desactiva
                foreach ($arrayrtaContenidos as $contenido) {
					if($value['contenidoId'] == $contenido['idContenidos']) {
						$nombreContenido = ucfirst(strtolower(substr($contenido['titulo1'], 0, 30).' ...'));
					}
				}
				if($value["activo"] == 0){
					$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-comentario'  data-tipo=".$consulta." estadoComentarior='1' idComentario='".$id."'>Desactivado</button></div>";
				}else{
					$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-comentario'  data-tipo=".$consulta." estadoComentarior='0' idComentario='".$id."'>Activado</button></div>";
				}
				// acciones
				$acciones = "<div class='text-center'><button class='btn btn-dark btn-sm borraComentario mx-2'  data-tipo=".$consulta." idComentario='".$id."'><i class='far fa-trash-alt'></i></button></div>";
                $idText = " <div class='text-center'>".$id."</div>";

				$datosJson .='[
                            "'.$idText.'",
							"'.$tipo.'",
							"'.$nombreContenido.'",
							"'.$value['resena1'].'",
							"'.$value['email'].'",
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
$tabla = new TablaComentaiosXTema();
$tabla -> mostrarTabla();



