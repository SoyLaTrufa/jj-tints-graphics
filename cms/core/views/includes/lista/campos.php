<?php

//Obtengo los campos del listado
$campos = '';
foreach( $campos_form as $field ){



	$mostrar_campo = (isset($field['list']) && $field['list']===true);

	// No muestro el campo si está activo el filtro JavaScript para ese campo y se está filtrando
	if( isset($field['properties']['filtros']) ){
		foreach($field['properties']['filtros'] as $filtro_tipo => $filtro_valor){
	 			if(isset($_GET[ $filtro_tipo ]) AND $_GET[ $filtro_tipo ] != $filtro_valor AND $_GET[ $filtro_tipo ]!=''){
	 				$mostrar_campo = false;
	 			}
	 		}
	}

	if( !$mostrar_campo)
		continue;

	$key = $field['key'];
	

	switch( $field['type'] ){

		case 'email':
			$html_campo = '<a href="mailto:'.$item->$key.'">'.$item->$key.'</a>';
			break;

		case 'images':
			$ruta = $controller.'/'.$item->id.'/0_'.$field['key'].'_thumbnail.jpg';
			$html_campo = file_exists(IMAGES_RESOURCES_PATH.$ruta) ? '<img src="'.IMAGES_RESOURCES_URL.'/'.$ruta.'" style="height: 30px; width: auto;"/>' : '';
			break;

		case 'gallery':
			$galeria_id = $item->{$field['key'].'_id'};

			$CI =& get_instance();
			$CI->load->model('fotos_model');

			if($fotos_galeria = $CI->fotos_model->fotos_galeria($galeria_id)){
				$ruta = $galeria_id.'/'.$fotos_galeria[0]->filename.'_thumbnail.'.$fotos_galeria[0]->extension;
				$html_campo = file_exists(GALLERIES_RESOURCES_PATH.$ruta) ? '<img src="'.GALLERIES_RESOURCES_URL.$ruta.'" style="height: 30px; width: auto;"/>' : '';
			}
			break;

		case 'jcropimage':
			$html_campo = '';
			if($item->{$field['key']}){
				$CI =& get_instance();
				$CI->load->model('fotos_model');
				$foto = $CI->fotos_model->get_item($item->{$field['key']});
				$ruta = $controller.'/'.$item->id.'/0_'.$field['key'].'_'.$field['properties']['sizes'][0]['height'].'x'.$field['properties']['sizes'][0]['width'].'.'.$foto->extension;
				$html_campo = file_exists(IMAGES_RESOURCES_PATH.$ruta) ? '<img src="'. IMAGES_RESOURCES_URL.$ruta .'" style="height: 30px; width: auto;"/>' : '';
			}
			break;

		case 'form_checkbox':
			$html_campo =
			'<a href="#" class="js-checkbox-ajax">
				<i class="fa fa-'.($item->$key ? 'check-square-o' : 'square-o').'" aria-hidden="true"></i>
			</a>';
			break;

		case 'form_dropdown':
		case 'form_dropdown_ajax':
		case 'form_dropdown_nueva_opcion':
			$html_campo = ($item->$key AND isset($field['properties']['options'][$item->$key])) ? $field['properties']['options'][$item->$key] : '-' ;
			break;

		case 'form_multiselect_simple':
			$html_campo = '';
			if($item->$key){
				$labels = array();
				$selected_options = explode(',', $item->$key);
				foreach($selected_options as $option){
					if(isset($field['properties']['options'][$option])){
						$labels[] = $field['properties']['options'][$option];
					}
				}
				$html_campo = $labels ? implode(',', $labels) : '-';
			}
			break;

		default:
			$html_campo = ($item->$key!='') ? $item->$key : '-';
			break;
	}


	$campos .= '<td data-key="'.$key.'">'.$html_campo.'</td>';

}


echo $campos;
