## ¿Cómo coloco la URL de una noticia en el listado? EJ: "noticias/esta-es-la-nota-1"

1- En /api/config/url.php definís la plantilla de la URL de una noticia:
```
return array(
	[...]
	'noticia' => '"noticias/{titulo}-{id}',
);
```

2- En /api/models/Noticia.php construís la URL pasándole los datos a url() que necesita para construirla:
```
Class Noticia extends Base{
	public function url(){
		return url('noticia', array(
			'titulo' => $this->titulo,
			'id' => $this->id,
			));
	}
	[...]
}
```

3- En /noticias.php obtenés las noticias e imprimís los datos que necesites:
```
$noticias = Noticia::obtener('todas);
foreach($noticias as $n){
    echo $n->url;
}
```

4- En /.htaccess mapeás la URL que creaste a la ficha de una noticia:
```
### Secciones ###
[...]
RewriteRule ^noticias/([^/]+)-([0-9]+)/?$   noticia.php?id=$1   [QSA,L]
##################
```