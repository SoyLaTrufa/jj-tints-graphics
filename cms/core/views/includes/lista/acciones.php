<?php

	$html_acciones = '';

	foreach( $actions as $action_key => $href ){

		// Remplazo los uri_parameters definidos
		$href = str_replace('{uriParameters}', $uriParameters, $href);

		// Y todos los otros valos extraidos de cada item
		preg_match_all("/{(.*?)}/", $href, $variables);
		foreach($variables[1] as $var){
			if(isset($item->$var)){
				$href = str_replace('{'.$var.'}', mb_strtolower(str_replace(' ','-',$item->$var)), $href);
			}
		}

		switch( $action_key ){

			case 'delete':
				$html_acciones = '<a href="'.$href.'" title="Eliminar"><i class="far fa-trash-alt" style="color: #f84040;"></i></a>'.$html_acciones;
				break;

			case 'editar':
				$html_acciones = '<a href="'.$href.' title="Editar"><i class="fa fa-pencil-square-o" style="color: #000000;" aria-hidden="true"></i></a>'.$html_acciones;
				break;

			case 'preview':
				$html_acciones = '<a href="'.$href.'" target="_blank" title="Ver vista previa"><i class="fa fa-search" style="color: #cccccc;" aria-hidden="true"></i></a>'.$html_acciones;
				break;
			
			case 'clonar':
				$html_acciones = '<a href="'.$href.'" title="Clonar" target="_blank"><i class="fa fa-clone" aria-hidden="true"></i></a>'.$html_acciones;
				break;

			case 'presentacion':
				if( isset($item->activa) AND $item->activa ){
					$html_acciones = '<a href="'.$href.'" title="Generar presentación" target="_blank">.<i class="fa fa-file-text-o" aria-hidden="true"></i></a>'.$html_acciones;
				}
				break;

			default:
				$html_acciones = '<a href="'.$href.'" class="boton boton--sm">'.$action_key.'</a>'.$html_acciones;
				break;
		}

	}

	return $html_acciones;