<?php

Class _Plantilla extends Base{

	public function url(){
		return $this->url = url('producto', array(
			'id' => $this->id,
			'uri' => $this->uri
			));
	}

	public function foto_portada(){
		return $this->foto_portada = Foto::obtener(array('id'=>$this->foto_portada_id), array(
			'medidas' => array(
				array(
					'ancho' 		=> 1920,
					'alto'  		=> '458',
					'src_default'  	=> '1920x458.jpg',
				),
				array(
					'ancho' 		=> 458,
					'alto'  		=> 458,
					'src_default'  	=> '458x458.png',
				),
			),
			'controlador' => array(
				'nombre' => 'productos',
				'id' 	=> $this->id
			),
		));
	}

	public function galeria(){
		return $this->galeria = Foto::obtener(array('galeria'=>$this->galeria_id), array(
			'medidas' => array(
				array(
					'ancho' 		=> 443,
					'alto'  		=> 443,
					'src_default'  	=>'',
				),
				array(
					'ancho' 		=> 1000,
					'alto'  		=> 600,
					'src_default'  	=> false,
				),
			),
			'controlador' => array(
				'nombre' => 'productos',
				'id' 	=> $this->id
			),
		));
	}

	public function tips(){
		$tips = array();
		for ($i=1; $i<=3; $i++) {
			$tip = 'tip'.$i.'_id';
			if($this->$tip){
				if($archivo = Archivo::obtener('id', $this->$tip)){
					if(!$archivo->titulo){
						$archivo->titulo = 'Tip #'.$i;
					}
					$tips[] = $archivo;
				}
			}
		}
		return $this->tips = $tips;
	}

	function catalogo(){
		$catalogo = Archivo::obtener('id', $this->catalogo_id);
		if($catalogo AND !$catalogo->titulo){
			$catalogo->titulo = 'Catálogo - '. $this->nombre;
		}
		return $this->catalogo = $catalogo;
	}

	function prod_relacionados(){
		return $this->prod_relacionados = Producto::obtener('relacionados', $this->id);
	}

	/**
	* Obtiene elementos filtrados desde la base de datos
	*/
	public static function obtener( $filtros = array('todos' => ''), $dato = null, $modelo = '', $tabla = ''){

		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;

		if(! array_key_exists('vp', $filtros)){
			$filtros = array_merge(array('activo' => true), $filtros);
		}

		return parent::obtener($filtros, $dato, 'Producto', 'productos');
	}


	/**
	* Constructor
	*/
	protected function __construct($datos){
		$this->id = $datos->id;
		$this->activo = $datos->activo;
		$this->destacado = $datos->destacado;

		$this->categoria = $datos->categoria;
		$this->nombre    = $datos->nombre;
		$this->descripcion_corta = $datos->descripcion_corta;

		// Solo para los productos relacionados a una idea
		$this->detalle = isset($datos->detalle) ? $datos->detalle : '';

		// Solo para los productos relacionados a un exhibidor
		$this->cantidad = isset($datos->cantidad) ? $datos->cantidad : '';

		$this->descripcion  = nl2br($datos->descripcion);
		$this->presentacion = nl2br($datos->presentacion);
		$this->usos         = nl2br($datos->usos);
		$this->aplicacion   = nl2br($datos->aplicacion);

		$this->foto_listado_id = $datos->foto_listado_id;
		$this->foto_portada_id = $datos->foto_portada_id;
		$this->colores_id = $datos->colores_id;
		$this->galeria_id = $datos->galeria_id;
		$this->catalogo_id = $datos->catalogo_id;
		$this->folleto_id = $datos->folleto_id;
		$this->tip1_id = $datos->tip1_id;
		$this->tip2_id = $datos->tip2_id;
		$this->tip3_id = $datos->tip3_id;

		$fecha = new Fecha($datos->fecha);
		$this->fecha = $fecha->format('j').' de '.$fecha->format('F').' '.$fecha->format('Y');

		$this->cargar_traducciones(array(
			'extra',
			'alojamiento',
			'ciudad',
			'titulo',
			'business_type',
			'job_title',
			'descripcion',
			'requisitos',
			'fecha_inicio',
			'fecha_fin',
			'salario_hs'
		), $datos);
	}

	// Agrego saltos de línea a algunas propiedades y a sus traducciones
	protected function formatear_propiedad($propiedad_nombre, $propiedad_valor){
		if(in_array($propiedad_nombre, array(
			'requisitos_es',
			'requisitos_en',
			'descripcion_es',
			'descripcion_en',
			'extra_es',
			'extra_en',
			))){
			$propiedad_valor = nl2br($propiedad_valor);
		}
		$this->traducciones[$propiedad_nombre] = $propiedad_valor;
	}


	/**
	* Construye el SQL para los distintos filtros
	*/
	protected static function filtro($tabla, $tipo, $dato = null){
		$filtro = parent::filtro($tabla, $tipo, $dato);
		switch($tipo){

			case 'categoria':
				$dato = DB::obtener()->real_escape_string($dato);
				$filtro = array(
					'where'  => $tabla.'.categoria = "'.$dato.'"',
				);
				$filtro['order'] = $tabla.'.orden ASC';
				break;

			case 'nuevo':
			case 'nuevos':
				$filtro = array(
					'where'  => $tabla.'.nuevo = 1',
					'order'  => $tabla.'.orden2 ASC',
				);
				break;

			case 'relacionados':
				$filtro = array(
					'from'  => 'JOIN productos_relacionados ON productos_relacionados.relacionado_id = '.$tabla.'.id',
					'where'  => 'productos_relacionados.producto_id = '.intval($dato),
					'order'  => 'productos_relacionados.orden ASC',
				);
				break;

			case 'exhibidor':
				$filtro = array(
					'select'  => 'exhibidores_productos.cantidad',
					'from'  => 'JOIN exhibidores_productos ON exhibidores_productos.producto_id = '.$tabla.'.id',
					'where'  => 'exhibidores_productos.exhibidor_id = '.intval($dato),
				);
				break;
			case 'palabra':
				$palabra = DB::obtener()->real_escape_string(mb_strtolower($dato, 'UTF-8'));
				$filtro = array(
					'where' => 'LOWER('.$tabla.'.nombre) LIKE "%'. $palabra .'%"',
				);
				break;
		}

		return $filtro;
	}


	/**
	* Define el SQL por defecto para cada cláusula
	* Filtro productos por productos activos
	*/
	protected static function sql_defecto($tabla, $clausula, $sentencias){
		switch($clausula){
			case 'where' :
				$sentencias[] = $tabla.'.activo = 1';
				break;

			case 'order' :
				$sentencias[] =  $tabla.'.nombre ASC';
				break;
		}
		return parent::sql_defecto($tabla, $clausula, $sentencias);
	}

}