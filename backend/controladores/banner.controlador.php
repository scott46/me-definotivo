<?php


class ControladorBanner{

	/*=============================================
	Mostrar Banner
	=============================================*/
	static public function ctrMostrarBanner($item, $valor, $token){
		$respuesta = ModeloBanner::mdlMostrarBanner($item, $valor, $token);
		return $respuesta;
	}

	/*=============================================
	Registro de Banner
	=============================================*/
	public function ctrRegistroBanner($token){
        
		if(isset($_FILES["subirBanner"]["tmp_name"]) && !empty($_FILES["subirBanner"]["tmp_name"])){
			list($ancho, $alto) = getimagesize($_FILES["subirBanner"]["tmp_name"]);
			$nuevoAncho = 1440;
			$nuevoAlto = 800;
			/*=============================================
			CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL BANNER
			=============================================*/
			$directorio = "vistas/img/banner";		
			/*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/
			if($_FILES["subirBanner"]["type"] == "image/jpeg"){
				$aleatorio = mt_rand(100,999);
				$ruta = $directorio."/".$aleatorio.".jpg";
				$origen = imagecreatefromjpeg($_FILES["subirBanner"]["tmp_name"]);
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagejpeg($destino, $ruta);	
			}

			else if($_FILES["subirBanner"]["type"] == "image/png"){
				$aleatorio = mt_rand(100,999);
				$ruta = $directorio."/".$aleatorio.".png";
				$origen = imagecreatefrompng($_FILES["subirBanner"]["tmp_name"]);						
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				imagealphablending($destino, FALSE);
				imagesavealpha($destino, TRUE);
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagepng($destino, $ruta);
			}else{

				echo'<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡CORREGIR!",
                        text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
					}).then(function(result){
                        if(result.value){   
                            history.back();
                            } 
					});
				</script>';
				return;
			}

			$tabla = "banners/add";
            $dato = array(
                'ruta' => $ruta,
                'link' => $_POST["bannerLink"],
                'orden' => $_POST["bannerOrden"],
                'activo' => 1,
				"titulo1" => $_POST["bannertitulo1"],
				"titulo2" => $_POST["bannertitulo2"],
				"subtitulo1" => $_POST["bannersubtitulo1"],
				"subtitulo2" => $_POST["bannersubtitulo2"],
				"alineacion" => "center"
            );

			$respuesta = ModeloBanner::mdlRegistroBanner($tabla, $dato, $token);
            $arayRespuesta = json_decode($respuesta, true);
			if($arayRespuesta['result'] == "Added"){
				echo '<script>
                    Swal.fire({
						icon:"success",
					  	title: "OK!",
					  	text: "¡La imagen del banner ha sido creada exitosamente!",
					  	showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
                        if(result.value){   
                            window.location="inicio";
                        } 
					});
				</script>';
			}	
		}
	}

	/*=============================================
	Editar Banner
	=============================================*/
	public function ctrEditarBanner($token){
		if(isset($_POST["idBanner"])){
			if(isset($_FILES["editarBanner"]["tmp_name"]) && !empty($_FILES["editarBanner"]["tmp_name"])){				
				list($ancho, $alto) = getimagesize($_FILES["editarBanner"]["tmp_name"]);
				$nuevoAncho = 1440;
				$nuevoAlto = 800;
				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL BANNER
				=============================================*/
				$directorio = "vistas/img/banner";
				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/
				if(isset($_POST["bannerActual"])){
					unlink($_POST["bannerActual"]);
				}
				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/
				if($_FILES["editarBanner"]["type"] == "image/jpeg"){
					$aleatorio = mt_rand(100,999);
					$ruta = $directorio."/".$aleatorio.".jpg";
					$origen = imagecreatefromjpeg($_FILES["editarBanner"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);	
				}

				else if($_FILES["editarBanner"]["type"] == "image/png"){
					$aleatorio = mt_rand(100,999);
					$ruta = $directorio."/".$aleatorio.".png";
					$origen = imagecreatefrompng($_FILES["editarBanner"]["tmp_name"]);						
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				}else{
					echo'<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡CORREGIR!",
                            text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
						}).then(function(result){
                            if(result.value){   
                                history.back();
                            } 
						});
					</script>';
					return;
				}

				$tabla = "banner";
				$id = $_POST["idBanner"];
				$respuesta = ModeloBanner::mdlEditarBanner($tabla, $id, $ruta, $token);
				if($respuesta == "ok"){
					echo '<script>
                        Swal.fire({
							icon:"success",
						  	title: "¡CORRECTO!",
						  	text: "¡La imagen del banner ha sido actualizada!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						})
					</script>';
				}
			}		
		}	
	}

	/*=============================================
	Eliminar Banner
	=============================================*/
	static public function ctrEliminarBanner($id, $ruta, $token){
		unlink("../".$ruta);
		$tabla = "banners/delete/".$id;
		$respuesta = ModeloBanner::mdlEliminarBanner($tabla, $id, $token);
        if($respuesta == "Deleted"){
            return 'ok';
        }
	}

	/*=============================================
	editar texto banner
	=============================================*/
	static public function ctrEditaTextoBanner($data, $token){
		$tabla = 'banners/modify/'.$data['idBanners'];
		$respuesta = ModeloBanner::mdlRegistroBanner($tabla, $data, $token);
		return $respuesta;
	}
}