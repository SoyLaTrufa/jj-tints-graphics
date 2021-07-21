<?php

Class Ayudas extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "ayudas";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "ayudas";

		// Ordeno el listado
	    if(! isset($_GET['order'])){
	    	$_GET['order'] = array(
				'fecha' => 'DESC',
			);
	    }

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	'preview'	=>	base_url().'../ayudas/{uri}?vp{uriParameters}',
        	'delete'	=>	'javascript:areYouSurePrompt(\''.base_url().$controller_config['script'].'/delete/{id}/{uriParameters}\');'
        );


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$controller_config['campos_form'] = array(

			array(
				'key'	=>'activa',
				'label'	=>'Activa',
				'type'	=>'form_checkbox',
				'filter'=>null,
				'list'	=>true,
				'class'	=>'form-quarter label-up cl-b',
				'properties'=> array(
					'name'    => 'activa',
					'value'   => 1,
					'checked' => 'checked',
				)
			),

			array(
				'key'	=>'fecha',
				'label'	=>'Fecha',
				'type'	=>'date',
				'filter'=>'=',
				'list'	=>true,
				'class'	=>'form-quarter label-up cl-b',
				'properties'=> array(
					'id'   => 'fecha',
					'name' => 'fecha',
				)
			),

			array(
				'key'    =>'foto_id',
				'label'  =>'Foto',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-full label-up ',
				'comentario'  =>'Medidas: 360px x 300px (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_id',
					'name'     => 'foto_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'168','height'=>'240', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),


			array(
				'key'     =>'titulo',
				'label'   =>'Título',
				'type'    =>'form_input',
				'filter'  =>true,
				'list'    =>true,
				'class'   =>'form-third label-up',
				'properties'=> array(
					'name'      => 'titulo',
					'maxlength' => 255,
				)
			),


			array(
				'key'     =>'cuerpo',
				'label'   =>'Cuerpo',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'class'   =>'form-full label-up cl-b',
				'properties'=> array(
					'name'      => 'cuerpo',
					'rows' => 15,
					'class' => 'tinymce-basico'
				)
			),

			array(
				'key'    =>'archivo_id',
				'label'  =>'PDF',
				'type'   =>'form_upload',
				'filter' =>null,
				'class'  =>'form-half label-up',
				'properties'=> array(
					'name'          => 'archivo_id',
					'allowed_types' => 'pdf',
					'thumbnail' => false,
				)
			),

			array(
				'titulo'   =>'Metas',
				'key'     =>'meta_titulo',
				'label'   =>'Título',
				'type'    =>'form_input',
				'filter'  =>null,
				'list'    =>false,
				'class'   =>'form-third label-up cl-b',
				'comentario'   =>'Por defecto se usa el título.',
				'properties'=> array(
					'name'      => 'meta_titulo',
					'maxlength' => 70,
				)
			),

			array(
				'key'     =>'meta_descripcion',
				'label'   =>'Descripción',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'class'   =>'form-third label-up cl-b',
				'comentario'   =>'Por defecto se usa el cuerpo.',
				'properties'=> array(
					'name'      => 'meta_descripcion',
					'maxlength' => 155,
					'rows' => 3,
				)
			),
		);

        $this->cargar_config( $controller_config );
    }
}