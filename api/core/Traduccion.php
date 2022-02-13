<?php

/**
* Gestiona las traducciones
*/
class Traduccion{

    private static $traducciones = array();

    /**
    * Obtengo la traducción en el idioma actual
    */
    public static function obtener(){

        if(! array_key_exists(Idioma::actual(), Traduccion::$traducciones)){
             Traduccion::$traducciones[ Idioma::actual() ] = Traduccion::cargar();
        }
        return Traduccion::$traducciones[ Idioma::actual() ];
    }

    /**
    * Cargo un archivo con la traducción en el idioma actual
    */
    public static function cargar(){

        if(! array_key_exists(Idioma::actual(), Traduccion::$traducciones)){
            $archivo = API_PATH.'idiomas/'.Idioma::actual().'.php';
            if( @file_exists($archivo) ){
               return include($archivo);
            }
        }

        return array();
    }

    /**
    * Traducir variable
    * Si la clave  que le pasamos está separada por espacios (el separador por defecto)
    * buscamos un array dentro del archivo de idioma.
    *
    * @param $keys String Clave de la traduccíon. Si querés acceder a una clave dentro 
    * de un array separalas por $separador.
    * @param $separador String Separa varias claves cuando se quiere acceder al un valor 
    * que está dentro de un array de la traducción.
    *
    * @example 
    * Traducción:
    * 'nav' => array(
    *   'home' => 'Home'.
    *   'contacto' => 'Contacto'.
    * );
    *
    * Obtener traducción:
    * __('nav contacto');
    *
    */
    public static function traducir($keys, $separador = ' '){

        $traduccion = Traduccion::obtener();

        $keys = explode($separador, $keys);
        foreach($keys as $k){
            if(! array_key_exists($k, $traduccion)){
                return '';
            }
            $traduccion = $traduccion[$k];
        }

        return $traduccion;
    }

    // Dejo estos métodos vacíos para evitar que se pueda crear un objeto Idioma
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}