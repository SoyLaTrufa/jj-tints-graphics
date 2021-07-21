<?php

class Contactos_model extends MY_Model {

	var $fields = array(
		'nombre',
		'rating',
		'email',
		'fecha',
		'orden'
	);

	var $table = 'contactos';

	 function __construct()
    {
        parent::__construct();
    }

}