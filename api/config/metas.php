<?php

/* 
* --------------------------------------------------------------------------
* METAS
* --------------------------------------------------------------------------
*
* En "defecto" se definen los valores por defecto para cada metaetiqueta. 
* 
* En "secciones" se definen los valores pora cada meta por sección. Estos
* pueden sobreescribirse desde la configuración de cada página.
*
* En "plantilla" se define la base para todas la metas en donde {valor} se 
* reemplaza por el valor que se le asigna a las metas en "secciones".
*
*/

$empresa = Config::obtener('empresa');

return array(

	'defecto' => array(
		'es' => array(
			'titulo' => '',
			'descripcion' => '',
			'img' => BASE_URL.'images/favicons/android-chrome-256x256.png',
		)
	),

	'plantilla' => array(
		'titulo' => '{valor} | '. $empresa->nombre,
		'descripcion' => '{valor}',
		'img' => '{valor}',
	),

	'secciones' => array(
		'home' => array(
			'es' => array(
				'titulo' => 'Home',
				'descripcion' => '',
				'img' => '',
			),
		),
		'categorias' => array(
			'es' => array(
				'titulo' => 'Categorias',
				'descripcion' => '',
				'img' => '',
			),
		),
		'preguntas-frecuentes' => array(
			'es' => array(
				'titulo' => 'Preguntas frecuentes',
				'descripcion' => '',
				'img' => '',
			),
		),
		'privacidad' => array(
			'es' => array(
				'titulo' => 'Politica de Privacidad',
				'descripcion' => '',
				'img' => '',
			),
		),
		'terminos' => array(
			'es' => array(
				'titulo' => 'Términos y Condiciones',
				'descripcion' => '',
				'img' => '',
			),
		),
		'acerca' => array(
			'es' => array(
				'titulo' => 'Acerca de ME',
				'descripcion' => '',
				'img' => '',
			),
		),
		'productos' => array(
			'es' => array(
				'titulo' => 'Productos',
				'descripcion' => '',
				'img' => '',
			),
		),
		'checkout' => array(
			'es' => array(
				'titulo' => 'Checkout',
				'descripcion' => '',
				'img' => '',
			),
		),
		'checkout-sesion' => array(
			'es' => array(
				'titulo' => 'Checkout-sesion',
				'descripcion' => '',
				'img' => '',
			),
		),
		'checkout-tarjetas' => array(
			'es' => array(
				'titulo' => 'Checkout-sesion',
				'descripcion' => '',
				'img' => '',
			),
		),
		'me' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'contenido' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'contenidoPreview' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'canal' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'elemento' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'elementoPreview' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'experiencia' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'me-haus' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),
		'terminos-condiciones' => array(
			'es' => array(
				'titulo' => 'Me',
				'descripcion' => '',
				'img' => '',
			),
		),


		// Array de ejemplo para agregar si se agrega un página nueva
		// 'nombre-de-la-sección' => array(
		// 	'es' => array(
		// 		'titulo' => '',
		// 		'descripcion' => '',
		// 		'img' => '',
		// 	),
		// ),
	)

);