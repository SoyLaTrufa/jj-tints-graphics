<?php

$metas = Metas::obtener(SECCION);
$empresa = Config::obtener('empresa');

?>
<!DOCTYPE html>
<html lang="<?= IDIOMA ?>">
  <head>
    <meta charset="utf-8">

    <title><?= $metas->titulo?></title>
    <meta name="description"            content="<?= $metas->descripcion;?>"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card"           content="summary_large_image"/>
    <?php if(isset($empresa->redes['tw']) AND $empresa->redes['tw']){ ?>
    <meta name="twitter:site"           content="@<?= $empresa->redes['tw'] ?>"/>
    <?php } ?>
    <meta name="twitter:title"          content="<?= $metas->titulo ?>" />
    <meta name="twitter:description"    content="<?= $metas->descripcion;?>" />
    <meta name="twitter:image"          content="<?= $metas->img ?>" />
     <title></title>
    <!-- Open Graph data -->
    <meta property="og:title"           content="<?= $metas->titulo ?>" />
    <meta property="og:description"     content="<?= $metas->descripcion;?>"/>
    <meta property="og:image"           content="<?= $metas->img; ?>" />
    <meta property="og:site_name"       content="<?= $empresa->nombre ?>"/>
    <meta property="og:url"             content="<?= Url::actual(); ?>"/>

    <meta name="robots"   content="all">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <base href="<?= BASE_URL ?>">

    <link rel="canonical" href="<?= Url::actual() ?>" />
    <?php if( Idioma::deteccionHabilitada() ){
      foreach(Idioma::idiomasDisponibles() AS $idioma){
          echo '<link rel="alternate" hreflang="'.$idioma.'" href="'.Url::actual($idioma).'" />'."\r\n";
      }
    } ?>
<!-- 
    <link rel="alternate" type="application/rss+xml" title="JJ TINTS & GRAPHICS Feed" href="http://jjpty.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="JJ TINTS & GRAPHICS RSS de los comentarios" href="http://jjpty.com/comments/feed/" />
    <link rel="alternate" type="text/calendar" title="JJ TINTS & GRAPHICS iCal Feed" href="http://jjpty.com/events/?ical=1" /> -->
    <!-- Favicons: http://realfavicongenerator.net/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=BASE_URL?>images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?=BASE_URL?>images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?=BASE_URL?>images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?=BASE_URL?>images/favicons/manifest.json">
    <link rel="mask-icon" href="<?=BASE_URL?>images/favicons/safari-pinned-tab.svg" color="#da802d">
    <link rel="shortcut icon" href="<?=BASE_URL?>images/favicons/favicon.ico">
    <meta name="msapplication-config" content="<?=BASE_URL?>images/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ED1C24">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <?php
   
    // Uno y minifico todos los CSS comunes a todas las páginas
    $main_css = $minified->merge(BASE_PATH.'css/main.min.css', 'css', array(
          BASE_PATH.'css/bootstrap/bootstrap.min.css',
          BASE_PATH.'sass/main.css',
      ));
    echo ' <link rel="stylesheet" href="'.str_replace(BASE_PATH, '', $main_css).'?v='.filemtime($main_css).'" />'."\r\n";
    ?>
    
    <!-- Carga las tipografías -->
    <script async src="js/fonts.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/0.9.9/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
   
.white-popup {
        position: relative;
        /* width: auto; */
         max-width: 518px; 
        /* margin: 20px auto; */
        color: red;
        /* border-radius: 2px; */
        text-align: center;
        /* font: 18px "Arial", sans-serif; */
        /* line-height: 24px; */
        /* color: #444; */
        left: 50%;
        transform: translateX(-50%);
        max-height: 534px;
      }
      .mfp-bg{
        background-color: #000;
       opacity: 0.7;
       z-index: 999;
      }
      .mfp-close-btn-in .mfp-close {
          color: #fff;
          background-color: red;
          border-radius: 50%;
          /* padding: 3px; */
          width: 30px;
          height: 30px;
          font-size: 37px;
          line-height: 29px;
          margin: 10px;
          position: absolute;
          top: -23px;
          right: -22px;
      }
      .white-popup-block{
         position: relative;
          background-color: transparent !important;
          width: auto;
          padding: 0;
          max-width: 550px;
          margin: 20px auto;
          top: 50%;
      }
 
 .white-popup-block .title{
   width: 100%;
    text-align: center;
    background-color: transparent;
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #000
 }
   .white-popup-block .title h1{
     width: 100%;
      border-top-right-radius: 5px;
      border-top-left-radius: 5px;
      background-color: #ffe91b;
      margin: 0;
      font-size: 25px;
      padding-top: 30px;
      background: #000;
      line-height: 44px;
      text-transform: uppercase;
      color: #fff
   }
   
     
  .form-cont{
    padding: 0 10px 20px 10px;
    background-color: #000;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
    
   .form-cont form{
     display: flex;
      align-items: center;
      flex-direction: column;
      width: 100%;
      padding: 10px 20px;
   }
     
    .form-cont form .mod{
      padding-bottom: 20px;
        width: 100%;
    }
        
      .form-cont form .mod .content-form{
         display: flex;
          justify-content: space-between;
          width: 100%;
          padding: 5px 0;
          margin: 20px 0;
      }
        .form-cont form .mod .content-form label{
            padding-right: 30px;
            font-size: 19px;
            margin-bottom: 5px;
        }

         .form-cont form .mod .content-form #after{
            position: absolute;
            width: 100%;
            border: 1px solid #9d9d9d;
            left: 194px;
            padding: 5px 10px;
            font-size: 16px;
            margin-bottom: 5px}
            
        .form-cont form .mod .content-form  input{
            text-transform: uppercase;
            width: 100%;
            border: 0;
            border-bottom: 1px solid #333;
            color: #fff;
            padding: 0 3px;
            font-size: 12px;
            background: #000;
            outline: 0;
          }
          .form-cont form .mod .content-form  textarea{
            text-transform: uppercase;
            width: 100%;
            border: 0;
            border-bottom: 1px solid #333;
            color: #fff;
            padding: 0 3px;
            font-size: 12px;
            background: #000;
            outline: 0;
          }
        .form-cont form .mod .content-form textarea::placeholder{
          color: #fff;
        }
        .form-cont form .mod .content-form input::placeholder{
          color: #fff;
        }
     .form-cont form button{
      text-decoration: none;
      text-transform: uppercase;
      font-size: 15px;
      border: none;
      padding: 7px 30px;
      cursor: pointer;
     }

.mfp-close-btn-in .mfp-close{
  color: #fff !important;
}
.cerrar{
   position: absolute;
  top: 3%;
  right: 4%;
}
 
.cerrar a{
  color: #fff ;
  font-size: 20px;
}
.mfp-bg{
   opacity: 0.3;
}
.mfp-content{
  margin-top: 80px
}
    
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>