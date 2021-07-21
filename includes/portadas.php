<?php

  if (SECCION == 'inicio') { ?>
      ""
  <?php } else { ?>
    <section class="portada-interna" style="background-image: url('images/cabeceras/<?= SECCION ?>.jpg');">
    <?php
        switch(SECCION){
          case 'quienes-somos':
            echo '<div class="caja"><h1> '.__('portadas 0').'</h1></div>';
            break;
          case 'promociones':
            echo '<div class="caja"><h1>'.__('portadas 1').'</h1></div>';
            break;
          case 'ficha-promociones':
            echo '<div class="caja"><h1>'.__('portadas 1').'</h1></div>';
            break;
            case 'servicios':
            echo '<div class="caja"><h1>'.__('portadas 2').'</h1></div>';
            break;
          case 'productos':
            echo '<section class="video-cont">
                    <video class="video" playsinline autoplay loop muted><source src="video/productos.mp4" type="video/mp4"></video>
                  </section><div class="caja"><h1>'.__('portadas 3').'</h1></div>';
            break;
            case 'peliculas':
            echo '<section class="video-cont">
                    <video class="video" playsinline autoplay loop muted><source src="video/laminados.mp4" type="video/mp4"></video>
                  </section><div class="caja"><h1>'.__('portadas 4').'</h1></div>';
            break;
            case 'toldos-y-persianas':
            echo '<section class="video-cont">
                    <video class="video" playsinline autoplay loop muted><source src="video/persianas.mp4" type="video/mp4"></video>
                  </section>
                  <div class="caja"><h1>'.__('portadas 5').'</h1></div>';
            break;
            case 'adhesivos-3m':
            echo '<section class="video-cont">
                    <video class="video" playsinline autoplay loop muted><source src="video/adhesivos.mp4" type="video/mp4"></video>
                  </section>
                  <div class="caja"><h1>'.__('portadas 6').'</h1></div>';
            break;
            case 'graficos':
            echo '<section class="video-cont">
                    <video class="video" playsinline autoplay loop muted><source src="video/graficos.mp4" type="video/mp4"></video>
                  </section>
                  <div class="caja"><h1>'.__('portadas 7').'</h1></div>';
            break;
             case 'contacto':
            echo '<div class="caja"><h1>'.__('portadas 8').'</h1></div>';
            break;
          default:
            echo Config::obtener('empresa')->nombre;
            break;
        }
      ?></section>
  <?php }

 ?>


