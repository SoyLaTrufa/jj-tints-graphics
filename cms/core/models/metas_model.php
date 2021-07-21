<?php

class Metas_model extends MY_Model {

	var $fields = array(
		'id',
		'titulo',
		'descripcion',
		'seccion',
		'orden'
	);

	var $table = 'metas';

	function __construct(){
        parent::__construct();
    }
}