<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'productos');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>

<section class="productos">
	<div class="peliculas rojo">
		<a href="peliculas-control-solar.php"> <?= __('productos 0') ?></a>
		<video src="video/laminados.mp4" autoplay loop playsinline muted></video>
	</div>
	<div class="insumos">
		<a href="graficos-y-car-wrap.php"><?= __('productos 1') ?> </a>
		<video src="video/graficos.mp4" autoplay loop playsinline muted></video>
	</div>
	<div class="persianas rojo">
		<a href="toldos-y-persianas.php"><?= __('productos 2') ?></a>
		<video src="video/persianas.mp4" autoplay loop playsinline muted></video>
	</div>
	<div class="adhesivos">
		<a href="adhesivos-3m.php"><?= __('productos 3') ?></a>
		<video src="video/adhesivos.mp4" autoplay loop playsinline muted></video>
	</div>
</section>

<section class="banda-blanca">
	<a href="<?=url('contacto')?>"><img src="images/calc.png" alt=""></a>
	<a href="<?=url('contacto')?>"><h2><?= __('productos 4') ?></h2></a>
</section>
<?php include('whatsapp.php'); ?>
<?php include('footer.php'); ?>