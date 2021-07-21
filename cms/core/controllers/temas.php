<?php

Class Temas extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "temas";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "temas";


        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        );


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$controller_config['campos_form'] = array(


			array(
				'key'     =>'titulo',
				'label'   =>'Ubicación',
				'type'    =>'form_input',
				'filter'  =>true,
				'list'    =>true,
				'class'   =>'form-half',
				'properties'=> array(
					'name'      => 'titulo',
					'maxlength' => 100,
				)
			),

			// Selector de colores
			array(
				'key'	=>'color',
				'label'	=>'Código Color',
				'type'	=>'form_input',
				'filter'=>null,
				'list'	=>true,
				'class'	=>'form-third',
				'properties'=> array(
					'name'         => 'color',
					'id'           => 'color',
					'maxlength'    => '6',
					'class'		=> 'colorpicker_selector',
					'readonly' => 'readonly'
				)
			),

		);

        $this->cargar_config( $controller_config );
    }
}