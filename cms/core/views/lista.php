<?php

$buscador = include('includes/lista/buscador.php');

$listado_cabecera = $this->load->view(
    'includes/lista/cabecera',
    array(
        'campos_form' => $campos_form,
        'ordenar'     => $ordenar,
        'acciones_en_lote' => $acciones_en_lote,
        'controller'  => $controller
    ), true);

         
         
$listado_cuerpo = '';
foreach($items as $item){
    $campos = $this->load->view('includes/lista/campos', array('campos_form' => $campos_form, 'item' => $item), true);
    $acciones   = include('includes/lista/acciones.php');
    $listado_cuerpo .=
    '<tr class="item" data-id="'.$item->id.'">'.
        ($ordenar ? '<td class="js-orden grip"><i class="fa fa-list-ul" aria-hidden="true"></i></td>' : '').
        ($acciones_en_lote ? '<td><input class="js-AEL-item" type="checkbox" name="items_eliminar['.$item->id.']" value="'.$item->id.'"/></td>' : '').
        $campos.
        '<td class="bottons">'.$acciones.'</td>'.
    '</tr>';
}

$boton_csv = include('includes/lista/boton_csv.php');
$boton_xml = include('includes/lista/boton_xml.php');

?>

<div id="wrapper" class="wrap-logueado">
    <div id="content">
        <?php 

            if ($controller != 'dashboard') { ?>
                

                <div class="<?php echo ($buscador!='') ? 'border-bottom' : ''?>">
                    <?php echo $buscador?>
                </div>

                <div class="mensaje-feedback" style="display: none;"><?php echo isset($message) ? $message : ''; ?></div>

                <div class="top-table">
                    <!-- <?= $name ? '<h1>Listado de '.$name.'</h1>' : '<br><br>' ?> -->
                    <div class="lista_acciones-gral">
                        <?php echo ($add_button) ? '<input type="button" class="boton" value="'.$add_button_label.'" onclick="document.location.href = \''.base_url().$controller.'/add/'.$uriParameters.'\'">' : ''; ?>
                        <?php echo $boton_csv; ?>
                        <?php echo $boton_xml; ?>
                        <!-- <?php echo $name; ?> -->
                    </div>
                </div>

                <div class="clear"></div>

                <?php if($acciones_en_lote){?>
                <div class="acciones-en-lote">
                    <select class="js-AEL-accion">
                        <option value="">Acciones en lote</option>
                        <option value="eliminar">Eliminar</option>
                    </select>
                    <button class="js-AEL-aplicar boton boton--sm" type="submit">Aplicar</button>
                </div>
                <?php } ?>

                <table class="list <?=$ordenar ? 'lista-ordenable' : ''?> js-AEL-contenedor">
                    <thead>
                       <?php echo $listado_cabecera; ?>
                    </thead>
                    <tbody>
                        <?php echo ($listado_cuerpo!='') ? $listado_cuerpo : '<td colspan="'.(count($campos_form) + 1).'">No hay datos para mostrar.</td>'; ?>
                    </tbody>
                </table>

                <div id="lol"></div>
                <script>
                        $('td[data-key="color"]').each(function(index) {
                          var cellText = $(this).html(); 
                          console.log(cellText); 

                          var sc = $('#lol').html(cellText);
                          $('header').css('background', '#'+cellText);
                        });

                                       

                </script>

                <input type="hidden" name="sort_order" id="sort_order" value="<?php echo implode('-',$orden); ?>"/>
                <input type="hidden" name="orden_inicio" id="orden_inicio" value="<?php echo intval($orden_inicio); ?>"/>

                <?php if($ordenar){?>
                <p>Agarrá y arrastrá las filas para ordenarlas.</p>
                <?php }?>

                <div class="pager">
                    <?php echo $paginator ?>
                </div>


            <?php } else {

                echo '<img src="'.base_url().'core/css/img/ico-home.png">';
                echo '<h1><span>Dashboard </span>'.EMPRESA.'</h1>';
                echo "<div class='dashboard'>";

                $server = 'localhost';
                $bd = 'tintsandgraphics_cms';
                $user = 'tintsandgraphics_admin';
                $password = 'cK?PQ}o6n=NX';

                  $conexion = @mysqli_connect($server, $user, $password, $bd);
                  if (!$conexion) {
                    echo "error";
                    die('error, no se pudo conectar: '. mysqli_connect_error());
                  }

                $Sqlproductos = "SELECT id FROM productos;";
                $productos = mysqli_query($conexion, $Sqlproductos);

                $Sqlpromociones = "SELECT id FROM promociones;";
                $promociones = mysqli_query($conexion, $Sqlpromociones);

                $Sqlusuarios = "SELECT id FROM admins;";
                $usuarios = mysqli_query($conexion, $Sqlusuarios);


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

                if ($solapa->nombre === 'Novedades') { continue; }
                if ($solapa->nombre === 'Dashboard') { continue; }
                if ($solapa->nombre === 'Menú') { continue; }
                if ($solapa->nombre === 'Apariencia') { continue; }
                if ($solapa->nombre === 'Usuarios') { 
                    if ($this->session->userdata('perfil')!='superadmin') { continue; }
                }

                echo '<li class="'.($activo ? 'current' : '').' '.
                    ($this->session->userdata('perfil')=='superadmin' ? $solapa->tipo : '').
                    ( ($this->session->userdata('perfil')!='superadmin' AND $solapa->tipo=='oculta') ? 'hidden': '').'">'.
                    '<h4>'.$solapa->nombre.'</h4>';
                    // echo ($listado_cuerpo!='') ? '<span>'.count($campos_form).'</span>' : '<span>0</span>';
                    if ($solapa->nombre == 'Productos') {
                        echo '<span>'.$productos->num_rows.'</span>';
                    } elseif ($solapa->nombre == 'Usuarios') {
                        echo '<span>'.$usuarios->num_rows.'</span>';
                    } elseif ($solapa->nombre == 'Promociones') {
                        echo '<span>'.$promociones->num_rows.'</span>';
                    } else{
                        echo '<span>0</span>';                        
                    }
                    // echo "<div class='botones'>";
                    // echo '<p>'.$solapa->nombre.'</p>';
                    echo '<div class="botones"><a href="'.
                        base_url().
                        $solapa->controlador.
                        ($solapa->listar!='todos' ? '/edit/'.$solapa->listar : '').
                        ($solapa->categoria!='' ? ($solapa->listar=='todos' ? '/index' : '').'?categ='.$solapa->categoria : '').
                    '">listado</a>';
                    if ($solapa->nombre == 'Productos') {
                        echo '<a href="productos/add">Crear</a></div></li>';
                    } elseif ($solapa->nombre == 'Usuarios') {
                        echo '<a href="admins/add">Crear</a></div></li>';
                    } elseif ($solapa->nombre == 'Promociones') {
                        echo '<a href="promociones/add">Crear</a></div></li>';
                    }  
                    // echo '<a href="novedades/add">Crear</a></div></li>';
            }

            echo "</div>";

            }

         ?>
    </div>
</div>
 

<?php

/// Scripts JS ///
// Ordenar listado con  drag and drop
if($ordenar){
    echo '<script src="'.base_url().'core/js/vistas/lista/ordenar.js"></script>';
}

// Editar checkboxs con AJAX
echo '<script src="'.base_url().'core/js/vistas/lista/checkbox_ajax.js"></script>';
?>