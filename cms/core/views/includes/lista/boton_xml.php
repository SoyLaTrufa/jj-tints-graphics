<?php

$html_boton_xml = ( isset($xls_btn) AND $xls_btn) ?
	'<a class="boton boton--xls" href="'.base_url().'index.php/'.$controller.'/exportxls'.
	( (isset($_GET) AND  !empty($_GET)) ? '?'.http_build_query($_GET) : '')
	.'">XLS</a>' : '';

return $html_boton_xml;