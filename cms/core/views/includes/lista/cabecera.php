<?php

// Obtengo los títulos del listado
$html_listado_cabecera = '';
foreach($campos_form as $field){

	$mostrar_campo = (isset($field['list']) && $field['list']===true);

	// No muestro el campo si está activo el filtro JavaScript para ese campo y se está filtrando
	if( isset($field['properties']['filtros']) ){
		foreach($field['properties']['filtros'] as $filtro_tipo => $filtro_valor){
 			if(isset($_GET[ $filtro_tipo ]) AND $_GET[ $filtro_tipo ]!=''){
				$aplicar_filtro = false;
				foreach(explode(' ',$filtro_valor) as $f_valor){
					if($_GET[ $filtro_tipo ] == $f_valor){
						$aplicar_filtro = true;
						break;
					}
				}
				// Solo muestro el campo si no se ocultó explícitamente con la propiedad "list" del campo
				if(!$aplicar_filtro AND $mostrar_campo){
					$mostrar_campo = false;
				}
			}
	 	}
	}

	if( !$mostrar_campo)
		continue;

	// ¿Agregamos la flecha para ordenar?
	$order_arrow = '';
	if(isset($_GET['order'][$field['key']]) && $_GET['order'][$field['key']]=='asc'){
		$order_arrow = '&and;';

	}elseif(isset($_GET['order'][$field['key']]) && $_GET['order'][$field['key']]=='desc'){
		$order_arrow = '&or;';

	}


	$order = array(
		'order' => array(
			$field['key'] => (isset($_GET['order'][$field['key']]) && $_GET['order'][$field['key']]=='asc') ? 'desc' : 'asc'
		)
	);
	$uriParameters = '?'.http_build_query(array_merge($_GET, $order));

	$html_listado_cabecera .= '<th'.($field['type']=='date' ? '' : '').'><a href="'.
		base_url($controller).
		(isset($controller_method) ? '/'.$controller_method : '').
		$uriParameters.
		'">'.(isset($field['label_original']) ? $field['label_original'] : $field['label'] ).' '.$order_arrow.'</a></th>';
}

$html_listado_cabecera = '<tr>
							'.($acciones_en_lote ? '<th><input class="js-AEL-todos" type="checkbox" name=""></th>' : '').'
							'.($ordenar ? '<th><i class="fa fa-exchange" aria-hidden="true"></i></th>' : '').'
							'.$html_listado_cabecera.'
							<th>&nbsp;</th>
						  </tr>';

echo $html_listado_cabecera;