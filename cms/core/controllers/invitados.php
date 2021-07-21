<?php

Class Invitados extends MY_Controller {

    function __construct(){

        parent::__construct();


	     /////////////////////
	    /// Configuración ///
	   /////////////////////

		$controller_config["script"] = "invitados";
		$controller_config["model"] 	= $controller_config["script"]."_model";


	     //////////////////////////////
	    /// Opciones de las vistas ///
	   //////////////////////////////

        // Nombre del listado
		$controller_config["name"] = "invitados";

		// Drag & drop
        $controller_config["ordenar"] = true;

		// Ordeno el listado
	    // if(! isset($_GET['order'])){
	    // 	$_GET['order'] = array(
		// 		'fecha' => 'DESC',
		// 	);
	    // }

        // Acciones
        $controller_config['actions_list'] = array(
        	'editar'	=>	base_url().$controller_config['script'].'/edit/{id}/{uriParameters}',
        	'preview'	=>	base_url().'../invitados/{id}-{uri}',
        	'delete'	=>	'javascript:areYouSurePrompt(\''.base_url().$controller_config['script'].'/delete/{id}/{uriParameters}\');'
        );


	 	 ///////////////////////////////////
	    /// Configuración de los campos ///
	   ///////////////////////////////////

		// Opciones de filtrado
		$campos_form  = array(

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
				'class'  =>'form-third label-up',
				'comentario' => 'Medidas mínimas 465x220 (ancho x alto)',
				'properties'=> array(
					'id'       => 'foto_id',
					'name'     => 'foto_id',
					'quantity' =>1,
					'sizes'    =>array(
						array('width'=>'465','height'=>'220', 'method'=>'crop'),
					),
				'siempre_jpg' => true,
				'margenes'    => false,
				'controller'  => $controller_config["script"]
				)
			),

			array(
				'key'     =>'video_id',
				'label'   =>'video',
				'comentario'    =>'Insertar solo el codigo de Vimeo. Ej: cZMb8pz9z50',
				'type'    =>'form_input',
				'filter'  =>false,
				'list'    =>false,
				'class'   =>'form-half block',
				'properties'=> array(
					'name'      => 'video_id',
					'maxlength' => 100,
				)
			),

			array(
				'key'     =>'titulo',
				'label'   =>'Nombre del invitado',
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
                'key'     =>'pais',
                'label'   =>'Pais de origen',
                'type'    =>'form_input',
                'filter'  =>false,
                'list'    =>false,
                'idiomas'=>true,
                'class'   =>'form-half',
                'properties'=> array(
                    'name'      => 'pais',
                    'maxlength' => 100,
                )
            ),

            array(
				'key'     =>'cuerpo',
				'label'   =>'Descripción',
				'type'    =>'form_textarea',
				'filter'  =>null,
				'list'    =>false,
				'idiomas'=>true,
				'class'   =>'form-half label-up',
				'properties'=> array(
					'name'      => 'cuerpo',
					'rows' => 15,
					'class' => 'tinymce-basico'
				)
			),
            
            
			array(
				'titulo'     =>'Links externos',
				'key'     =>'ig',
				'label'   =>'Link de Instagram',
				'type'    =>'form_input',
				'filter'  =>false,
				'list'    =>false,
				'class'   =>'form-half block',
				'properties'=> array(
					'name'      => 'ig',
					'maxlength' => 100,
				)
            ),
            
			array(
				'key'     =>'web',
				'label'   =>'URL sitio web',
				'type'    =>'form_input',
				'filter'  =>false,
				'list'    =>false,
				'class'   =>'form-half',
				'properties'=> array(
					'name'      => 'web',
					'maxlength' => 100,
				)
			),

			array(
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
				'titulo'   =>'SEO',
				'key'     =>'meta_titulo',
				'label'   =>'Título',
				'type'    =>'form_input',
				'filter'  =>null,
				'list'    =>false,
				'idiomas'=>true,
				'class'   =>'form-half label-up',
				'comentario'   =>'Por defecto se usa el título de la novedad.',
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
				'idiomas'=>true,
				'class'   =>'form-half label-up',
				'comentario'   =>'Por defecto se usa la bajada de la novedad.',
				'properties'=> array(
					'name'      => 'meta_descripcion',
					'maxlength' => 155,
					'rows' => 3,
				)
			),
		);

        $aux_campos_form = array();
		$idiomas = array(
			'es' => 'Español',
			'en' => 'Inglés',	
			);
		foreach($campos_form as $campo){
			if(isset($campo['idiomas']) AND $campo['idiomas']){
				$primero = true;
				foreach($idiomas as $cod_idioma => $nombre_idioma){
					$campo_aux = $campo;
					$campo_aux['class'] .= $primero ? ' cl-l' : '';
					$campo_aux['key'] = $campo['key'].'_'.$cod_idioma;
					$campo_aux['filter'] = ($cod_idioma=='es') ? $campo['filter'] : false;
					$campo_aux['list'] = ($cod_idioma=='es') ? $campo['list'] : false;
					
					if(! empty($campo['label'])){
						$campo_aux['label'] = $campo['label'].' en '.$nombre_idioma;
					}
					if(isset($campo['titulo'])){
						if($cod_idioma=='es'){
              $campo_aux['titulo'] = $campo['titulo'];
            }else{
              unset($campo_aux['titulo']);
            }
					}
					if(isset($campo['properties']['name'])){
						$campo_aux['properties']['name'] =  $campo_aux['key'];
					}
					if(isset($campo['id'])){
						$campo_aux['properties']['id'] =  $campo_aux['key'];
					}
					$aux_campos_form[] = $campo_aux;
					$primero = false;
				}
			}else{
				$aux_campos_form[] = $campo;
			}
		}
		unset($campos_form);
        $controller_config['campos_form'] = $aux_campos_form;


        $this->controller_config = $controller_config;
    }
}
