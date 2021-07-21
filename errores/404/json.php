<?php

 	include_once('modelos/Missing_children.php');

	$modelo  = isset($_GET['m']) ? ucfirst($_GET['m']) : false;
	$filtros = isset($_GET['f']) ? $_GET['f'] : false;

	if(! $modelo){
		die('Tenés que indicar algún modelo.');
	}

	if(! is_callable($modelo.'::obtener')){
		//header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		die('El modelo "'.$modelo.'" no existe.');
	}

	
	if( $filtros ){
		$resultado =  call_user_func( $modelo.'::obtener', $filtros);
	}else{
		$resultado = call_user_func($modelo.'::obtener');
	}

	$formato = isset($_GET['formato']) ? $_GET['formato'] : 'default';
	switch($formato){
		case 'html' :
			echo '<pre>';
			print_r($resultado);
			echo '</pre>';

		default :
			if($resultado !== null){
				header('Content-type: application/json');
				if(version_compare(PHP_VERSION, '5.4', '>=')){
					echo json_encode($resultado, JSON_PRETTY_PRINT);
				}else{
					echo json_encode($resultado);
				}
			}else{
				//header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
			}
			break;
	}

 	exit;