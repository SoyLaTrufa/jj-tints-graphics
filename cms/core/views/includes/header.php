<?php include('head.php');?>


<header>

		<?php if( isset($nombre) AND $nombre!="" ){
          echo '<h2>Hola <i>'.$nombre.'</i></h2>';
          echo '<a class="salir" href="'.base_url().'login/logout"><img src="'.base_url().'core/css/img/signout.jpg"></a>';
      } else {
          echo '<h2 class="bienv">Bienvenido</h2>';
      }

	?>

</header>

