<?php

/* 
* --------------------------------------------------------------------------
* CONFIGURACIÓN GENERAL
* --------------------------------------------------------------------------
*
*/

return array(

	/*
	* ENVIRONMENT
	* 
	* El entorno que elijas va a afectar algunas configuraciones como el 
	* uso de logs de errores y si se muestran o no en pantalla.
	* 
	* Opciones: desarrollo, produccion
	* 
	*/
	'enviroment' => 'desarrollo',

	/* 
	* DOMINIOS PERMITIDOS
	*
	* Cargá todos los dominios desde los que querés que se vea el sitio. Si 
	* se usa alguno de estos dominios la URL_BASE se va a construir 
	* automáticamente pero si no el sitio da error. (Esto es una medida de 
	* seguridad).
	*
	*/
	'dominios_permitidos' => array(
		'localhost',
		'192.168.0.7',
		'jj.servidoraweblab.ar',
	),

	/* 
	* URL BASE
	* 
	* Todas las URLs del sitio van a empezar con esta URL. Si no la 
	* definís se construye automáticamente usando los dominios permitidos.
	* 
	* Esta variable está acá solo por si hace falta sobreescribir el valor 
	* que se genera automáticamente.
	*
	*/
	// 'base_url' => 'http://192.168.0.7/JJ/',
	'base_url' => 'https://jj.servidoraweblab.ar/',

	/* 
	* RUTA BASE
	* 
	* Se calcula automáticamente, normalmente no hace falta definirla 
	* manualmente.
	*
	*/
	'base_path' => '',

	/* 
	* ZONA HORARIA
	* 
	* Si el sitio está en Argentina no hace falta cambiarla.
	* 
	*/
	'default_timezone_set' => 'America/Argentina/Buenos_Aires',

);