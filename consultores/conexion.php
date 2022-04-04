<?php

	$mysqli = new mysqli('localhost', 'root', '', 'sistemafgjem');
	mysqli_set_charset($mysqli, 'utf8'); //linea a colocar

	if($mysqli->connect_error){

		die('Error en la conexion' . $mysqli->connect_error);

	}
?>
