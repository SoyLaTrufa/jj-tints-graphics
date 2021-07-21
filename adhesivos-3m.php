<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'adhesivos-3m');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>



<section class="servicios">
	<div class="cont-1300">
		<div class="mod">
			<div class="img">
				 <video class="video" playsinline autoplay loop muted><source src="video/77-3m.mp4" type="video/mp4"></video>
			</div>
			<div class="texto">
				<h3>VHB Tapes</h3>
				<div class="box">
					<a  class="dude">
						<img src="images/adhesivos/ade1.png" alt="">
						<h5>VHB RP45 GRAY</h5>
					</a>
					<a  class="dude">
						<img src="images/adhesivos/ade2.png" alt="">
						<h5>B23F VHB BLACK</h5>
					</a>
					<a  class="dude">
						<img src="images/adhesivos/ade3.png" alt="">
						<h5>4956 GRIS VHB</h5>
					</a>
          <a  class="dude">
            <img src="images/adhesivos/ade4.png" alt="">
            <h5>4026 GREEN VHB</h5>
          </a>
           <a  class="dude">
            <img src="images/adhesivos/ade5.png" alt="">
            <h5>4090 VHB TRANSPARENT ¾ X 36 YD / 1”x20M</h5>
          </a>
          <a  class="dude">
            <img src="images/adhesivos/ade6.png" alt="">
            <h5>4950 VHB WHITE</h5>
          </a>
				</div>
			</div>
		</div>
		<div class="mod second">	
			<div class="texto">
				<h3>Adhesivos</h3>
				<div class="box">
					
					<a  class="dude">
						<img src="images/adhesivos/ade7.jpg" alt="">
						<h5>Super 77™  </h5>
					</a>
					<a  class="dude">
						<img src="images/adhesivos/ade8.png" alt="">
						<h5>Tape Primer 94</h5>
					</a>
					<a  class="dude">
						<img src="images/adhesivos/ade9.jpg" alt="">
						<h5>Industrial Cleaner Citrus Base</h5>
					</a>
					<a  class="dude">
						<img src="images/adhesivos/395.jpg" alt="">
						<h5>Edge Sealer 3950 </h5>
					</a>
          <a  class="dude">
            <img src="images/adhesivos/ade11.png" alt="">
            <h5> Cinta de Corte Knifeless tape</h5>
          </a>
          <a  class="dude">
            <img src="images/adhesivos/ade12.png" alt="">
            <h5>Tratamiento para Vidrio de Silano 3M™ AP115</h5>
          </a>
				</div>	
			</div>
			<div class="img">
				 <video class="video" playsinline autoplay loop muted><source src="video/ade-3m.mp4" type="video/mp4"></video>
			</div>
		</div>

	</div>
</section>




<section class="logos">
	<div class="title">
		<h2>Calidad asegurada</h2>
		<div class="mod">
			<img src="images/adhesivos/GARANTIA-3M.png" alt="">

		</div> 
	</div>
</section>




<?php include('chat.php'); ?>

<?php include('footer.php'); ?>