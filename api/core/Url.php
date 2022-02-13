<?php

include_once( dirname(__FILE__) . '/../helpers/cadenaUrl.php');

/**
* Ayuda a construir cualquier URL
* Usa las plantillas definidas en api/config/url.php
* Tiene definido un alias, url(), para usarla más facilmente.
*
* @example Sección estática en idioma actual
*  	url('contacto')
*
* @example Sección estática en otro idioma (ej: inglés)
*  	url('contacto', array(), 'en')
*
* @example Sección dinámica en idioma actual
*  	url('novedad', array('id' => 3, 'titulo' => 'Título de la novedad'))
*
* @example Sección dinámica en otro idioma (ej: inglés)
*  	url('novedad', array('id' => 3, 'titulo' => 'Título de la novedad'), 'es')
*
*/
Class Url{

	static private $datos = array();
	static private $query_string = array();

	/**
	* Construye la URL de una sección
	*
	* @param string $seccion Nombre de la sección. Es el que se define al principio de cada 
	* 	archivo con la constante SECCION.
	*
	* @param mixed $datos Seon los datos necesarios para construir la URL. Van a reemplazar todos 
	* 	los valores que se definieron en api/config/url.php entre llaves. Ej: {id}
	*
	* @param string $idioma El idioma de la URL. Por defecto es el idioma actual.
	*
	* @param bool $absoluta Define si queremos una URL absoluta o relativa
	*/
	static public function seccion($seccion, $datos = array(), $idioma = IDIOMA, $absoluta = true){

		$datos = !is_array($datos) ? (array) $datos : $datos;
		$plantillas = (array) Config::obtener('urls');

		// Cargo el plantilla o uso el nombre de la sección como plantilla
		if(! array_key_exists($seccion, $plantillas)){
			$plantillas[ $seccion ] = str_replace('_','-', $seccion);
		}

		// Reemplazo en el plantilla de la URL los datos pasados
		$url_seccion = $plantillas[ $seccion ];
		preg_match_all("/{(.*?)}/", $url_seccion, $coicidencias);
		foreach($coicidencias[1] as $key){
			if(! array_key_exists($key, $datos)){
				trigger_error('Url: El índice "'.$key.'" no está definido.');
				debug_print_backtrace();
				break;
			}
			
			$url_seccion = str_replace('{'.$key.'}', cadenaUrl($datos[$key]), $url_seccion);
		}

		// Si tiene definida las versiones en varios idiomas dejo solo la actual
		preg_match_all("/\((.*?)\)/", $url_seccion, $coicidencias);
		foreach($coicidencias[1] as $keys){
			foreach(explode('|', $keys) as $key){
				if(stripos($key, $idioma.':') !== false){
					 $url_seccion = str_replace('('.$keys.')', substr($key, 3), $url_seccion);
				}
			}
		}

		// Si está habilitado el idioma agrego el código del idioma al principio
		if( Idioma::deteccionHabilitada() ){
			$url_seccion = $idioma.'/' . $url_seccion;
		}

		if($absoluta){
			$url_seccion = BASE_URL . $url_seccion;
		}

		return $url_seccion;
	}

	/**
	* Guarda los datos necesarios para crearla URL de la sección actual
	* Todas las URL dinámicas necesitan algún dato para poder crearlas. Este método permite cargar esos datos.
	* Habría que llamarlo en la sección de configuración de cada página.
	* @param string $seccion Nombre de la sección. Es el que se define al principio de cada
	*/
	static public function cargarDatosUrlSeccionActual($datos = array()){
		Url::$datos = is_array($datos) ? $datos : (array) $datos;
	}

	/**
	* Agrega una query string a la URL actual
	* @param string $seccion Nombre de la sección. Es el que se define al principio de cada
	*/
	static public function queryStringSeccionActual($datos = array()){
		Url::$query_string = is_array($datos) ? $datos : (array) $datos;
	}

	/**
	* Devuelve la URL actual
	* @param string $idioma Alguno de los idiomas disponibles
	* @param bool $absoluta Si al URL es absoluta o relativa
	*/
	static public function actual($idioma = IDIOMA, $absoluta = true){
		return Url::seccion(SECCION, Url::$datos, $idioma, $absoluta).
			(Url::$query_string ? '?'.http_build_query(Url::$query_string) : '');
	}
}