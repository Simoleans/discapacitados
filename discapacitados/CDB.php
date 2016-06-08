<?php

//////// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());

	$conexion = mysql_select_db('desarrollo_social',$link) 
	or die('No se pudo seleccionar la base de datos');


?>


