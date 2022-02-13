<?php

/**
* Clase para construir metas para SEO y redes sociales
* Carga las metas desde el archivo de configuración config/metas.php  en donde se definen
* las metas por defecto y las metas para cada sección.
*
*/
class Metas{

	public $seccion;

	public $titulo;
	public $descripcion;
	public $img;

	private static $secciones = array();


	/**
	* Obtengo las metas de una sección
	*/
	public static function obtener($seccion = SECCION, $valores = array()){
		
		if(! array_key_exists($seccion, Metas::$secciones)){
			Metas::construir($seccion, $valores);
		}
		return Metas::$secciones[ $seccion ];
	}


	/**
	* Construyo las metas para una seccion
	*/
	public static function construir($seccion = SECCION, $valores = array()){
		Metas::$secciones[ $seccion ] = new Metas($seccion, $valores);
	}


	/** 
	* Creo el objeto Metas de una sección
	*/
	private function __construct($seccion, $valores){
		$this->seccion = $seccion;
		$this->config = Config::obtener('metas');

		$this->titulo 	 	= $this->generar('titulo', $this->seccion, $valores);
		$this->descripcion 	= $this->generar('descripcion', $this->seccion, $valores);
		$this->img 		 	= $this->generar('img', $this->seccion, $valores);
	}


	/** 
	* Prepara el contenido final de una meta
	* @return Devuelve el valor de la meta
	*/
	private function generar($nombre, $seccion, $valores){

		$valor = $this->obtener_valor($nombre, $seccion, $valores);

		// Construyo la meta a partir de la plantilla y el valor definido para esa sección
		$valor = str_replace('{valor}', $valor, $this->config->plantilla[ $nombre ]);

		return $this->limpiar($valor);
	}


	/** 
	* Obtengo el volor para una meta
	* @return Devuelve el valor de la meta
	*/
	private function obtener_valor($nombre, $seccion, $valores_nuevos){

		// Si existe cargo el valor que se pasó diréctamente al generador de metas
		if(array_key_exists($nombre, $valores_nuevos)){
			return $valores_nuevos[ $nombre ];
		}

		// Cargo el valor actual de la meta desde la configuración, si no está vacío
		// Las prioridades son: idioma actual, el por defecto o cualquier otro
		$valores = $this->config->secciones[ $seccion ];
		foreach(Idioma::idiomasDisponibles() as $idioma){
			if(array_key_exists($idioma, $valores) AND $valores[ $idioma ][ $nombre ]){
				return $valores[ $idioma ][ $nombre ];
			}
		}

		// Cargo el valor por defecto si hiciera falta
		// Las prioridades son: idioma actual, el por defecto o cualquier otro
		$valores_defecto = $this->config->defecto;
		foreach(Idioma::idiomasDisponibles() as $idioma){
			if(array_key_exists($idioma, $valores_defecto)){
				return $valores_defecto[ $idioma ][ $nombre ];
			}
		}
		return '';
	}


	/** 
	* Remueve las comillas dobles y el cualquier HTML para que no se rompa la página
	*/
	private function limpiar($valor){
		return str_replace('"', '\'', strip_tags($valor));
	}

	// Dejo estos métodos vacíos para evitar que se pueda crear objetos de esta clase
    private function __clone() {}
    private function __wakeup() {}
}