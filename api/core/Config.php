<?php

/**
* Gestor de configuración
* Esta clase me permite cargar cualquier archivo de configuración de api/config/.
*
* Ej: Obtener el "nombre" del archivo de configuración "empresa.php":
* Config::obtener('empresa')->nombre
*
*/
class Config{

	private static $grupos = array();

	/**
	* Obtiene un grupo de configuraciones
	*/
	public static function obtener($grupo){

		if(! array_key_exists($grupo, Config::$grupos)){
			Config::$grupos[ $grupo ] = (object) Config::cargar($grupo);
		}
		return Config::$grupos[ $grupo ];
	}


	/**
	* Carga un archivo de configuración
	* Los archivos se guardan en /api/config/.
	*/
	private static function cargar($grupo){

		$archivo = realpath(dirname(__FILE__)).'/../config/'.$grupo.'.php';
		if( @file_exists($archivo) ){
			return include($archivo);
		}

		return array();
	}

	// Dejo estos métodos vacíos para evitar que se pueda crear objetos de esta clase
	private function __construct(){}
    private function __clone() {}
    private function __wakeup() {}
}