<?php

require_once "../controladores/tablas.controlador.php";
require_once "../modelos/tablas.modelo.php";

class TablaBanner{
	/*=============================================
	Tabla Banner
	=============================================*/ 
	public function mostrarTabla(){
		if(isset($_SESSION["tokenBack"])) {
			$token = json_decode($_SESSION["tokenBack"], true);
		} else {
			$token = null;
		}

		$respuesta = TablasControlador::crtMostrarTablas('banners', null, $token);
        $banner = json_decode($respuesta, true);

		if(count($banner)== 0){
 			$datosJson = '{"data": []}';
			echo $datosJson;
			return;
 		}

 		$datosJson = '{
	 	"data": [ ';

         foreach ($banner as $key => $value) {
			$imagen = "<img width='100px' src='".$value["ruta"]."' class='img-fluid'>";
			// activa/desactiva
			if($value["activo"] == 0){
				$estado = "<div class='text-center'><button class='btn btn-outline-dark btn-sm btnActivar-banner' estado='1' idBanner='".$value["idBanners"]."'>Desactivado</button></div>";
			}else{
				$estado = "<div class='text-center'><button class='btn btn-dark btn-sm btnActivar-banner' estado='0' idBanner='".$value["idBanners"]."'>Activado</button></div>";
			}
			/*=============================================
			ACCIONES
			=============================================*/
			$acciones = "<div class='btn-group d-flex justify-content-arrow'><button class='btn btn-dark btn-sm editarBanner mx-2' data-bs-toggle='modal' data-bs-target='#editarBanner' idBanner='".$value["idBanners"]."'><i class='far fa-image text-white'></i></button><button class='btn btn-dark btn-sm editarBannerTexto mx-2' idBanner='".$value["idBanners"]."'><i class='fas fa-text-height text-white'></i></i></button><button class='btn btn-dark btn-sm eliminarBanner mx-2' idBanner='".$value["idBanners"]."' rutaBanner='".$value["ruta"]."'><i class='fas fa-trash-alt'></i></button></div>";	
			$datosJson.= '[
					"'.$value["idBanners"].'",
					"'.$imagen.'",
					"'.$value["orden"].'",
					"'.$value["titulo1"].'",
					"'.$value["subtitulo1"].'",
					"'.$value["link"].'",
					"'.$estado.'",
					"'.$acciones.'"
				],';
		}

		$datosJson = substr($datosJson, 0, -1);
		$datosJson.=  ']
		}';
		echo $datosJson;
	}
}

/*=============================================
Tabla Banner
=============================================*/ 
$tabla = new TablaBanner();
$tabla -> mostrarTabla();
