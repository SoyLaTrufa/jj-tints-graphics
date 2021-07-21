<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'quienes-somos');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>

<section class="somos">
	<div class="cont-990">
		<div class="box">
			<h2><?= __('empresa 0') ?></h2>
			<p><?= __('empresa 1') ?></p>
		</div>
		<div class="box">
			<h2><?= __('empresa 2') ?></h2>
			<p><?= __('empresa 3') ?></p>
		</div>
	</div>
</section>

<div class="vision">
	<div class="cont-1170">
		<h1><?= __('empresa 4') ?></h1>
	    <p><?= __('empresa 5') ?></p>
	    <div class="mod">
	    	<div class="box">
			  <img src="images/empresa/1.png" alt="">
			  <h3><?= __('empresa 6') ?></h3>
		    </div>
		    <div class="box">
			  <img src="images/empresa/2.png" alt="">
			  <h3><?= __('empresa 7') ?></h3>
		    </div>
		    <div class="box">
			  <img src="images/empresa/3.png" alt="">
			  <h3><?= __('empresa 8') ?></h3>
		    </div>
		    <div class="box">
			  <img src="images/empresa/4.png" alt="">
			  <h3><?= __('empresa 9') ?></h3>
		    </div>
		     <div class="box">
			  <img src="images/empresa/5.png" alt="">
			  <h3><?= __('empresa 10') ?> </h3>
		    </div>
		     <div class="box">
			  <img src="images/empresa/6.png" alt="">
			  <h3><?= __('empresa 11') ?></h3>
		    </div>
	    </div>
	</div>
</div>

<section class="banda-roja">
	<a href="<?=url('productos')?>"><img src="images/empresa/11.png" alt=""></a>
	<a href="<?=url('productos')?>"><h2><?= __('empresa 12') ?></h2></a>
</section>
<?php include('whatsapp.php'); ?>
<?php include('footer-alt.php'); ?>