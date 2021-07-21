	
	</main>
	
	<footer class="pie alt">
		<div class="cont-1300 ">
			<div class="copy">
				JJ TINTS & GRAPHICS © Copyright 2021
			</div>
			<div class="logo " style="margin: 20px 0">
				<a href=""><img src="images/jj-windows-graphics.png" alt=""></a>
			</div>
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
	</footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-2.2.4.min.js"><\/script>');</script>

	<?php
		Plugins::cargar();
		$main_js = $minified->merge(BASE_PATH.'js/main.min.js', 'js', array(BASE_PATH.'js/main.js'));
		echo '<script src="'.str_replace(BASE_PATH, '', $main_js).'?v='.filemtime($main_js) .'"></script>'. PHP_EOL;
   ?>
</body>
</html>