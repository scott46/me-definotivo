<?php

/**
* Autocargador
* Carga los modelos, las librerías y las clases del core de la aplicación
*
* @param string $clase La clase a cargar
* @return void
*
*/
function autocargador($clase) {
    $rutas = array(
        API_PATH.'core/',
        API_PATH.'models/',
        API_PATH.'models/assets/',
        API_PATH.'libs/',
    );
    foreach($rutas as $ruta){
        $arch = $ruta.$clase.'.php';
        if (file_exists($arch)) {
            require $arch;
            break;
        }
    }
}
spl_autoload_register('autocargador');


