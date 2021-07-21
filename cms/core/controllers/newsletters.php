<?php

Class newsletters extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "newsletters";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "newsletters";

	    $controller_config["paginator_results_per_page"] = 30;

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',

			//'copiar'	=>	'javascript:copiarHTML(\''.base_url().'../newsletter/novedades/{id}/\', false)',

			'preview'	=>	base_url().'../newsletter/novedades/{id}/?envio',

        	'delete'	=>	'javascript:areYouSurePrompt(\''.base_url().$controller_config['script'].'/delete/{id}/{uriParameters}\');'
        );

        // Ordeno el listado
	    if(! isset($_GET['order'])){
	    	$_GET['order'] = array(
				'fecha' => 'DESC',
				'id' => 'DESC',
			);
	    }


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$controller_config['campos_form'] = array(

			array(
				'key'	=>'activo',
				'label'	=>'Activo',
				'type'	=>'form_checkbox',
				'filter'=>null,
				'list'	=>true,
				'class'	=>'form-quarter label-up cl-b',
				'properties'=> array(
					'name'    => 'activo',
					'value'   => 1,
					'checked' => 'checked',
				)
			),

			array(
				'key'	=>'fecha',
				'label'	=>'Fecha',
				'type'	=>'date',
				'filter'=>null,
				'list'	=>true,
				'class'	=>'form-quarter label-up cl-b',
				'properties'=> array(
					'name'         => 'fecha',
					'id'           => 'fecha',
				)
			),

			array(
				'titulo' =>'Titulo Principal',
				'key'	=>'titulo',
				'label'	=>'Título',
				'type'	=>'form_input',
				'filter'=>null,
				'list'	=>true,
				'class'	=>'form-third label-up cl-b',
				'properties'=> array(
					'name'         => 'titulo',
					'id'           => 'titulo',
					'maxlength'    => '255'
				)
			),

			array(
				'titulo' =>'Novedades',
				'key'	=>'novedad_principal',
				'label' => 'Novedad Principal',
				'type'	=>'form_dropdown',
				'filter'=>null,
				'list'	=>false,
				'class'	=>'form-full label-up',
				'properties'=> array(
					'name'    => 'novedad_principal',
					'options'    =>  array("" => "Elija una novedad") + $this->getOptions('novedades_model','titulo'),
				),
			),

			array(
				'key'	=>'novedad_1',
				'label' => 'Novedad 1',
				'type'	=>'form_dropdown',
				'filter'=>null,
				'list'	=>false,
				'class'	=>'form-full label-up',
				'properties'=> array(
					'name'    => 'novedad_1',
					'options'    =>  array("" => "Elija una novedad") + $this->getOptions('novedades_model','titulo'),
				),
			),

			array(
				'key'	=>'novedad_2',
				'label' => 'Novedad 2',
				'type'	=>'form_dropdown',
				'filter'=>null,
				'list'	=>false,
				'class'	=>'form-full label-up',
				'properties'=> array(
					'name'    => 'novedad_2',
					'options'    =>  array("" => "Elija una novedad") + $this->getOptions('novedades_model','titulo'),
				),
			),

		);

      $this->cargar_config( $controller_config );
    }
}
