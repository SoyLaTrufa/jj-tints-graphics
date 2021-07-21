
	<div id="topmenu">
		<a href="#" class="toggle-menu"><i class="fas fa-bars"></i></a>
		<a href="<?= base_url() ?>dashboard"><img class="logo" src="<?= base_url() ?>core/css/img/logo-cliente.png" alt="<?=EMPRESA?>"></a>
		<img class="loguito" src="<?= base_url() ?>core/css/img/fav-cliente.png" alt="<?=EMPRESA?>">
		<div class="clear"></div>
		<ul>
			<?php
			foreach( $menu AS $solapa ){

				$activo = false;
				if($current_script == $solapa->controlador){
					if($solapa->categoria!=''){
						if(isset($_GET['categ']) AND $_GET['categ'] == $solapa->categoria){
							$activo = true;
						}
					}else{
						$activo = true;
					}
				}

				if ($solapa->nombre === 'Dashboard') { continue; }

				echo '<li class="'.($activo ? 'current' : '').' '.
					($this->session->userdata('perfil')=='superadmin' ? $solapa->tipo : '').
					( ($this->session->userdata('perfil')!='superadmin' AND $solapa->tipo=='oculta') ? 'hidden': '').'">';
				echo '<a href="'.
						base_url().
						$solapa->controlador.
						($solapa->listar!='todos' ? '/edit/'.$solapa->listar : '').
						($solapa->categoria!='' ? ($solapa->listar=='todos' ? '/index' : '').'?categ='.$solapa->categoria : '').'">';
				if ($solapa->controlador == 'admins') {
					echo '<i class="fa fa-users" aria-hidden="true"></i>'.$solapa->nombre;
				} 
				elseif ($solapa->controlador == 'menu') {
					echo '<i class="fas fa-tasks"></i>'.$solapa->nombre;
				}elseif ($solapa->controlador == 'contactos') {
					echo '<i class="fas fa-star-half-alt"></i>'.$solapa->nombre;
				}else{
					echo '<i class="fa fa-cogs" aria-hidden="true"></i>'.$solapa->nombre;					
				}
				echo '</a></li>';
			}
			?>
		</ul>
	

</div>
