<?php

Class Categorias extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "categorias";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "categorias";

		// Ordeno el listado
	    if(! isset($_GET['order'])){
	    	$_GET['order'] = array(
				'fecha' => 'DESC',
			);
	    }

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	'preview'	=>	base_url().'../categorias/{uri}?vp{uriParameters}',
        	'delete'	=>	'javascript:areYouSurePrompt(\''.base_url().$controller_config['script'].'/delete/{id}/{uriParameters}\');'
        );


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$controller_config['campos_form'] = array(

			array(
				'key'     =>'titulo',
				'label'   =>'Título',
				'type'    =>'form_input',
				'filter'  =>true,
				'list'    =>true,
				'class'   =>'form-third label-up',
				'properties'=> array(
					'name'      => 'titulo',
					'maxlength' => 100,
				)
			),

		);

        $this->cargar_config( $controller_config );
    }
}