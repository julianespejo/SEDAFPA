<?php
@$conexion=mysql_connect("localhost", "root", "toor") 
or exit("No se pudo establecer una conexión");
@$dbseleccionada=mysql_select_db("acuacultura", $conexion)
or exit("No se pudo seleccionar la base de datos");
?>