<?php
/**
 * Fecha
 * Extiendo la clase DateTime para ajustar el idioma de la fecha formateada
 * @link https://www.php.net/manual/es/class.datetime.php
 */
class Fecha extends DateTime {

	static private $formatos = array(
		'es' => array(
			'F' => array(
				'Enero',
				'Febrero',
				'Marzo',
				'Abril',
				'Mayo',
				'Junio',
				'Julio',
				'Agosto',
				'Septiembre',
				'Octubre',
				'Noviembre',
				'Diciembre'
			),
			'M' => array(
				'Ene',
				'Feb',
				'Mar',
				'Abr',
				'May',
				'Jun',
				'Jul',
				'Ago',
				'Sep',
				'Oct',
				'Nov',
				'Dic',
			),
			'l' => array(
				'Lunes',
				'Martes',
				'Miércoles',
				'Jueves',
				'Viernes',
				'Sábado',
				'Domingo',
			),
		)
	);

    function format( $format ) {

        if( array_key_exists(IDIOMA, self::$formatos) AND array_key_exists($format, self::$formatos[ IDIOMA ])){
			return  self::$formatos[ IDIOMA ][ $format ][ $format=='l' ? $this->format('w')-1 : $this->format('n')-1 ];

		}else{
			return parent::format( $format );
		}
    }
}
