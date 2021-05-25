<?php
$conexion = mysqli_connect("127.0.0.1","admin","admin","curs") or die('la conexión ha fallado');

mysqli_set_charset($conexion, "utf8");
mysqli_query($conexion,"SET lc_time_names = 'es_ES'");
mysqli_query($conexion,"SET lc_time_names = 'ca_ES'");
?>