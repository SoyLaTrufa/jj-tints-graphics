<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'home');

// Fin configuración de la página //
  Plugins::activar('owlCarousel');
  Plugins::activar('animacion');

  include('header.php');

?>

<section class="video-cont">
	<video class="video"   autoplay loop muted><source src="video/introJJ.mp4" type="video/mp4"></video>
</section>

<section class="productos">
	<img class="raya" src="images/home/rayas1.png" alt="JJ tints & graphics">
	<img class="rayas" src="images/home/rayas1.png" alt="JJ tints & graphics">
	<h1 class="wow fadeInDown" data-wow-duration="2.5s" data-wow-delay="0s" ><?= __('home 0') ?></h1>
	<h2 class="wow fadeInDown" data-wow-duration="2.5s" data-wow-delay="0s"><?= __('home 1') ?>  </h2>
	<div class="cont-1300">
		<a href="<?=url('peliculas-control-solar')?>" class="box wow fadeInUp" data-wow-duration="2s" data-wow-delay="0s" >
			<img src="images/home/peliculas-control-solar.png" alt="peliculas de control solar 3m">
			<span>
				<p><?= __('home 2') ?></p>
				<i class="far fa-long-arrow-right"></i>
			</span>
		</a>
		<a href="<?=url('graficos-y-car-wrap')?>" class="box wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s" >
			<img src="images/home/car-wrap.png" alt="Insumos Graficos y Car Wrap">
			<span class="negro">
				<p><?= __('home 3') ?></p>
				<i class="far fa-long-arrow-right"></i>
			</span>
		</a>
		<a href="<?=url('toldos-y-persianas')?>" class="box wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s" >
			<img src="images/home/persianas.png" alt="persianas y toldos">
			<span >
				<p><?= __('home 4') ?></p>
				<i class="far fa-long-arrow-right"></i>
			</span>
		</a>
		<a href="<?=url('adhesivos-3m')?>" class="box wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.2s" >
			<img src="images/home/adhesivos.png" alt="adhesivos 3m">
			<span class="negro">
				<p><?= __('home 5') ?></p>
				<i class="far fa-long-arrow-right"></i>
			</span>
		</a>

	</div>
</section>

<section class="servicios">
	<img class="raya" src="images/home/rayas1.png" alt="JJ tints & graphics">
	<img class="rayas" src="images/home/rayas1.png" alt="JJ tints & graphics">
	<h1 class="wow fadeInDown" data-wow-duration="2.5s" data-wow-delay="0s" ><?= __('home 6') ?></h1>
	<h2 class="wow fadeInDown" data-wow-duration="2.5s" data-wow-delay="0s"><?= __('home 7') ?>  </h2>
	<div class="cont-1300">
		<a href="<?=url('servicios')?>" class="box  wow fadeInUp" data-wow-duration="2s" data-wow-delay="0s" >
			<img class="serv" src="images/home/asesoria.jpg" alt="Asesoría gratis ">
			<span>
				<img class="white" src="images/home/sr1.png" alt="Asesoría gratis ">
				<img class="red" src="images/home/sr1-red.png" alt="Asesoría gratis ">
				<h3>
					<?= __('home 8') ?>
				</h3>
				<p><?= __('home 9') ?></p>
			</span>
		</a>
		
		<a href="<?=url('servicios')?>" class="box  wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s" >
			<img class="serv" src="images/home/install.png" alt="Instalación persianas y toldos peliculas de control solar 3m">
			<span>
				<img class="white" src="images/home/sr2.png" alt="Instalación persianas y toldos peliculas de control solar 3m">
				<img class="red" src="images/home/sr2-red.png" alt="Instalación persianas y toldos peliculas de control solar 3m">
				<h3>
					<?= __('home 10') ?>
				</h3>
				<p><?= __('home 11') ?></p>
			</span>
		</a>

		<a href="<?=url('servicios')?>" class="box  wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s" >
			<img class="serv" src="images/home/detailing.jpg" alt="Detailing Center">
			<span>
				<img class="white" src="images/home/detailing.png" alt="Detailing Center">
				<img class="red" src="images/home/detailing-red.png" alt="Detailing Center">
				<h3>
					<?= __('home 12') ?>
				</h3>
				<p><?= __('home 13') ?></p>
			</span>
		</a>
	</div>
</section>

<section class="promociones">
	<h1 class="wow fadeInDown" data-wow-duration="2.5s" data-wow-delay="0s" ><?= __('home 14') ?></h1>
	<h2 class="wow fadeInDown" data-wow-duration="2.5s" data-wow-delay="0s"><?= __('home 15') ?>  </h2>
	<div class="cont-1170 slider-novedad">
		<ul class="owl-carousel">
			<?php
				foreach (Promocion::obtener('todas') as $key => $p) { ?>
					<li>
						<a href="<?= $p->url ?>" class="box">
							<img src="<?= $p->foto->src('360x240') ?>" alt="<?= $p->titulo ?>">
							<p><?= $p->titulo ?></p>
						</a>
					</li>
				<?php }
			?>
		</ul>
	</div>
</section>

<section class="donde-estamos">
	<h1><?= __('home 16') ?></h1>
	<div style="background: #000" class="mapa">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.6130877031646!2d-79.50709368521353!3d9.007703093535635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca9b06de68e0b%3A0x4d0d11aabf24e84!2sJJ%20TINTS%20%26%20GRAPHICS!5e0!3m2!1ses-419!2sar!4v1621197859109!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
</section>
<?php include('whatsapp.php'); ?>
<?php include('footer.php'); ?>