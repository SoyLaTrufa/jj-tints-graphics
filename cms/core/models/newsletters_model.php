<?php

class Newsletters_model extends MY_Model {

	var $fields = array(
		'activo',
		'fecha',
		'titulo',
		'novedad_principal',
		'novedad_1',
		'novedad_2',
		'orden'
	);

	var $table = 'newsletters';

	function __construct(){
    parent::__construct();
  }

  public function save_item($o, $isUpdate, $validar=true){

  	$CI = get_instance();

  	if(isset($o->activa) ? $o->activa : false){

	  	// Valida que el título 

	  	if(!(isset($o->titulo) ? $o->titulo : false)){
				throw new Exception('El título es obligatorio.');
				return false;
			}

			// No se pueden repetir las novedades
	  	if($o->novedad_principal == $o->novedad_1 or $o->novedad_principal == $o->novedad_2 or $o->novedad_1 == $o->novedad_principal or $o->novedad_1 == $o->novedad_principal or $o->novedad_2 == $o->novedad_principal or $o->novedad_2 == $o->novedad_principal){

				throw new Exception('No se pueden repetir las novedades');
				return false;
			}

			// Todas las Novedades son Obligatorias
	  	if($o->novedad_principal == '' or $o->novedad_1 == '' or $o->novedad_2 == ''){

				throw new Exception('Seleccione todas las casillas de novedad');
				return false;
			}
			
		}

		return parent::save_item($o, $isUpdate);

	}

}
