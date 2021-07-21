<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>core/css/theme_synapsis.css?v=<?= filemtime(APPPATH.'css/theme_synapsis.css')?>" /> -->
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,900;1,400&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>core/sass/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>core/sass/newstyles.css">
	<link href="<?php echo base_url() ?>core/js/fileuploader/fileuploader.css" rel="stylesheet" type="text/css" />

	<link rel="icon" href="<?php echo base_url() ?>core/css/img/favicon.png" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo base_url() ?>core/css/img/favicon.png" type="image/x-icon" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
	<script src="https://kit.fontawesome.com/5449ca1ae9.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url() ?>core/js/colorpicker/css/colorpicker.css" />
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/jquery.min.js"></script>
	<script> $.ajaxSetup({ cache:false }); </script>
	<script>
		// Variables globales
		var DOCUMENT_ROOT = '<?=base_url()?>';
    	var CONTROLLER    = '<?=$this->router->fetch_class()?>';
    	var RETURN_URL    = '<?=isset($return_url) ? $return_url.$uriParameters : ''?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/gallery.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/images.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/fileuploader/fileuploader.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/colorpicker/js/colorpicker.js"></script>

	<script src="https://use.fontawesome.com/f8732745ec.js"></script>

	<!-- Jcrop -->
	<script src="<?php echo base_url() ?>core/js/jcrop/js/jquery.Jcrop.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>core/js/jcrop/css/jquery.Jcrop.css" type="text/css" />

	<script type="text/javascript" src="<?php echo base_url() ?>core/js/functions.js?v=<?= filemtime(APPPATH.'js/functions.js')?>"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>core/js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/tinymce/tinymce.min.js"></script>

	<!-- Calendario -->
	<script type="text/javascript" src="<?php echo base_url() ?>core/js/jquery-ui.js"></script>
	<script>
		/* Inicialización en español para la extensión 'UI date picker' para jQuery. */
		/* Traducido por Vester (xvester@gmail.com). */
		(function( factory ) {
			if ( typeof define === "function" && define.amd ) {

				// AMD. Register as an anonymous module.
				define([ "../datepicker" ], factory );
			} else {

				// Browser globals
				factory( jQuery.datepicker );
			}
		}(function( datepicker ) {

		datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '&#x3C;Ant',
			nextText: 'Sig&#x3E;',
			currentText: 'Hoy',
			monthNames: ['enero','febrero','marzo','abril','mayo','junio',
			'julio','agosto','septiembre','octubre','noviembre','diciembre'],
			monthNamesShort: ['ene','feb','mar','abr','may','jun',
			'jul','ago','sep','oct','nov','dic'],
			dayNames: ['domingo','lunes','martes','miércoles','jueves','viernes','sábado'],
			dayNamesShort: ['dom','lun','mar','mié','jue','vie','sáb'],
			dayNamesMin: ['D','L','Ma','Mi','J','V','S'],
			weekHeader: 'Sm',
			dateFormat: 'yy/mm/dd',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
		datepicker.setDefaults(datepicker.regional['es']);

		return datepicker.regional['es'];

		}));
	</script>
	<link rel="stylesheet" href="<?php echo base_url() ?>core/css/jqueryui/jquery-ui.css">


	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
	<![endif]-->
</head>

	

<body class="s_cms">