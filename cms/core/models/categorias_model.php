<?php

class Categorias_model extends MY_Model {

	var $fields = array(
		'id',
		'titulo',
		'fecha',
		'orden'
	);

	var $table = 'categorias_videos';

	 function __construct()
    {
        parent::__construct();
    }

}