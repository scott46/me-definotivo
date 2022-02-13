<?php

// Antes que nada compruevo la versión de PHP.
if (version_compare(PHP_VERSION, '5.2.4', '<')) {
    exit("El servidor no es compatible con el sistema. La versión mínima de PHP es 5.2.4 y el servidor tiene actualmente la versión ".PHP_VERSION);
}


require_once('core/Config.php');

$config = Config::obtener('config');

/* 
* --------------------------------------------------------------------------
* AMBIENTE DE LA APLICACIÓN
* --------------------------------------------------------------------------
*
*/
define('ENVIRONMENT', $config->enviroment);

// Capturo todos los errores y los muestro
if(ENVIRONMENT == 'desarrollo'){
	ini_set('display_errors',-1);
	error_reporting(-1);
	ini_set('display_startup_errors', 1);
	//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Capturo solo algunos errores y los guardo en un log
}elseif(ENVIRONMENT == 'produccion'){
	ini_set('display_errors',0);
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);

}else{
	header('HTTP/1.1 503 Servicio no disponible.', TRUE, 503);
	echo 'No está definido el entorno de la aplicación. "'.ENVIRONMENT.'"';
	exit();
}



/* 
* --------------------------------------------------------------------------
* RUTAS Y URLS BASE
* --------------------------------------------------------------------------
*
*/

/* 
* DIRECTORY SEPARATOR
* Según el sistema operativo del servidor puede cambiar el separador
* de directorios. Para Windows es "\\" y para Linux "/".
*
*/
define('DS','/');

/* 
* DOMINIO
*
*/
if(in_array($_SERVER['SERVER_NAME'], $config->dominios_permitidos)){
	define('DOMINIO', $_SERVER['SERVER_NAME']);
}else{
	exit("Este dominio no está habilitado. Configurá el sitio para que lo permita o contactá al webmaster.");
}

/* 
* CARPETAS
* Solo se usan cuando hay CMS (administrador de contenidos)
*
*/
define('CARPETA_API', 'api');
define('CARPETA_CMS', 'cms');
define('CARPETA_RECURSOS', 'resources');

/* 
* URLS
*
*/
define('SSL_ON', isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on');
define('BASE_URL', !$config->base_url ? (SSL_ON ? 'https://' : 'http://').DOMINIO.'/' : $config->base_url);
define('API_URL', BASE_URL.CARPETA_API.'/');
define('CMS_URL', BASE_URL.CARPETA_CMS.'/');
define('RESOURCES_URL',  CMS_URL.CARPETA_RECURSOS.'/');

/* 
* RUTAS
*
*/
define('BASE_PATH', !$config->base_path ? realpath(dirname(__FILE__)).DS.'..'.DS : $config->base_path);
define('API_PATH', BASE_PATH.CARPETA_API.DS);
define('CMS_PATH', BASE_PATH.CARPETA_CMS.DS);
define('RESOURCES_PATH', CMS_PATH.CARPETA_RECURSOS.DS);

//echo 'https://'.DOMINIO.BASE_URL;

/* 
* INCLUDES
*
* Por defecto todos los include() van a cargar archivos de /includes/
* 
*/
define('INCLUDE_PATH', BASE_PATH.'includes'.DS);
set_include_path(INCLUDE_PATH);
ini_set('memory_limit', '400M');

define('IDIOMA_DEFAULT', 'es');
define('IDIOMA_ENABLED', json_encode( array('es' , 'en') ));

/* 
* --------------------------------------------------------------------------
* GEOLOCALIZA
* --------------------------------------------------------------------------
*
*/
$geoPlugin_array = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
// if($geoPlugin_array['geoplugin_countryName'] == 'Argentina') {
//     define('PAIS', 'ar');
// } else {
//     define('PAIS', 'otro');
// }
//define('PAIS', 'Internacional');

/* 
* ZONA HORARIA
* 
*/
date_default_timezone_set($config->default_timezone_set);

/* 
* --------------------------------------------------------------------------
* INICIALIZO LA APLICACIÓN
* --------------------------------------------------------------------------
*
* Cargo toda la configuración y los archivos necesarios para que funcione
* la API. Acá va todo lo que se tiene que ejecutar en todas las páginas.
* 
*/

/* 
* AUTOLOAD
* Cargo el autoload que va cargar todos los archivos de la
* API cuando los necesite.
* 
*/
require_once(API_PATH.'core/Autoload.php');

/* 
* HELPERS
* Con las funciones no funciona el autoload así que las cargo manualmente
* 
*/
$helpers = array_diff(scandir(API_PATH.'helpers'), array('..', '.'));
foreach($helpers as $h){
	$helper = API_PATH.'helpers/'.$h;
    if (file_exists($helper)) {
        require $helper;
    }
}

/* 
* --------------------------------------------------------------------------
* ALIAS DE LOS MÉTODOS PRINCIPALES
* --------------------------------------------------------------------------
*
* Acá defino las funciones que más se van a usar en toda la aplicación. Por 
* ahora son solo 2:
*
* - El helper _() para cargar cualquier traducción
* - El helper url() para generar todas las url de la aplicación
* 
*/

if ( ! function_exists('__')){
	function __( $key ){
		return Traduccion::traducir( $key );
	}	
}

if ( ! function_exists('url')){
	function url($seccion, $datos = array(), $idioma = IDIOMA, $absoluta = true){
		return Url::seccion($seccion, $datos, $idioma, $absoluta);
	}	
}



/* 
* IDIOMA
* Defino el idioma actual.
* 
*/
define('IDIOMA', Idioma::actual());


/* 
* MINIFICADOR
* Inicializo el minificador de CSS y JS para usarlo más adelante
* https://github.com/bennettstone/magic-min
* 
*/
$minified = new Minifier(
    array(
        'gzip' => false,
        'closure' => false,
        'hashed_filenames' => false,
        'output_log' => false,
        'echo' => false,
        'force_rebuild' => false
    )
);


/*
GEOLOCALIZACION
*/
function getRealIP(){
    if (isset($_SERVER["HTTP_CLIENT_IP"])){
        return $_SERVER["HTTP_CLIENT_IP"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
        return $_SERVER["HTTP_X_FORWARDED"];
    }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_FORWARDED"])){
        return $_SERVER["HTTP_FORWARDED"];
    }else{
        return $_SERVER["REMOTE_ADDR"];
    }
}       





/* 
* CODIFICACIÓN
* Defino la codificación como UTF-8
* 
*/
header('Content-Type: text/html; charset=utf-8');

/* 
* API de Advance Agent
*/
// Carga los controladoresre
require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";
require_once "controladores/categorias.controlador.php";
require_once "modelos/categorias.modelo.php";
require_once "controladores/contenidos.controlador.php";
require_once "modelos/contenidos.modelo.php";
require_once "modelos/carrito.modelo.php";
require_once "controladores/carrito.controlador.php";
require_once "controladores/faq.controlador.php";
require_once "controladores/comentarios.controlador.php";
require_once "modelos/comentarios.modelo.php";

