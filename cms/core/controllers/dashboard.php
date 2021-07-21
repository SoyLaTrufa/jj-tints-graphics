<?php

Class Dashboard extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "dashboard";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "dashboard";

		// Drag & drop
        $controller_config["ordenar"] = true;
        // $controller_config["csv_btn"] 	 = true;
        // $controller_config["paginator_results_per_page"] = 10;


        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	'preview'	=>	base_url().'../novedades/{uri}?vp{uriParameters}',
        	'delete'	=>	'javascript:areYouSurePrompt(\''.base_url().$controller_config['script'].'/delete/{id}/{uriParameters}\');'
        );


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$controller_config['campos_form'] = array(

			array(
				'titulo'     =>'titulo',
				'key'     =>'titulo',
				'label'   =>'Título',
				'type'    =>'form_input',
				'filter'  =>true,
				'list'    =>true,
				'class'   =>'form-half ',
				'properties'=> array(
					'name'      => 'titulo',
					'maxlength' => 11,
				)
			),
			
		);

        $this->cargar_config( $controller_config );
    }
}