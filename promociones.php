<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'promociones');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>

<section class="promociones">
	<div class="cont-1170">
		<ul >
			<?php
				foreach (Promocion::obtener('todas') as $key => $p) { ?>
					<li>
						<a href="<?= $p->url ?>" class="box">
							<img src="<?= $p->foto->src('360x240') ?>" alt="<?= $p->titulo ?>">
							<p><?= $p->titulo ?></p>
						</a>
						<p><?= $p->bajada ?></p>
					</li>
				<?php }
			?>
		</ul>
	</div>
</section>

<section class="banda-roja">
	<a href="<?=url('productos')?>"><img src="images/empresa/11.png" alt=""></a>
	<a href="<?=url('productos')?>"><h2><?= __('empresa 12') ?></h2></a>
</section>


<?php include('whatsapp.php'); ?>
<?php include('footer-alt.php'); ?>