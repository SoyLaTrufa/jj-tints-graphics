<?php

include_once('core/Formulario.php');

$form_asesoria = new Formulario(
	array(
		'destinatarios' => array(
			Config::obtener('empresa')->email,
			'anthoni97@gmail.com'
		),
		'asunto' 	=> 'Asesoria  - '.Config::obtener('empresa')->nombre,
		'remitente' => array(
			// 'nombre' => isset($_POST['nombre']) ? $_POST['nombre'] : '',
			// 'email' => isset($_POST['email']) ? $_POST['email'] : '', // Email ficticio
			'nombre' => 'Web '.Config::obtener('empresa')->nombre,
			'email' => 'web@jjpty.com' // Email ficticio
		),
		'responder_a' => array(
			'nombre' => 'nombre',
			// 'apellido' => isset($_POST['apellido']) ? $_POST['apellido'] : '',
			'email' => 'email'
		),
		'opciones' => array(
			'debug' => false,
			'guardar_contacto' => false,
			'guardar_form' => false,
			'guardar_doppler' => false,
		)
	)
);


$form_asesoria->agregarCampos(
	array(

		array(
			'name' 		=> 'nombre',
			'label' 	=> 'Nombre',
			'tipo' 		=> 'text',
			'validar' 	=> array('requerido'),
		),


		array(
			'name' 		=> 'tel',
			'label' 	=> 'Teléfono',
			'tipo' 		=> 'tel',
		),

		array(
			'name' 		=> 'email',
			'label' 	=> 'Email',
			'tipo' 		=> 'email',
			'validar' 	=> array('formato'),
		),

		array(
			'name' 		=> 'consulta',
			'label' 	=> 'Consulta',
			'tipo' 		=> 'textarea',
			'validar' 	=> array('requerido'),
		),


	)
);

if( isset($_POST['enviar_asesoria']) ){
	$form_asesoria->enviar();
}

// if( isset($_POST['enviar_contacto']) ){
// 	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

//       // Build POST request:
//       $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
//       $recaptcha_secret = '6LchiekUAAAAALH3GfzNnmDykCyMX2obw6G-66aa';
//       $recaptcha_response = $_POST['recaptcha_response'];

//       // Make and decode POST request:
//       $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
//       $recaptcha = json_decode($recaptcha);
//       // print_r($recaptcha);

//       // Take action based on the score returned:
//       if ($recaptcha->score >= 0.5) {
//           // echo 'humano';
// 		$form_asesoria->enviar();
//       } else {
//           // echo 'bot';
//       }
//   }
// }