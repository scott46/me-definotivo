<?php

/* 
* --------------------------------------------------------------------------
* IDIOMA
* --------------------------------------------------------------------------
*
*/

return array(

	/* 
	* IDIOMAS DISPONIBLES
	* Si hay un solo idioma se desactiva automáticamente la detección y 
	* el cambio de idioma.
	* Siempre el primero se usa como idioma por defecto.
	*/
	'idiomas_disponibles' => array('es', 'en'),

	/* 
	* MÉTODOS DE DETECCIÓN DE IDIOMA
	* Define qué métodos y en qué orden se va a detectar el idioma. Los metodos
	* disponibles son: url, cookie, ip, navegador
	*/
	'metodos_deteccion' => array('url','cookie','ip', 'navegador'),

	/* 
	* PAISES A IDIOMAS
	* En este array definimos qué idioma corresponde a qué país. Se usa en el
	* método de deteccion de idioma por IP.
	*/
	'paises_idiomas' => array(
        'es' => array('AR','CL','BO','VE','PR','PY','PE','EC','ES','MX','CO','UY'),
        'en' => array('GB','US','CA','AU'),
        'pr' => array('BR','PT'),
    ),

);