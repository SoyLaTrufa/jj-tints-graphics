<?php

class Promociones_model extends MY_Model {

	var $fields = array(
		'activa',
		'fecha',
		'titulo_es',
		'titulo_en',
		'bajada_es',
		'bajada_en',
		'cuerpo_es',
		'cuerpo_en',
		'servicios',
		'foto_id',
		'galeria_id',
		'meta_titulo_es',
		'meta_titulo_en',
		'meta_descripcion_es',
		'meta_descripcion_en',
		'uri',
		'orden'
	);

	var $table = 'promociones';

	function __construct(){
    parent::__construct();
  }

  public function save_item($o,$isUpdate,$validar = true){

	// El título es obligatorio)
	if(isset($o->activa) ? $o->activa : false){
  	if(! (isset($o->titulo_es) ? $o->titulo_es : false)){
			throw new Exception('El título es obligatorio.');
			return false;
		}
	}

	// Creo automáticamente la URI
	if(isset($o->titulo_es)){
		include_once(APPPATH.'helpers/cadenaUrl.php');
		$o->uri = cadenaUrl(mb_strtolower($o->titulo_es,'utf-8'));
	}

	return parent::save_item($o, $isUpdate);

	}
}