<?php

/**
* Permite definir idioma actual
*/
class Idioma{

    static private $idioma_actual = null;

    /**
    * Obtengo los idiomas disponibles
    * Los devuelvo ordenados así: actual, por defecto, el resto.
    * @return array
    */
    public static function idiomasDisponibles(){
        
        $idiomas =  Config::obtener('idioma')->idiomas_disponibles;
        $idiomas_ordenados = array();

        // Primero va el idioma actual
        if(defined('IDIOMA')){
            $idiomas_ordenados[] = IDIOMA;
        }

        // Después el idioma por defecto (si no es el actual)
        if(defined('IDIOMA') AND Idioma::defecto() !== IDIOMA){
            $idiomas_ordenados[] = Idioma::defecto();
        }

        // Por último agrego todos los idiomas restantes
        $idiomas_ordenados = array_merge($idiomas_ordenados, array_diff($idiomas, $idiomas_ordenados));

        return $idiomas_ordenados;
    }


    /**
    * Defino si está habilitada la detección de idioma
    * Si hay más de un idioma disponible se habilita el cambio de idioma
    * @return bool
    */
    public static function deteccionHabilitada(){
        return count(Config::obtener('idioma')->idiomas_disponibles) > 1;
    }


    /**
    * Obtengo el idioma por defecto
    * El primero de los idiomas diponibles se toma como por defecto
    * @return string Código del idioma por defecto
    */
    public static function defecto(){
        return Config::obtener('idioma')->idiomas_disponibles[0];
    }


    /**
    * Obtengo el idioma actual
    * @return string Código del idioma actual
    */
    public static function actual(){

        if(Idioma::$idioma_actual === null){

            if(Idioma::deteccionHabilitada()){
                Idioma::$idioma_actual = Idioma::determinarIdioma();
            }else{
                Idioma::$idioma_actual = Idioma::defecto();
            }

            // Guardamos los datos en una cookie
            setcookie("idioma", Idioma::$idioma_actual, time()+3600,"/", "");
        }

        return Idioma::$idioma_actual;
    }


    /**
    * Determino cuál sería el idioma actual
    * @return string Código del idioma actual (Ej: es)
    */
    private static function determinarIdioma(){

        foreach(Config::obtener('idioma')->metodos_deteccion as $metodo){

            // Obtenemos los idiomas desde el parámero "idioma" de la URL
            if($metodo == 'url'){
                if( isset($_GET['idioma']) AND in_array($_GET['idioma'], Idioma::idiomasDisponibles()) ){
                    return $_GET['idioma'];
                }

            // Obtenemos el idioma definido en una cookie
            }elseif($metodo == 'cookie'){
                if( isset($_COOKIE['idioma']) AND in_array($_COOKIE['idioma'], Idioma::idiomasDisponibles()) ){
                    return $_COOKIE['idioma'];
                }
            
            // Obtenemos el idioma según los idiomas que acepta el navegador
            }elseif($metodo == 'navegador'){
                if($idioma = Idioma::detectarIdiomaNavegador()){
                    return $idioma;
                }

            // Obtenemos el idioma según la IP
            }elseif($metodo == 'ip'){
                 if($idioma = Idioma::detectarIdiomaIP()){
                    return $idioma;
                }
            }
        }

        // Devolvemos el idioma por defecto
        return Idioma::defecto();
    }


    /**
    * Detecto el idioma del navegador
    */
    private static function detectarIdiomaNavegador() {

        $idiomas_cabeceras = preg_replace('/(;q=\d+.\d+)/i', '', getenv('HTTP_ACCEPT_LANGUAGE'));

        // Comprobamos si el navegador usa alguno de los idiomas que hemos predefinido.
        foreach (Idioma::idiomasDisponibles() as $idioma) {
            if (preg_match('/' . $idioma . '/i', $idiomas_cabeceras)) {
                return $idioma;
            }
        }
    }


    /**
    * Detecto el idioma según la IP (y el país al que pertenece esa IP)
    * @return El idioma actual o false si no se encontraron coincidencias
    */
    private static function detectarIdiomaIP() {

        if( (@$response = file_get_contents("http://ipinfo.io/".filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP)."/json")) !== FALSE){
            $data = json_decode($response);
            foreach(Config::obtener('idioma')->paises_idiomas as $idioma => $paises){
                if(!in_array($idioma, Idioma::idiomasDisponibles())){
                    continue;
                }
                if(in_array($data->country, $paises)){
                    return $idioma;
                }
            }
        }

        return false;
    }


    // Dejo estos métodos vacíos para evitar que se pueda crear un objeto Idioma
    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}
}