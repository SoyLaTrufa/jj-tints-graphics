	<!-- <div id="topmenu"></div> -->
</div>

<div id="wrapper" class="login-wrapper">
	<div class="cont-1170">
		<div id="content" class="login">

	    	        
	        <form id="form" action="<?php echo base_url() ?>login/dologin" method="post">
	 			<fieldset>
					<input type="text" name="user" id="user" placeholder="Usuario">
				</fieldset>
				
				<fieldset>
					<input type="password" name="password" id="password" placeholder="Contraseña">
				</fieldset>

				<div align="center">
				  <button type="submit">Ingresar</button> 
				</div>
	        </form>
			<!-- <img src="<?= base_url() ?>core/css/img/logo.png" alt="Laboratorio Web"> -->
			
			<?php 
			if ($error) {echo '<div class="error">'.$error.'</div>';} ?>
		</div>
	</div>
</div>
