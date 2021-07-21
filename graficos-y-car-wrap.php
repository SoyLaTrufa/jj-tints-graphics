<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'graficos');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>



<section class="servicios">
	<div class="cont-1300">
		<div class="mod">
			<div class="img">
				<img src="images/graficos/truckkk.jpg" alt="">
			</div>
			<div class="texto">
				<h3>Vinilo Premium</h3>
				<div class="box">
					<a  class="dude">
						<img src="images/graficos/1.png" alt="">
						<h5> IJ180</h5>
					</a>
					<a  class="dude">
						<img src="images/graficos/1.png" alt="">
						<h5>8519 Gloss</h5>
					</a>
					<a  class="dude">
						<img src="images/graficos/2.jpg" alt="">
						<h5>8520 Mate</h5>
					</a>
          <a  class="dude">
            <img src="images/graficos/2.png" alt="">
            <h5>IJ680</h5>
          </a>
           <a  class="dude">
            <img src="images/graficos/3.jpg" alt="">
            <h5>IJ8150 Clear View</h5>
          </a>
				</div>
			</div>
		</div>
		<div class="mod second">	
			<div class="texto">
				<h3>Laminados para Pisos y Mesas</h3>
				<div class="box">
					<a  class="dude">
						<img src="images/graficos/3.png" alt="">
						<h5>3645 laminado para pisos y mesas</h5>
					</a>
					<a  class="dude">
						<img src="images/graficos/4.png" alt="">
						<h5>3547 laminado para exterior</h5>
					</a>
					
				</div>	
			</div>
			<div class="img">
				<img src="images/graficos/flooor.jpg" alt="">
			</div>
		</div>
		<div class="mod">
			<div class="img">
				<img src="images/graficos/camion.jpg" alt="">
			</div>
			<div class="texto">
				<h3>Vinilo Intermedio Calandrado</h3>
				<div class="box">
					<a  class="dude">
						<img src="images/graficos/5.png" alt="">
						<h5>IJ40C-10 Gloss / IJ40C-20 Mate</h5>
					</a>
					<a  class="dude">
						<img src="images/graficos/1.png" alt="">
						<h5>  IJ35-10</h5>
					</a>
         <!--  <a  class="dude">
           <img src="images/graficos/1.png" alt="">
            <h5> IJ35-20</h5>
          </a> -->
          <a  class="dude">
            <img src="images/graficos/1.png" alt="">
            <h5>8048 G</h5>
          </a> 
          <a  class="dude">
            <img src="images/graficos/1.png" alt="">
            <h5>8050 M</h5>
          </a>
				</div>
			</div>
		</div>
		<div class="mod second">
			<div class="texto">
				<h3>Vinilo Promocional</h3>
				<div class="box">
					<a  class="dude">
						 <img src="images/graficos/1.png" alt="">
						<h5> IJ15-10 R/B</h5>
					</a>
					
					<a  class="dude">
            <img src="images/graficos/5.jpg" alt="">
            <h5>  IJ15-114</h5>
          </a>
          <a  class="dude">
            <img src="images/graficos/1.png" alt="">
            <h5> IJ16-10 R/G</h5>
          </a>
          <a  class="dude">
            <img src="images/graficos/1.png" alt="">
            <h5> IJ16-20 R/G</h5>
          </a>
				</div>	
			</div>
			<div class="img">
				<img src="images/graficos/floo1.png" alt="">
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