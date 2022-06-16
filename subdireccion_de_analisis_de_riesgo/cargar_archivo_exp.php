<?php
session_start ();
$folio_del_expediente = $_SESSION['folio_expediente'];

$name_carpeta = $folio_del_expediente;
$resultado = str_replace("/", "-", $name_carpeta);
// echo $resultado;


$fichero = $_FILES["file"];


move_uploaded_file($fichero["tmp_name"], "../subdireccion_de_analisis_de_riesgo/repo/$resultado/$resultado/".$fichero["name"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);


?>