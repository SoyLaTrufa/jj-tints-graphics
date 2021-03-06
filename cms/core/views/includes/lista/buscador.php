<?php

$buscador_campos_cantidad = count($campos_form);

//Construyo el buscador
$html_buscador = '<form id="form" class="filtro">';

// Mantengo todo los parámetros pasados por URL
$html_buscador .= form_hidden($_GET);

$busqueda_activa = false;

foreach($campos_form as $key=>$field){

	// Si no esta activado el filter para este campo continuo
	if(!isset($field['filter']) OR $field['filter']==null){
		$buscador_campos_cantidad--;
		continue;
	}

	// Controlo si se hizo alguna búsqueda
	$busqueda_activa = $this->input->get($field['key'])  ? true : $busqueda_activa;

	///// Hago algunos ajustes antes de construir los filtros de búsqueda /////
	switch($field['type']){

		case 'form_dropdown':
		case 'form_dropdown_ajax':
		case 'form_multiselect_simple':
		case 'form_dropdown_nueva_opcion':
			$field['properties']['options'] =  array( ''=>'Sin especificar' ) + $field['properties']['options'];
			$field['type']='form_dropdown';
			break;

		case 'form_textarea':
			$field['type']='form_input';
			break;
	}

	///// Construyo los filtros de búsqueda /////
	// Si es un campo del controlador local lo consulto
	if( $field['type']=='datetime' ){

		$datofecha = (is_array($this->input->get($field['key']))) ? $this->input->get($field['key']) : array('','','');

		$html_buscador .= '<fieldset><label for="'.$field['key'].'">'.$field['label'].':</label> '.$this->functions->make_form('form_input',array('name'=> $field['key'].'[]','size'=>'2','maxlength'=>'2'),$datofecha[0]).' <select name="'.$field['key'].'[]">'.$this->functions->getMonthsOptions($datofecha[1]).'</select>&nbsp;'.$this->functions->make_form('form_input',array('name'=> $field['key'].'[]','size'=>'4','maxlength'=>'4'),$datofecha[2]).'</fieldset>';

	}elseif($field['type'] == 'date'){
		// Evito que el buscador tenga una fecha por defecto
		// (en realidad sí la tiene, pero dentro del datepicker)
		$field['properties']['value'] = isset($_GET[ $field['key'] ]) ? $_GET[ $field['key'] ] : '';
		$html_buscador .= '<fieldset>'.
							'<label for="'.$field['key'].'">'.
								( in_array($field['filter'], array('<','>','>=','<=')) ?
								    ( in_array($field['filter'], array('<','<=')) ?
								     	'Hasta' : 'Desde').' el ' : $field['label']).
							'</label>'.
							$this->functions->make_form($field['type'],$field['properties']/*,$this->input->get($field['key'])*/).
						  '</fieldset>';

	}else{
		$html_buscador .= '<fieldset><label for="'.$field['key'].'">'.$field['label'].'</label> '.$this->functions->make_form($field['type'],$field['properties'],$this->input->get($field['key'])).'</fieldset>';
	}

}
$html_buscador .= '<button type="submit"><i class="fas fa-search"></i></button>';
$html_buscador .= $busqueda_activa ?'<button type="button" class="clean"><a href="'.base_url().(isset($current_script) ? $current_script : $this->router->fetch_class()).($this->input->get('categ') ? '?categ='.$this->input->get('categ') : '').'">Limpiar</a></button> ' : '';

// Filtro por categoría
$html_buscador .= $this->input->get('categ') ? '<input type="hidden" name="categ" value="'. $this->input->get('categ') .'">' : '';

$html_buscador .= '</form>';

return ( $buscador_campos_cantidad>0 ) ? $html_buscador : '';