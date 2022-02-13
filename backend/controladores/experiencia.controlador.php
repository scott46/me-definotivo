	<?php

class ControladorExperiencia{

	/*=============================================
	Método que incluye la plantilla
	=============================================*/
	static public function ctrSubirExperiencia($experiencia, $token){
		$imagen = $experiencia['imagen'];
		$directorio = 'vistas/img/preview/1';
		$nombrearchivo = 'me-preview-'.date("Y-m-d").random_int(100, 999);
		$item = 'elementos/add';
		
		// creamos la imagen
		if($imagen != ''){
			$respuesta = File::subirImagen($directorio, $imagen, $nombrearchivo);
			if($respuesta['resultado'] === 'ok') {
				$experiencia['previewRuta'] = $respuesta['ruta'];
				unset($experiencia['video']);
				unset($experiencia['imagen']);
				// var_dump($experiencia);
				$guardaDatos =  ModeloExperiencia::mdlGuardaDatosExperiencia($item, $experiencia, $token); 
				$array = json_decode($guardaDatos, true);
				if($array['result'] === 'Added'){
					echo 'id-'.$array['id'];
				} else {
					echo 'error';
				}
			} else {
				echo 'intente nuevamente';
			}
		} else {
			$experiencia['previewRuta'] = '';
			unset($experiencia['video']);
			unset($experiencia['imagen']);
			// var_dump($experiencia);
			$guardaDatos =  ModeloExperiencia::mdlGuardaDatosExperiencia($item, $experiencia, $token); 
			$array = json_decode($guardaDatos, true);
			if($array['result'] === 'Added'){
				echo 'id-'.$array['id'];
			} else {
				echo 'error';
			}
		}
	}	


	static public function ctrSubirContenido($contenido, $token){
		$imagen = $contenido['imagen'];
		$directorio = 'vistas/img/preview/1';
		$nombrearchivo = 'me-preview-'.date("Y-m-d").random_int(100, 999);
		$item = 'contenidos/add';
		// creamos la imagen
		$respuesta = File::subirImagen($directorio, $imagen, $nombrearchivo);
		if($respuesta['resultado'] === 'ok') {
			$contenido['previewRuta'] = $respuesta['ruta'];
			unset($contenido['imagen']);
			// var_dump($experiencia);
			$guardaDatos =  ModeloExperiencia::mdlGuardaDatosContenido($item, $contenido, $token); 
			var_dump($guardaDatos);

			$array = json_decode($guardaDatos, true);
			if($array['result'] === 'Added'){
				echo 'id-'.$array['id'];
			} else {
				echo 'error';
			}
		} else {
			echo 'intente nuevamente';
		}
	}	


	static public function ctrSubirCategoria($contenido, $token){
		$imagen = $contenido['imagen'];
		$directorio = 'vistas/img/categoria'.$contenido['idCategorias'];
		$nombrearchivo = 'me-categoria-'.$contenido['idCategorias'].'-'.date("Y-m-d").random_int(100, 999);
		$item = 'categorias/add';
		// creamos la imagen
		$respuesta = File::subirImagen($directorio, $imagen, $nombrearchivo);
		if($respuesta['resultado'] === 'ok') {
			$contenido['rutaBackground'] = $respuesta['ruta'];
			unset($contenido['imagen']);
			//var_dump($contenido);
			$guardaDatos =  ModeloExperiencia::mdlGuardaDatosContenido($item, $contenido, $token); 
			var_dump($guardaDatos);
			$array = json_decode($guardaDatos, true);
			if($array['result'] === 'Added'){
				echo 'id-'.$array['id'];
			} else {
				echo 'error';
			}
		} else {
			echo 'intente nuevamente';
		}
	}	





