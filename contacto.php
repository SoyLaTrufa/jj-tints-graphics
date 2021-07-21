<?php

  require_once('api/inicio.php');


  //////////////////////////////////
 /// Configuración de la página ///
//////////////////////////////////

  define('SECCION', 'contacto');

// Fin configuración de la página //
  Plugins::activar('animacion');

  include('header.php');
  include('portadas.php');

?>

<section class="contacto">
	<div class="cont-1170">
		<h2><?= __('contacto 0') ?></h2>
    <div class="mod">
      <div class="left">
        <?php include(API_PATH.'forms/contacto.php'); ?>
        <?php echo $form_contacto->mensaje_estado ?>
        <?php if ($form_contacto->estado != 'ok') { ?>
        <form method="post" action="<?=BASE_URL?>contacto#enviado" enctype="multipart/form-data">
          <div class="modd">
            <div class="content-form">
              <label for="nombre" ><?= __('contacto 1') ?> </label>
              <input type="text" name="nombre" id="nombre"  value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''?>">
            </div>
            <div class="content-form">
              <label for="tel" ><?= __('contacto 2') ?></label>
              <input type="tel" name="tel" id="tel"  value="<?= isset($_POST['tel']) ? $_POST['tel'] : ''?>">
            </div>  
            <div class="content-form">
              <label for="email" ><?= __('contacto 3') ?></label>
              <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
            </div>      
            <div class="content-form mensaje">
              <label for="mensaje" ><?= __('contacto 4') ?></label>
              <textarea  name="mensaje" ><?= isset($_POST['mensaje']) ? $_POST['mensaje'] : '' ?></textarea>
            </div>
            <div class="btnss">
              <button type="submit" name="enviar_contacto"><?= __('contacto 5') ?></button>
            </div>
         </div>
        </form>
        <?php  }  ?>
      </div>
      <div class="right">
        <a href="#">
         <?= __('contacto 6') ?>
        </a>
        <a href=""><i class="fas fa-phone"></i> +507 203.8855 / 203.8858</a>
        <a href=""><i class="far fa-envelope"></i>info@jjpty.com</a>
        <div class="rrss">
          <a href="https://www.facebook.com/JJWINDOWTINTPTY/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/jjwindowtintpty?lang=es"><i class="fab fa-twitter"></i></a>
          <a href="https://www.instagram.com/jjtintsandgraphics/?hl=es"><i class="fab fa-instagram"></i></a>
          <a href="https://www.instagram.com/jjtintsandgraphics/?hl=es">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="https://www.instagram.com/jjtintsandgraphics/?hl=es">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
    </div>
	</div>
</section>

<section class="banda-gris">
	<a href="<?=url('servicios')?>"><img src="images/servicios/icos.png" alt=""></a>
	<a href="<?=url('servicios')?>"><h2><?= __('contacto 7') ?></h2></a>
</section>

<?php include('whatsapp.php'); ?>
<?php include('footer-alt.php'); ?>