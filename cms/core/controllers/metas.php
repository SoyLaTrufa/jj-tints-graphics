<?php

Class Metas extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

        $controller_config["script"] = "metas";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
        $controller_config["name"] = "metas";

        // Botones
        $controller_config["add_button"] = true;

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	//'delete'	=>	'javascript:areYouSurePrompt(\''.base_url().$controller_config['script'].'/delete/{id}/{uriParameters}\');'
        );


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$controller_config["campos_form"] = array(

			array(
				'key'	=>'titulo',
				'label'	=>'Título',
				'type'	=>'form_input',
				'filter'=> true,
				'list'	=> true,
				'class'	=>'form-third label-up cl-b',
				'properties'=> array(
					'name'         => 'titulo',
					'id'           => 'titulo',
					'maxlength'    => '100'
				)
			),

			array(
				'key'	=>'descripcion',
				'label'	=>'Descripción',
				'type'	=>'form_textarea',
				'filter'=> true,
				'list'	=> true,
				'class'	=>'form-third label-up cl-b',
				'properties'=> array(
					'name'         => 'descripcion',
					'id'           => 'descripcion',
					'maxlength'    => '255',
					'rows'    => '4'
				)
			),

		);

		if($this->session->userdata('perfil')=='superadmin'){
			$controller_config["campos_form"] = array_merge(array(

				array(
					'key'	=>'seccion',
					'label'	=>'Sección ID',
					'type'	=>'form_input',
					'filter'=> true,
					'list'	=> true,
					'class'	=>'form-third label-up cl-b',
					'properties'=> array(
						'name'         => 'seccion',
						'id'           => 'seccion',
						'maxlength'    => '50'
					)
				)), $controller_config["campos_form"]);
		}

        $this->cargar_config( $controller_config );
    }
}
