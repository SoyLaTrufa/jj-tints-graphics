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
			'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
		)
	),

	'plantilla' => array(
		'titulo' => $empresa->nombre.' | {valor}',
		'descripcion' => '{valor}',
		'img' => '{valor}',
	),

	'secciones' => array(
		'home' => array(
			'es' => array(
				'titulo' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'quienes-somos' => array(
			'es' => array(
				'titulo' => 'Quienes somos',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'promociones' => array(
			'es' => array(
				'titulo' => 'Promociones',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'servicios' => array(
			'es' => array(
				'titulo' => 'Servicios',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'productos' => array(
			'es' => array(
				'titulo' => 'Productos',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'peliculas' => array(
			'es' => array(
				'titulo' => 'PELICULAS DE CONTROL SOLAR 3M',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'toldos-y-persianas' => array(
			'es' => array(
				'titulo' => 'PELICULAS DE CONTROL SOLAR 3M',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'adhesivos-3m' => array(
			'es' => array(
				'titulo' => 'ADHESIVOS 3M',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'graficos' => array(
			'es' => array(
				'titulo' => 'GRÁFICOS Y CAR WRAP',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
			),
		),
		'contacto' => array(
			'es' => array(
				'titulo' => 'Contacto',
				'descripcion' => 'Somos distribuidores e instaladores exclusivos de toda la gama de laminados decorativos, de seguridad y de control solar de la reconocida marca americana 3M, quien es líder mundial en este segmento.',
				'img' => BASE_URL.'images/favicons/android-chrome-192x192.png',
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