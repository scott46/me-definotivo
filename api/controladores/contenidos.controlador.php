<?php




Class ControladorContenidos{

	static public function ctrMostrarContenidos($idioma, $valor, $token){ 
		$link = 'contenidoelemento';
		$respuesta = modeloContenidos::mdlMostrarDatos($link, $idioma, $valor, $token);
		return $respuesta;	
	}


	static public function ctrMostrarTodoDeUnContenido($idioma, $valor, $token){ 
		$link = 'contenidoelemento/'.$idioma.'/'.$valor;
		$respuesta = modeloContenidos::mdlMostrarDatos($link, $token);
		return $respuesta;	
	}

	///////  Métodos de backend  ///////
	static public function ctrMostrarTodoDeUnContenidoBack($valor){ 
		$link = 'contenidos/id/'.$valor;
		$respuesta = modeloContenidos::mdlMostrarDatos($link, 'admin');
		return $respuesta;	
	}
	static public function ctrMostrarElementosDeUnContenidosBack($valor){ 
		$link = 'elementos/idcontenido/'.$valor;
		$respuesta = modeloContenidos::mdlMostrarDatos($link, 'admin');
		return $respuesta;	
	}
	/////  fin Métodos de backend  /////

	static public function ctrMostrarContenidosXCategoria($idioma,$valor){ 
		$link = 'categoriacontenido/id'.$idioma.'/'.$valor;
		$token = 'admin';
		$respuesta = modeloContenidos::mdlMostrarDatos($link, $token);
		return $respuesta;	
	}
	static public function ctrMostrarElementosDeUnContenidos($idioma,$valor, $token){ 
		$link = 'contenidoelemento/'.$idioma.'/'.$valor;
		$respuesta = modeloContenidos::mdlMostrarDatos($link, $token);
		return $respuesta;	
	}

	static public function ctrMostrarUnElemento($valor, $token){ 
		$link = 'elementos/id/'.$valor;
		$respuesta = modeloContenidos::mdlMostrarDatos($link, $token);
		return $respuesta;	
	}

	static public function ctrBuscoArchivo($valor, $token){ 
		$link = 'elementos/getelement/'.$valor;
		$respuesta = modeloContenidos::mdlMostrarArchivos($link, $token);
		return $respuesta;	
	}

	static public function ctrMostrarTipos($valor){ 
		$link = 'tipos';
		$token = 'admin';
		$respuesta = modeloContenidos::mdlMostrarDatos($link, $token);
		return $respuesta;	
	}



}