## ¿Cómo traigo la fecha 2021-02-11 en este formato: 11 de septiembre 2020?
Tenemos una función auxiliar, /api/models/assets/Fecha.php, que nos permite cargar fechas traducidas al español si hiciera falta: 
```
$fecha = new Fecha($datos->fecha);
$fecha_formateada = $fecha->format('j').' de '.$fecha->format('F').' '.$fecha->format('Y');
```
Le pasamos la fecha tal cual viene de la base de datos y formateamos cada parte usando los formatos posibles definidos para DateTime (https://www.php.net/manual/es/datetime.createfromformat.php). Lo único que hace la clase Fecha es traducir algunos formatos como "F" que traduce por ejemplo, "December" a "Diciembre".
