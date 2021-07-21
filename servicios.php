<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'servicios');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>

<section class="servicios">
	<div class="cont-1300">
		<div class="mod">
			<div class="img">
			<img src="images/servicios/asesoria.jpg" alt="Asesoria">
		</div>
		<div class="texto">
			<h3><img src="images/servicios/ico1.png" alt=""><?= __('servicios 0') ?></h3>
			<p><?= __('servicios 1') ?></p>
			<a class=" popup-modal" href="#forms" data-effect="mfp-zoom-in"><?= __('servicios 12') ?></a>
		</div>
		</div>
		<div class="mod second">
			
		<div class="texto">
			<h3><img src="images/servicios/ico2.png" alt=""><?= __('servicios 2') ?></h3>
			<p><?= __('servicios 3') ?></p>
			<a class=" popup-modal" href="#forms1" data-effect="mfp-zoom-in"><?= __('servicios 12') ?></a>
		</div>
		<div class="img">
			<img src="images/servicios/install.png" alt="instalacion papel ahumado">
		</div>
		</div>
		<div class="mod">
			<div class="img">
			<img src="images/servicios/detailing.jpg" alt="detailing car">
		</div>
		<div class="texto">
			<h3><img style="width: 75px" src="images/home/detailing-red.png" alt=""><?= __('servicios 4') ?></h3>
			<p><?= __('servicios 5') ?></p>
			<a class=" popup-modal" href="#forms2" data-effect="mfp-zoom-in"><?= __('servicios 12') ?></a>
		</div>
		</div>
	</div>
</section>

<section class="banda-roja">
	<a href="<?=url('productos')?>"><img src="images/empresa/11.png" alt=""></a>
	<a href="<?=url('productos')?>"><h2><?= __('servicios 6') ?></h2></a>
</section>


<div id="forms" class="mfp-hide white-popup-block mfp-with-anim" >
	<div class="title">
		<h1><?= __('servicios 0') ?>
		</h1>
	</div>
	<div class="form-cont" >
			<?php include(API_PATH.'forms/servicios.php'); ?>
			 <?php echo $form_asesoria->mensaje_estado ?>
			<?php if ($form_asesoria->estado != 'ok') { ?>
		<form method="post" action="<?=BASE_URL?>servicios#forms" >
			<div class="mod">
				
				<div class="content-form">
					<label for="nombre" class="sr-only"></label>
					<input type="text" placeholder="<?= __('servicios 7') ?>" name="nombre" id="nombre"  value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''?>">
				</div>
				<div class="content-form">
					<label for="email" class="sr-only"></label>
					<input type="email" placeholder="<?= __('servicios 8') ?>" name="email" id="email"  value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
				</div>
				<div class="content-form">
					<label for="tel" class="sr-only"></label>
					<input type="tel" placeholder="<?= __('servicios 9') ?>" name="tel" id="tel" value="<?= isset($_POST['tel']) ? $_POST['tel'] : ''?>">
				</div>
				<div class="content-form">
					<textarea placeholder="<?= __('servicios 10') ?>" name="consulta"><?= isset($_POST['consulta']) ? $_POST['consulta'] : '' ?></textarea>
					
				</div>
				
			</div>
			<button type="submit" name="enviar_asesoria"><?= __('servicios 11') ?></button>			
		</form>
			<?php  }  ?>
		<p class="cerrar"><a class="popup-modal-dismiss" href="#"><i class="far fa-window-close"></i></a></p>
	</div>
</div>
<div id="forms1" class="mfp-hide white-popup-block mfp-with-anim" >
	<div class="title">
		<h1><?= __('servicios 2') ?>
		</h1>
	</div>
	<div class="form-cont" >
			<?php include(API_PATH.'forms/instalacion.php'); ?>
			 <?php echo $form_instalacion->mensaje_estado ?>
			<?php if ($form_instalacion->estado != 'ok') { ?>
		<form method="post" action="<?=BASE_URL?>servicios#forms" >
			<div class="mod">
				
				<div class="content-form">
					<label for="nombre" class="sr-only"></label>
					<input type="text" placeholder="<?= __('servicios 7') ?>" name="nombre" id="nombre"  value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''?>">
				</div>
				<div class="content-form">
					<label for="email" class="sr-only"></label>
					<input type="email" placeholder="<?= __('servicios 8') ?>" name="email" id="email"  value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
				</div>
				<div class="content-form">
					<label for="tel" class="sr-only"></label>
					<input type="tel" placeholder="<?= __('servicios 9') ?>" name="tel" id="tel" value="<?= isset($_POST['tel']) ? $_POST['tel'] : ''?>">
				</div>
				<div class="content-form">
					<textarea placeholder="<?= __('servicios 10') ?>" name="consulta"><?= isset($_POST['consulta']) ? $_POST['consulta'] : '' ?></textarea>
					
				</div>
				
			</div>
			<button type="submit" name="enviar_instalacion"><?= __('servicios 11') ?></button>			
		</form>
			<?php  }  ?>
		<p class="cerrar"><a class="popup-modal-dismiss" href="#"><i class="far fa-window-close"></i></a></p>
	</div>
</div>
<div id="forms2" class="mfp-hide white-popup-block mfp-with-anim" >
	<div class="title">
		<h1><?= __('servicios 4') ?>
		</h1>
	</div>
	<div class="form-cont" >
			<?php include(API_PATH.'forms/detailing.php'); ?>
			 <?php echo $form_detailing->mensaje_estado ?>
			<?php if ($form_detailing->estado != 'ok') { ?>
		<form method="post" action="<?=BASE_URL?>servicios#forms" >
			<div class="mod">
				
				<div class="content-form">
					<label for="nombre" class="sr-only"></label>
					<input type="text" placeholder="<?= __('servicios 7') ?>" name="nombre" id="nombre"  value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''?>">
				</div>
				<div class="content-form">
					<label for="email" class="sr-only"></label>
					<input type="email" placeholder="<?= __('servicios 8') ?>" name="email" id="email"  value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
				</div>
				<div class="content-form">
					<label for="tel" class="sr-only"></label>
					<input type="tel" placeholder="<?= __('servicios 9') ?>" name="tel" id="tel" value="<?= isset($_POST['tel']) ? $_POST['tel'] : ''?>">
				</div>
				<div class="content-form">
					<textarea placeholder="<?= __('servicios 10') ?>" name="consulta"><?= isset($_POST['consulta']) ? $_POST['consulta'] : '' ?></textarea>
					
				</div>
				
			</div>
			<button type="submit" name="enviar_detailing"><?= __('servicios 11') ?></button>			
		</form>
			<?php  }  ?>
		<p class="cerrar"><a class="popup-modal-dismiss" href="#"><i class="far fa-window-close"></i></a></p>
	</div>
</div>
<?php include('whatsapp.php'); ?>
<?php include('footer.php'); ?>