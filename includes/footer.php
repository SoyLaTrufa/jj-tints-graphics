	
	</main>
	
	<footer class="pie">
		<img class="raya" src="images/home/rayas1.png" alt="">
		<img class="rayas" src="images/home/rayas1.png" alt="">
		<div class="cont-1300">
			<div class="left">
				<div class="logo">
					<a href=""><img src="images/jj-windows-graphics.png" alt=""></a>
				</div>
				<p>
					<?= __('footer 0') ?>
				</p>
				<div class="tels">
					<i class="fas fa-phone-alt"></i>
					<a href="tel:5072038855">+507 203.8855</a> / <a href="tel:2038858">203.8858</a>
				</div>
				<a class="mail" href="mailto:info@jjpty.com"><i class="fas fa-envelope"></i>info@jjpty.com</a>
				<div class="rrss">
					<a href="https://www.facebook.com/JJWINDOWTINTPTY/">
						<i class="fab fa-facebook-f"></i>
					</a>
					<a href="https://twitter.com/jjwindowtintpty?lang=es">
						<i class="fab fa-twitter"></i>
					</a>
					<a href="https://www.instagram.com/jjtintsandgraphics/?hl=es">
						<i class="fab fa-instagram"></i>
					</a>
					<a href="https://www.instagram.com/jjtintsandgraphics/?hl=es">
						<i class="fab fa-linkedin-in"></i>
					</a>
					<a href="https://www.instagram.com/jjtintsandgraphics/?hl=es">
						<i class="fab fa-youtube"></i>
					</a>
				</div>
			</div>
			<div class="right">
				<h1><?= __('footer 6') ?></h1>
				<?php include(API_PATH.'forms/contacto.php'); ?>
				<?php if ($form_contacto->estado != 'ok') { ?>
				 <?php echo $form_contacto->mensaje_estado ?>
				<form method="post" action="<?=BASE_URL?>index#enviado" enctype="multipart/form-data">
					<div class="mod" id="enviado">
						<div class="content-form">
							<label for="nombre" class="sr-only"></label>
							<input type="text" placeholder="<?= __('footer 1') ?>" name="nombre" id="nombre"  value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ''?>">
						</div>
						<div class="content-form">
							<label for="email" class="sr-only"></label>
							<input type="email" placeholder="<?= __('footer 2') ?>" name="email" id="email"  value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
						</div>
						<div class="content-form">
							<label for="tel" class="sr-only"></label>
							<input type="tel" placeholder="<?= __('footer 3') ?>" name="tel" id="tel" value="<?= isset($_POST['tel']) ? $_POST['tel'] : ''?>">
						</div>
						<div class="content-form">
							<textarea placeholder="<?= __('footer 4') ?>" name="consulta"><?= isset($_POST['consulta']) ? $_POST['consulta'] : '' ?></textarea>
							
						</div>
					</div>
					<button type="submit" name="enviar_contacto"><strong><?= __('footer 5') ?></strong></button>
				</form>
				<?php  }  ?>
			</div>
		</div>
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.9/jquery.magnific-popup.min.js"></script>

		<script>
	     // Example 1: From an element in DOM
			// $('.open-popup-link').magnificPopup({
			//   type:'inline',
			//   midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
			// });

			// // Example: 2 Dynamically created
			// $('button').magnificPopup({
			//   items: {
			//       src: '<div class="white-popup">Dynamically created popup</div>',
			//       type: 'inline'
			//   },
			//   closeBtnInside: true
			// });


			$('.popup-modal').magnificPopup({
				type: 'inline',
				preloader: false,
				focus: '#username',
				modal: true,
				removalDelay: 500, //delay removal by X to allow out-animation
			  callbacks: {
			    beforeOpen: function() {
			       this.st.mainClass = this.st.el.attr('data-effect');
			    }
			  },
				

			});
			$(document).on('click', '.popup-modal-dismiss', function (e) {
				e.preventDefault();
				$.magnificPopup.close();
			});

			
			
	</script>
	<script>window.jQuery || document.write('<script src="js/jquery-2.2.4.min.js"><\/script>');</script>

	<?php
		Plugins::cargar();
		$main_js = $minified->merge(BASE_PATH.'js/main.min.js', 'js', array(BASE_PATH.'js/main.js'));
		echo '<script src="'.str_replace(BASE_PATH, '', $main_js).'?v='.filemtime($main_js) .'"></script>'. PHP_EOL;
   ?>
</body>
</html>