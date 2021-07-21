<?php

Class Novedades extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "novedades";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "novedades";

		// Drag & drop
        $controller_config["ordenar"] = false;
        // $controller_config["csv_btn"] 	 = true;
        // $controller_config["paginator_results_per_page"] = 10;


		// Ordeno el listado
	    if(! isset($_GET['order'])){
	    	$_GET['order'] = array(
				'fecha' => 'DESC',
			);
	    }

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	// 'preview'	=>	base_url().'../cursos/{id}-{uri}',
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
				'class'	=>'form-quarter block',
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
				'filter'=>false,
				'list'	=>false,
				'class'	=>'form-quarter ',
				'properties'=> array(
					'id'   => 'fecha',
					'name' => 'fecha',
				)
			),

			array(
				'key'     =>'titulo',
				'label'   =>'Título',
				'type'    =>'form_input',
				'filter'  =>true,
				'list'    =>true,
				'class'   =>'form-half block',
				'properties'=> array(
					'name'      => 'titulo',
					'maxlength' => 100,
				)
			),
			

			array(
				'key'     =>'bajada',
				'label'   =>'Bajada',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'class'   =>'form__full',
				'properties'=> array(
					'name'      => 'bajada',
					'maxlength' => 200,
					'rows' => 4,
				)
			),

			array(
				'key'     =>'cuerpo',
				'label'   =>'Cuerpo',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'class'   =>'form__full',
				'properties'=> array(
					'name'      => 'cuerpo',
					'rows' => 15,
					'class' => 'tinymce-basico'
				)
			),

			array(
				'titulo'    =>'Fotos Izquierda',
				'key'    =>'foto_id',
				'label'  =>'Foto 1',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-third label-up',
				'comentario' => 'Medidas mínimas 235x285 (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_id',
					'name'     => 'foto_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'235','height'=>'285', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),

			array(
				'key'    =>'foto_2_id',
				'label'  =>'Foto 2',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-third label-up',
				'comentario' => 'Medidas mínimas 235x285 (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_2_id',
					'name'     => 'foto_2_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'235','height'=>'285', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),

			array(
				'titulo'    =>'Fotos Derecha',
				'key'    =>'foto_3_id',
				'label'  =>'Foto 3',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-third label-up',
				'comentario' => 'Medidas mínimas 235x190 (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_3_id',
					'name'     => 'foto_3_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'235','height'=>'190', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),

			array(
				'key'    =>'foto_4_id',
				'label'  =>'Foto 4',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-third label-up',
				'comentario' => 'Medidas mínimas 235x190 (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_4_id',
					'name'     => 'foto_4_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'235','height'=>'190', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),

			array(
				'key'    =>'foto_5_id',
				'label'  =>'Foto 5',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-third label-up',
				'comentario' => 'Medidas mínimas 235x190 (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_5_id',
					'name'     => 'foto_5_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'235','height'=>'190', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),

			
			// array(
			// 	'titulo'   =>'SEO',
			// 	'key'     =>'meta_titulo',
			// 	'label'   =>'Título',
			// 	'type'    =>'form_input',
			// 	'filter'  =>null,
			// 	'list'    =>false,
			// 	'class'   =>'form-third block',
			// 	'comentario'   =>'Por defecto se usa el título de la novedad.',
			// 	'properties'=> array(
			// 		'name'      => 'meta_titulo',
			// 		'maxlength' => 70,
			// 	)
			// ),

			// array(
			// 	'key'     =>'meta_descripcion',
			// 	'label'   =>'Descripción',
			// 	'type'    =>'form_textarea',
			// 	'filter'  =>null,
			// 	'list'    =>false,
			// 	'class'   =>'form-third block',
			// 	'comentario'   =>'Por defecto se usa la bajada de la novedad.',
			// 	'properties'=> array(
			// 		'name'      => 'meta_descripcion',
			// 		'maxlength' => 155,
			// 		'rows' => 3,
			// 	)
			// ),
		);

        $this->cargar_config( $controller_config );
    }
}