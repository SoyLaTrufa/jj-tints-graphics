<?php

class Temas_model extends MY_Model {

	var $fields = array(
		'titulo',
		'color',
		'orden',
	);

	var $table = 'temas';

	function __construct(){
    parent::__construct();
  }

 
}