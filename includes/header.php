<?php include('head.php'); ?>

<body class="<?= 's_'.SECCION ?>">
 <div class="loading">
  <?php include('images/jj.svg'); ?>
</div>  
<header class="cabecera" id="home">
    <div class="cont-1300">
       <a href="" class="cabecera__logo anim-suave text-left">
         <img  src="images/jj-windows-graphics.png" alt="<?= Config::obtener('empresa')->nombre ?>">  
        </a>  
        <nav class="nav-principal menu menu--shylock">
          <ul>
            <li class="menu__item"><a href="<?=url('quienes-somos')?>" class=" menu__link <?= SECCION == 'quienes-somos' ? 'activo' : '' ?> "><?= __('cabecera 0') ?></a></li>
            <li class="menu__item"><a href="<?=url('promociones')?>" class=" menu__link <?= SECCION == 'promociones' ? 'activo' : '' ?> "><?= __('cabecera 1') ?></a></li>
            <li class="menu__item"><a href="<?=url('productos')?>" class=" menu__link <?= SECCION == 'productos' ? 'activo' : '' ?> "><?= __('cabecera 2') ?></a></li>
            <li class="menu__item"><a href="<?=url('servicios')?>" class=" menu__link <?= SECCION == 'servicios' ? 'activo' : '' ?> "><?= __('cabecera 3') ?></a></li>
            <li class="menu__item"><a href="<?=url('contacto')?>" class=" menu__link <?= SECCION == 'contacto' ? 'activo' : '' ?> "><?= __('cabecera 4') ?></a></li>
            <li><a href="<?= Url::actual((IDIOMA == 'es') ? 'en' : 'es')?>" ><?=(IDIOMA == 'es') ? ' <img src="images/united-states.png" alt="">' : '<img src="images/spain.png" alt="">'?></a></li>
          </ul>
        </nav>
        <button class="hamburger hamburger--efecto visible-xs">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>
    </div>
     
</header>

<main>