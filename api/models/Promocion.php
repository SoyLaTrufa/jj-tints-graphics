<?php

Class Promocion extends Base{

	public $id;
	public $titulo;
	public $uri;
	public $fecha;

	public function url(){
		return $this->url = url('ficha-promociones', $this);
	}

	public function foto(){
		return $this->foto = Foto::obtener(array('id' => $this->foto_id), array(
		 	'medidas' => array(
		 		array(
		 			'ancho' 		=> 740,
		 			'alto'  		=> 500,
		 			'src_default'  	=> '740x500.jpg',
				),
		 		array(
		 			'ancho' 		=> 360,
		 			'alto'  		=> 240,
		 			'src_default'  	=> '360x240.jpg',
				),
		 	),
		 	'controlador' => array(
				'nombre' => 'promociones',
				'id'     => $this->id
		 	)
		));
	}

	/** 
	* Constructor
	* @param array Recibe todos los datos con los que se va a construir el objeto
	*/
	function __construct($datos){

		$this->id = $datos->id;

		$this->uri =  $datos->uri;
		$this->foto_id = $datos->foto_id;

		$campos_idioma = array('titulo', 'bajada', 'cuerpo', 'meta_titulo', 'meta_descripcion');
		

		foreach($campos_idioma as $campo){
			foreach(json_decode(IDIOMA_ENABLED) as $idioma){
				$campo_idioma = $campo."_".$idioma;
				$this->$campo_idioma = $datos->$campo_idioma;
			}
			$this->$campo = $this->$campo();
		}


		$fecha = explode('-',$datos->fecha);
		if(!empty($fecha)){
				// $this->fecha = IDIOMA=='en'?$datos->fecha:$fecha[2].' de '.$fecha[1].' de '.$fecha[0];
				$this->fecha = IDIOMA=='en'?$datos->fecha:$fecha[2].' de mayo de '.$fecha[0];
				$this->fecha_texto = IDIOMA=='en'?@date('jS F Y',$datos->fecha):Promocion::fechaEs($fecha);
			}else{
				$this->fecha = '';
				$this->fecha_texto = '';
			}


		$this->meta_titulo = $this->meta_titulo ? $this->meta_titulo : $this->titulo;
		$this->meta_descripcion = $this->meta_descripcion ? $this->meta_descripcion : $this->descripcion;
	}



	/* 
	* SQL por defecto
	* Defino los valores por defecto para todas las cláusulas
	*/
	// protected static function sql_defecto($tabla, $clausula, $sentencias){
	// 	$sql = parent::sql_defecto($tabla, $clausula, $sentencias);
	// 	switch($clausula){
	// 		case 'order' :
	// 			$sql = 'ORDER BY '.(!empty($sentencias) ? implode(',', $sentencias).',' : '').' '.$tabla.'.fecha DESC, '.$tabla.'.id DESC';
	// 			break;
	// 	}

	// 	return $sql;
	// }

	public function titulo($idioma = IDIOMA){
		if(trim($this->{'titulo_'.$idioma})=='' ){
			$idioma = IDIOMA_DEFAULT;
		}
		return $this->{'titulo_'.$idioma};
	}

	public function bajada($idioma = IDIOMA){
		if(trim($this->{'bajada_'.$idioma})=='' ){
			$idioma = IDIOMA_DEFAULT;
		}
		return $this->{'bajada_'.$idioma};
    }
    
	public function cuerpo($idioma = IDIOMA){
		if(trim($this->{'cuerpo_'.$idioma})=='' ){
			$idioma = IDIOMA_DEFAULT;
		}
		return $this->{'cuerpo_'.$idioma};
    }

	public function meta_titulo($idioma = IDIOMA){
		if(trim($this->{'meta_titulo_'.$idioma})=='' ){
			$idioma = IDIOMA_DEFAULT;
		}

		return $this->{'meta_titulo_'.$idioma};
	}

	public function meta_descripcion($idioma = IDIOMA){
		if(trim($this->{'meta_descripcion_'.$idioma})=='' ){
			$idioma = IDIOMA_DEFAULT;
		}

		return $this->{'meta_descripcion_'.$idioma};
	}


	/**
	* Obtener elementos filtrados desde la BD
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*/
	static function obtener( $filtros = array('todas' => ''), $dato = null, $modelo = '', $tabla = ''){
		
		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;
		if(! array_key_exists('vp', $filtros)){
			$filtros = array_merge($filtros, array('activa' => 1));
		}

		return parent::obtener($filtros, $dato, 'Promocion', 'promociones');
	}

	static function fechaEs($fecha){
		$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		$fecha = array_map(function($fecha) { return (int)$fecha;}, $fecha);
		return $fecha[2].' de '.$meses[$fecha[1]] . ' '.$fecha[0];
	}

	
}