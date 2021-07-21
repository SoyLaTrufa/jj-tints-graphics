<?php

class Pdf extends MY_Controller {

	var $controller_config;

    function __construct(){

        parent::__construct();

		$this->controller_config["script"] = 'pdf';

		// Incluyo las archivos necesarios para obtener los datos y generar el PDF
		//$include_path = get_include_path();
		//include_once( APPPATH.'../../includes/config/config.php' );
		//set_include_path( $include_path );

		// Solo por compatibilidad con el código del sitio
		define('IDIOMA_DEFAULT', reset(array_keys(MY_Controller::$idiomas)));
		define('IDIOMA_ENABLED', json_encode(array_keys(MY_Controller::$idiomas)));
		define('IDIOMA', IDIOMA_DEFAULT);

		define('INCLUDE_PATH', APPPATH.'../../');

		include_once( BASE_PATH.'../includes/config/Empresa.php' );
		// include_once( BASE_PATH.'includes/helpers/url.php' );
		// include_once( BASE_PATH.'includes/helpers/cadenaUrl.php' );
		include_once( BASE_PATH.'../includes/models/Modelo.php');
		include_once( BASE_PATH.'../includes/models/Categoria.php');

		$this->load->helper('url');
	}


	function index(){

        $categorias = Categoria::obtener( 'todas' );
        $opciones = '';
        foreach($categorias as $c){
			$opciones .= '<option value="'.$c->id.'">'.$c->nombre.'</option>';
		}

		// Preparo la vista
		$this->load->view( 'includes/header', $this->_generar_data('cabecera') );
		$this->load->view( 'menu', $this->_generar_data('menu') );
        $this->load->view( 'pdf_generar', array(
				'current_script' => $this->controller_config["script"],
				'opciones'	=> $opciones
			));
		$this->load->view( 'includes/footer', $this->_generar_data('footer') );

	}

	function generar_pdf(){

		$id = $this->input->post('id');
		if(! $id){
			exit('Hubo un problema.');
			return false;
		}


		// Preparo los datos para llenar el template
		$categoria = Categoria::obtener('id', $id);
		$nombre_pdf = url_title($categoria->nombre,'-', true).'.pdf';
		$url = BASE_URL.'../pdf/listado-productos/'.urlencode($nombre_pdf).'?v='.time();

		$ruta_pdf   = BASE_PATH.'../pdf/listado-productos/'.$nombre_pdf;
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';

		// Obtengo el HTML
		ob_start();
		include(BASE_PATH.'../pdf/listado-productos/template/index.php');
		$pdf = ob_get_contents();
		ob_end_clean();

		if ( get_magic_quotes_gpc() ){
		  $pdf = stripslashes($pdf);
		}

		// Creo el PDF
		$dompdf = new DOMPDF();

		$dompdf->load_html( $pdf /*filter_var($pdf, FILTER_UNSAFE_RAW, FILTER_FLAG_ENCODE_LOW|FILTER_FLAG_STRIP_HIGH)*/ );
		$dompdf->set_paper('a4');
		$dompdf->render();

		// Guardo
		$output = $dompdf->output();
    	file_put_contents($ruta_pdf, $output);

		// Preparo la vista
        $data = array(
        	'header'=>	array(
        		'nombre' => $this->session->userdata('nombre')
        	),

        	'menu'	=>	array(
        		'current_script' => 'pdf'
        	),

        	'add'	=>	array(
				'current_script' => 'pdf',
				'archivo' 		 => $nombre_pdf,
				'url'			 => $url,
				'ruta_pdf' => $ruta_pdf
			)
        );

		$this->load->view( 'includes/header', $this->_generar_data('cabecera') );
		$this->load->view( 'menu', $this->_generar_data('menu') );
        $this->load->view( 'pdf_ver', array(
				'current_script' =>  $this->controller_config["script"],
				'archivo'        => $nombre_pdf,
				'url'            => $url,
				'ruta_pdf'       => $ruta_pdf
				));
		$this->load->view( 'includes/footer', $this->_generar_data('footer') );

	}
}