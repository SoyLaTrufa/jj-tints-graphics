<?php

Class Promociones extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "promociones";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "promociones";

		// Drag & drop
        $controller_config["ordenar"] = true;
        // $controller_config["csv_btn"] 	 = true;
        // $controller_config["paginator_results_per_page"] = 10;


		// Ordeno el listado
	    // if(! isset($_GET['order'])){
	    // 	$_GET['order'] = array(
		// 		'fecha' => 'DESC',
		// 	);
	    // }

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	'preview'	=>	base_url().'../promociones/{id}-{uri}',
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
				'key'    =>'foto_id',
				'label'  =>'Foto',
				'type'   =>'jcropimage',
				'filter' =>null,
				'list'   =>true,
				'class'  =>'form-third block',
				'comentario' => 'Medidas mínimas 740x500px (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_id',
					'name'     => 'foto_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'740','height'=>'500', 'method'=>'crop'),
						array('width'=>'360','height'=>'240', 'method'=>'crop'),
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
				'idiomas' =>true,
				'class'   =>'form-half',
				'properties'=> array(
					'name'      => 'titulo',
					'maxlength' => 100,
				)
			),

			array(
				'key'     =>'bajada',
				'label'   =>'Bajada',
				'type'    =>'form_input',
				'filter'  =>null,
				'list'    =>false,
				'idiomas' =>true,
				'class'   =>'form-half',
				'properties'=> array(
					'name'      => 'bajada',
					'maxlength' => 100,
				)
			),
			
			array(
				'key'     =>'cuerpo',
				'label'   =>'Cuerpo',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'idiomas' =>true,
				'class'   =>'form-half',
				'properties'=> array(
					'name'      => 'cuerpo',
					'rows' => 20,
					'class' => 'tinymce-basico'
				)
            ),


			array(
				'titulo'   =>'SEO',
				'key'	=>'fecha',
				'label'	=>'Fecha',
				'type'	=>'date',
				'filter'=>false,
				'list'	=>false,
				'class'	=>'form-quarter block',
				'properties'=> array(
					'id'   => 'fecha',
					'name' => 'fecha',
				)
			),

			
			array(
				// 'titulo'   =>'SEO',
				'key'     =>'meta_titulo',
				'label'   =>'Título SEO',
				'type'    =>'form_input',
				'filter'  =>null,
				'list'    =>false,
				'idiomas' =>true,
				'class'   =>'form-half',
				'comentario'   =>'Por defecto se usa el título de la promoción.',
				'properties'=> array(
					'name'      => 'meta_titulo',
					'maxlength' => 70,
				)
			),

			array(
				'key'     =>'meta_descripcion',
				'label'   =>'Descripción SEO',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'idiomas' =>true,
				'class'   =>'form-half',
				'comentario'   =>'Por defecto se usa la bajada de la promoción.',
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