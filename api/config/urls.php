<?php

/* 
* --------------------------------------------------------------------------
* URLS
* --------------------------------------------------------------------------
*
* Acá se define la estructura de la URL de cada sección y los datos que hay
* que pasarle al helper url() (definido en api/core/Url.php) para construir 
* la URL.
*
* Los textos entre llaves {} son los nombres de las variables que hay que 
* pasar al momento de construir la URL. Los textos entre parétesis () se van
* a cargar dependiendo del idioma de la URL.
*
* Cuando no se define una estructura la URL coincide con el nombre de la
* sección.
*
* Ej con datos:
* Si yo tengo definida esta plantilla 'noticias/{anio}' para la sección 
* 'noticias-anio' para construir esta url tengo que llamar al helper url()
* así: 
* url('noticias-anio', array('anio' => 2017))
* 
* Y me va a imprimir:
* http://ejemplo.com.ar/noticias/2017
*
*
* Ej con idiomas: Si yo tengo definida esta plantilla '(es:noticias|en:news)' 
* para la sección 'noticias' para construir esta url tengo que llamar al 
* helper url() así: 
* url('noticias')
* 
* Como no hay ningún textoo entre llaves no tenemos que pasarle ningún dato. 
* Esto me va a imprimir:
* http://ejemplo.com.ar/noticias/ si el idioma actual es español y 
* http://ejemplo.com.ar/news/ si el idioma actual es inglés.
* 
*/

return array(

	'home' => '',
	'acerca' => 'acerca-me',

);