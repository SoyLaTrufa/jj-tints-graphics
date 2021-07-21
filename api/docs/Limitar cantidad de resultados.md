## ¿Cómo muestro solo 3 noticias?
En /api/models/Base.php tenés varios filtros predefinidos, entre ellos uno para limitar los resultados:

```
/** 
* Construye el SQL para los distintos filtros
*/
protected static function filtro($tabla, $tipo, $dato = null){

    [...]

    case 'ultimos':
    case 'ultimas':
        $filtro = array(
            'limit'  => $dato ? intval($dato) : 1,
        );
        break;

    [...]

    case 'limit':
        if(is_array($dato)){
            $limit = intval($dato[0]).', '.intval($dato[1]);
        }else{
            $limit = intval($dato);
        }
        $filtro = array(
            'limit' => $limit,
        );
        break;
    
    [...]
```

Para mostrar 3 noticias podrías hacer:

```
Noticia::obtener('ultimas' 3);
```

o

```
Noticia::obtener('limit' 3);
``` 

PD: Te va a traer las últimas 3 o las primeras 3 dependiendo del orden de los resultados. Por defecto vienen ordenados de primero a último. Lo vemos en /api/models/Base.php
```
/**
* Define el SQL por defecto para cada cláusula
*/
protected static function sql_defecto($tabla, $clausula, $sentencias){
    switch($clausula){
        [...]

        case 'order' :
            return 'ORDER BY '.(!empty($sentencias) ? implode(',', $sentencias).',' : '').' '.$tabla.'.orden ASC, '.$tabla.'.id ASC';

        [...]
    }
}
```

Esto se puede cambiar agregando esto, por ejemplo, en /api/models/Noticia.php:
```
protected static function sql_defecto($tabla, $clausula, $sentencias){
    if ('order'=== $clausula) {
        $sentencias[] = $tabla.'.id DESC';
    }
    return parent::sql_defecto($tabla, $clausula, $sentencias);
}
```