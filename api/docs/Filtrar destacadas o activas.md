## ¿Cómo marco si es destacada o si está activa?

Suponiendo que en el CMS agregaste un campo "activa" y uno "destacada":

### Opción #1
En /api/models/Noticia.php guardas los datos que vienen de la BD ($datos) en el objeto Noticia para poder accederlos:
```
Class Noticia {
	protected function __construct($datos){
		$this->id = $datos->id;
		$this->activa = $datos->activa;
		$this->destacada = $datos->destacada;

		[...]
```

Y después en /noticias.php obtenés las noticias e imprimís los datos que necesites:
```
$noticias = Noticia::obtener('todas);
foreach($noticias as $n){
    if($n->activa){
        // Tu hermoso código
    }
}
```

### Opción #2
En /noticias.php obtenés solo las noticias activas o destacadas:
```
$noticias_activas = Noticia::obtener('activa);
$noticias_destacadas = Noticia::obtener('destacada);
foreach($noticias as $n){
    if($n->activa){
        // Tu hermoso código
    }
}
```

Esto funciona porque en /api/models/Base.php ya están definidos esos filtros:
```
/** 
* Construye el SQL para los distintos filtros
*/
protected static function filtro($tabla, $tipo, $dato = null){
    [...]
    case 'activa':
    case 'activo':
    case 'destacada':
    case 'destacado':
        $filtro = array(
            'where'  => $tabla.'.'.$tipo.' = 1',
        );
        break;
    [...]
}
```