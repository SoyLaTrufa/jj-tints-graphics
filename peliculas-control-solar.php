<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'peliculas');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>


<section class="servicios">
	<div class="cont-1300">
		<div class="mod">
			<div class="img">
				<img src="images/productos/1.jpg" alt="">
			</div>
			<div class="texto">
				<h3><?= __('peliculas 0') ?></h3>
				<div class="box">
					<a  class="dude">
						<img src="images/productos/c1.png" alt="">
						<h5>Crystalline</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c2.png" alt="">
						<h5>Color stable</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c3.png" alt="">
						<h5>Security</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="mod second">	
			<div class="texto">
				<h3><?= __('peliculas 1') ?></h3>
				<div class="box">
					<a  class="dude">
						<img src="images/productos/c7.png" alt="">
						<h5>Prestige</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c8.png" alt="">
						<h5>Night vision</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c5.png" alt="">
						<h5>Neutral </h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c4.png" alt="">
						<h5>Affinity</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c6.png" alt="">
						<h5>Security</h5>
					</a>		
				</div>	
			</div>
			<div class="img">
				<img src="images/productos/2.jpg" alt="">
			</div>
		</div>
		<div class="mod">
			<div class="img">
				<img src="images/productos/security.png" alt="">
			</div>
			<div class="texto">
				<h3><?= __('peliculas 2') ?></h3>
				<div class="box">
					<a   class="dude">
						<img style="border-radius: 50%; border: 2px solid gray; width: 161px; height: 161px" src="images/productos/last.png" alt="">
						<h5>Safety Series</h5>
					</a>
					<a  class="dude">
						<img style="border-radius: 50%; border: 2px solid gray; width: 161px; height: 161px" src="images/productos/last1.jpg" alt="">
						<h5>Ultra Series</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="mod second">
			<div class="texto">
				<h3><?= __('peliculas 3') ?></h3>
				<div class="box">
					<a  class="dude">
						<img src="images/productos/c11.png" alt="">
						<h5>Dusted</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c12.png" alt="">
						<h5>Frosted</h5>
					</a>
					<a  class="dude">
						<img src="images/productos/c13.png" alt="">
						<h5>Fasara</h5>
					</a>
					
				</div>
				
			</div>
			<div class="img">
				<img src="images/productos/fasara.png" alt="">
			</div>
		</div>
	</div>
</section>

<section class="bene">
	<div class="title">
		<h2><?= __('peliculas 4') ?></h2>
		<div class="mod">
			<p><?= __('peliculas 5') ?></p>
		</div>    
	</div>
	<div class="cont-1170">
		<div class="box">
			<img src="images/productos/ico.png" alt="">
			<h4><?= __('peliculas 6') ?></h4>
			<p><?= __('peliculas 7') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico1.png" alt="">
			<h4><?= __('peliculas 8') ?></h4>
			<p><?= __('peliculas 9') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico2.png" alt="">
			<h4><?= __('peliculas 10') ?></h4>
			<p><?= __('peliculas 11') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico3.png" alt="">
			<h4><?= __('peliculas 12') ?></h4>
			<p><?= __('peliculas 13') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico4.png" alt="">
			<h4><?= __('peliculas 14') ?></h4>
			<p><?= __('peliculas 15') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico5.png" alt="">
			<h4><?= __('peliculas 16') ?></h4>
			<p><?= __('peliculas 17') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico6.png" alt="">
			<h4><?= __('peliculas 18') ?></h4>
			<p><?= __('peliculas 19') ?></p>
		</div>
		<div class="box">
			<img src="images/productos/ico7.png" alt="">
			<h4><?= __('peliculas 20') ?></h4>
			<p><?= __('peliculas 21') ?></p>
		</div>
	</div>              
</section>

<section class="logos">
	<div class="title">
		<h2><?= __('peliculas 22') ?></h2>
		<div class="mod">
			<img src="images/productos/logo.png" alt="">
			<img src="images/productos/logo1.png" alt="">
			<img src="images/productos/logo2.png" alt="">
			<img src="images/productos/logo3.png" alt="">
		</div> 
	</div>
</section>


<?php include('chat.php'); ?>

<?php include('footer.php'); ?>