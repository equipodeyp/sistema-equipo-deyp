<?php
//configuracion de la conexion
$servidor = 'localhost';
$BD = 'sistemafgjem';
$usuario = 'root';
$password = '';

//establezco la conexion con PDO en este caso para MySQL u otro gestor
$DB = new PDO("mysql:host=$servidor; dbname=$BD", $usuario, $password);

//aplico el cotejamiento
$DB->exec("SET CHARACTER SET utf8");
?>
