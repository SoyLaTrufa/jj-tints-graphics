<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'ficha-promociones');

  if(! isset($_GET['id'])){
	error_404();
	}else{

		if(! $promocion = Promocion::obtener(array_merge(
			array('id' => $_GET['id']),
			isset($_GET['vp']) ?  array('vp' => true) : array()
		))){
			header('location:'.url('pagina-no-disponible'));
			exit;
		}
	}

	Url::cargarDatosUrlSeccionActual($promocion);

	Metas::construir(SECCION, array(
		'titulo'      => 'JJ Tints & Graphics | '.$promocion->titulo,
		'descripcion' => $promocion->bajada,
		'img'         => $promocion->foto ? $promocion->foto->src : '',
	));

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>

<section class="promociones">
	<div class="cont-1300 f">
		<span><?= (IDIOMA == 'es') ? $promocion->fecha_texto : $promocion->fecha ; ?></span>
		<a href="<?= url('promociones') ?>"><i class="fas fa-arrow-left"></i><strong>Volver al listado</strong></a>
	</div>
	<div class="cont-1300">
		<div class="left">
			<img src="<?= $promocion->foto->src('740x500') ?>" alt="<?= $promocion->titulo ?>">
			<div class="texto">
				<h1><?= $promocion->titulo ?></h1>
				<p><?= $promocion->bajada ?></p>
				<?= $promocion->cuerpo ?>
			</div>
			<div class="rrss">
				<span>Compartir:</span>
				<?= enlaceCompartir($promocion->url, 'facebook', '<i class="fab fa-facebook-f"></i>', ' | JJ Tints & Graphics', '$promocion->foto->src')?>
				<a href="https://api.whatsapp.com/send?text=Mira%20esta%20promoción%20de%20JJ%20Tints%20Graphics%20en%20<?=$promocion->url ?>" target="_blank" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
				<?= enlaceCompartir($promocion->url, 'twitter', '<i class="fab fa-twitter"></i>', $promocion->url) ?>
			</div>
		</div>
		<div class="right">
			<?php
				foreach (Promocion::obtener(array('excluir' => $_GET['id'])) as $key => $p) { ?>
					<a  href="<?= $p->url ?>" class="box">
						<img src="<?= $p->foto->src('360x240') ?>" alt="<?= $p->titulo ?>">
						<h2><?= $p->titulo ?></h2>
						<p><?= $p->bajada ?></p>
					</a>	
				<?php }
			?>
		</div>
	</div>
</section>

<section class="banda-roja">
	<a href="<?= url('productos') ?>"><img src="images/empresa/11.png" alt=""></a>
	<a href="<?= url('productos') ?>"><h2>conozca nuestros productos</h2></a>
</section>
<?php include('whatsapp.php'); ?>
<?php include('footer-alt.php'); ?>