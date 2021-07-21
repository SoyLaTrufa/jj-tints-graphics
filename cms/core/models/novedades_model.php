<?php

class Novedades_model extends MY_Model {

	var $fields = array(
		'activa',
		'fecha',
		'titulo',
		'bajada',
		'cuerpo',
		'foto_id',
		'foto_2_id',
		'foto_3_id',
		'foto_4_id',
		'foto_5_id',
		'meta_titulo',
		'meta_descripcion',
		'uri',
		'orden'
	);

	var $table = 'novedades';

	function __construct(){
    parent::__construct();
  }

  public function save_item($o,$isUpdate,$validar = true){

	// El título es obligatorio)
	if(isset($o->activa) ? $o->activa : false){
  	if(! (isset($o->titulo) ? $o->titulo : false)){
			throw new Exception('El título es obligatorio.');
			return false;
		}
	}

	// Creo automáticamente la URI
	if(isset($o->titulo)){
		include_once(APPPATH.'helpers/cadenaUrl.php');
		$o->uri = cadenaUrl(mb_strtolower($o->titulo,'utf-8'));
	}

	return parent::save_item($o, $isUpdate);

	}
}