	/******************************* 
	 CONTENIDO
	********************************/
    static public function ctrSubirExperienciaFile($item, $valor, $token) {
		$respuesta = ModeloExperiencia::mdlSubirVideo ($item, $valor, $token);
		return $respuesta;

    }
    static public function ctrTraeVideo($valor, $token) {
		$respuesta = ModeloExperiencia::mdlTraeVideo ($valor, $token);
		return $respuesta;

    }
    static public function ctrTraeTodoContenido($valor, $token) {
		$respuesta = ModeloExperiencia::mdlTraeTodoContenido ($valor, $token);
		return $respuesta;

    }
    static public function ctrTraeUnContenido($valor, $token) {
		$respuesta = ModeloExperiencia::mdlTraeUnContenido($valor, $token);
		return $respuesta;

    }
	//activa / desactiva
    static public function ctrActivaDesactivaContenido($activaContenido, $token) {
		//var_dump($categoria);
		$id = $activaContenido['idContenido'];
		if($activaContenido['nuevoEstado'] == 0) {
			$item = 'contenidos/disable';
		} else {
			$item = 'contenidos/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }
	// modifica contenido
    static public function ctrModificaContenido($categoria, $token) {
		//var_dump($categoria);
		$item = 'contenidos/modify';
		$id = $categoria['idContenidos'];
		unset($categoria['idCategorias']);
		//unset($categoria['activo']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $categoria, $id, $token);
		return $respuesta;
    }


	/******************************* 
	 ELEMENTO
	********************************/
    static public function ctrTraeUnElemento($valor, $token) {
		$respuesta = ModeloExperiencia::mdlTraeUnElemento($valor, $token);
		return $respuesta;

    }
	//activa / desactiva
    static public function ctrActivaDesactivaElemento($activaContenido, $token) {
		//var_dump($categoria);
		$id = $activaContenido['idElementos'];
		if($activaContenido['nuevoEstado'] == 0) {
			$item = 'elementos/disable';
		} else {
			$item = 'elementos/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }
	// modifica contenido
    static public function ctrModificaElemento($categoria, $token) {
		//var_dump($categoria);
		$item = 'elementos/modify';
		$id = $categoria['idElementos'];
		unset($categoria['idElementos']);
		unset($categoria['activo']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $categoria, $id, $token);
		return $respuesta;
    }



	/******************************* 
	 CATEGORIAS
	********************************/
	//Ver una categorias
    static public function ctrTraeTodoCategoria($valor, $token) {
		$item = 'categorias';
		$respuesta = ModeloExperiencia::mdlTraerDatos ($item, $valor, $token);
		return $respuesta;
    }
	// Modifica categoria
    static public function ctrModificaCategoria($categoria, $token) {
		//var_dump($categoria);
		$item = 'categorias/modify';
		$id = $categoria['idCategorias'];
		unset($categoria['idCategorias']);
		unset($categoria['activo']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $categoria, $id, $token);
		return $respuesta;
    }
	//activa / descativa
    static public function ctrActivaDesactivaCategoria($activaCategoria, $token) {
		//var_dump($categoria);
		$id = $activaCategoria['idCategoria'];
		if($activaCategoria['nuevoEstado'] == 0) {
			$item = 'categorias/disable';
		} else {
			$item = 'categorias/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }
	//activa AE
    static public function ctrActivaDesactivaAE($activaCategoria, $token) {
		//var_dump($categoria);
		$id = $activaCategoria['idCategoria'];
		if($activaCategoria['estadoCheck'] == 0) {
			$item = 'categorias/disableae';
		} else {
			$item = 'categorias/enableae';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }





	/******************************* 
	 FAQ
	********************************/
	//trae faq
    static public function ctrTraeUnaFaq($idFaq, $token){
		$respuesta = ModeloExperiencia::mdlTraeUnaFaq($idFaq, $token);
		return $respuesta;
    }
	// agrega faq
    static public function ctrAddFaq($addFaq, $token){
		$link = 'faq/add';
		$respuesta = ModeloExperiencia::mdlAddComponente($link, $addFaq, $token);
		return $respuesta;
    }
	// Edita faq
    static public function ctrModificaFaq($modiFaq, $token){
		$item = 'faq/modify';
		$id = $modiFaq['idFaqs'];
		unset($modiFaq['idFaqs']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $modiFaq, $id, $token);
		return $respuesta;
    }
	// activa / desactiva
    static public function ctrActivaDesactivaFaq($activaCategoria, $token) {
		//var_dump($categoria);
		$id = $activaCategoria['idFaq'];
		if($activaCategoria['nuevoEstado'] == 0) {
			$item = 'faq/disable';
		} else {
			$item = 'faq/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }


	/******************************* 
	 AUTORES
	********************************/
	// agrega autor
	static public function ctrAddAutor($addAutor, $token){
		$link = 'autores/add';
		$respuesta = ModeloExperiencia::mdlAddComponente($link, $addAutor, $token);
		return $respuesta;
	}
	// busco Todos los autores
	static public function ctrBuscoAutores($addAutor, $token){
		$link = 'autores';
		$respuesta = ModeloExperiencia::mdlBuscoAutores($link, $addAutor, $token);
		return $respuesta;
	}
	// activa / desactiva
    static public function ctrActivaDesactivaAutor($activaAutor, $token) {
		//var_dump($categoria);
		$id = $activaAutor['idAutores'];
		if($activaAutor['nuevoEstado'] == 0) {
			$item = 'autores/disable';
		} else {
			$item = 'autores/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }
	// edit autor
	static public function ctrModificaAutor($modiFaq, $token){
		$item = 'autores/modify';
		$id = $modiFaq['idAutores'];
		unset($modiFaq['idAutores']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $modiFaq, $id, $token);
		return $respuesta;
    }


	/******************************* 
	 BANNER
	********************************/
    static public function ctrActivaDesactivaBanner($activaAutor, $token) {
		//var_dump($categoria);
		$id = $activaAutor['idBanner'];
		if($activaAutor['estado'] == 0) {
			$item = 'banners/disable';
		} else {
			$item = 'banners/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }


	/******************************* 
	 COMENTARIOS
	********************************/
	static public function ctrActivaDesactivaComentario($activaComentario, $token) {
		//var_dump($activaComentario);
		$id = $activaComentario['idComentario'];
		$tipo = $activaComentario['tipoComentario'];
		if($activaComentario['nuevoEstado'] == 0) {
			$item = 'resenas/'.$tipo.'/disable';
		} else {
			$item = 'resenas/'.$tipo.'/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }
	static public function ctrborraComentario($borraComentario,$token) { 
		$idComentario = $borraComentario['idComentario'];
		$tabla = $borraComentario['tabla'];
		$link = 'resenas/'.$tabla.'/delete'.'/'.$idComentario;
		$respuesta = ModeloExperiencia::mdlborraComentario($link, $token);
		return $respuesta;
	}

	/******************************* 
	 USUARIOS
	********************************/
	// activa / desactiva
    static public function ctrActivaDesactivaUser($activaAutor, $token) {
		//var_dump($categoria);
		$id = $activaAutor['idUsuarios'];
		if($activaAutor['estado'] == 0) {
			$item = 'usuarios/disable';
		} else {
			$item = 'usuarios/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }

	/******************************* 
	 TYC
	********************************/
	//trae TYC
    static public function ctrTraeUnaTyc($idTyc, $token){
    	$valor = 'tyc/';
		$respuesta = ModeloExperiencia::mdlVerComponente($valor, $token);
		$array = json_decode($respuesta, true);
		$newResult = [];
		foreach ($array as $value) {
			if($value['idTyc'] == $idTyc){
				array_push($newResult, $value);
			}
		}
		return json_encode($newResult);
    }
	// agrega TYC
    static public function ctrAddTyc($addTyc, $token){
		$link = 'tyc/add';
		$respuesta = ModeloExperiencia::mdlAddComponente($link, $addTyc, $token);
		return $respuesta;
    }
	// Edita faq
    static public function ctrModificaTyc($modiTyc, $token){
		$id = $modiTyc['idTyc'];
		$item = 'tyc/modify';
		unset($modiTyc['idTyc']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $modiTyc, $id, $token);
		return $respuesta;
    }
	// activa / desactiva
    static public function ctrActivaDesactivaTyc($activaCategoria, $token) {
		//var_dump($categoria);
		$id = $activaCategoria['idTyc'];
		if($activaCategoria['nuevoEstado'] == 0) {
			$item = 'tyc/disable';
		} else {
			$item = 'tyc/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }


	/******************************* 
	 PP
	********************************/
	//trae TYC
    static public function ctrTraeUnaPp($idPp, $token){
    	$valor = 'politicas/';
		$respuesta = ModeloExperiencia::mdlVerComponente($valor, $token);
		$array = json_decode($respuesta, true);
		$newResult = [];
		foreach ($array as $value) {
			if($value['idPoliticas'] == $idPp){
				array_push($newResult, $value);
			}
		}
		return json_encode($newResult);
    }
	// agrega TYC
    static public function ctrAddPp($addPp, $token){
		$link = 'politicas/add';
		$respuesta = ModeloExperiencia::mdlAddComponente($link, $addPp, $token);
		return $respuesta;
    }
	// Edita faq
    static public function ctrModificaPp($ppModifica, $token){
		$id = $ppModifica['idPolitica'];
		$item = 'politicas/modify';
		unset($ppModifica['idPolitica']);
		$respuesta = ModeloExperiencia::mdlModificaComponentes ($item, $ppModifica, $id, $token);
		return $respuesta;
    }
	// activa / desactiva
    static public function ctrActivaDesactivaPp($activaCategoria, $token) {
		//var_dump($categoria);
		$id = $activaCategoria['idPp'];
		if($activaCategoria['nuevoEstado'] == 0) {
			$item = 'politicas/disable';
		} else {
			$item = 'politicas/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }



    //giftcard
    static public function ctrActivaDesactivaGift($activaGift, $token) {
		//var_dump($categoria);
		$id = $activaGift['idGiftcards'];
		if($activaGift['nuevoEstado'] == 0) {
			$item = 'giftcard/disable';
		} else {
			$item = 'giftcard/enable';
		}
		$respuesta = ModeloExperiencia::mdlActivaDesactivaComponentes ($item, $id, $token);
		return $respuesta;
    }

    static public function ctrCambiaFree($cambiaFree,$token) {
    	$id = $cambiaFree['idElemento'];
    	$nuevoEstado = $cambiaFree['esPreview'];
    	$item = 'elementos/preview/';
    	$esPreview = array(
    		'esPreview' => $nuevoEstado
    	);
		$respuesta = ModeloExperiencia::mdlCambiaFree ($esPreview,$token, $item, $id);
		return $respuesta;
    }


}