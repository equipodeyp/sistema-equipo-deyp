<?php
session_start ();
$id_pers = $_SESSION['idpersona'];
$name_folio = $_SESSION['folio_expediente'];

$name_carpeta = $name_folio;
$resultado = str_replace("/", "-", $name_carpeta);
// echo $resultado;
// echo $id_pers;

$fichero = $_FILES["file"];


move_uploaded_file($fichero["tmp_name"], "../subdireccion_de_analisis_de_riesgo/repo/$resultado/$id_pers/".$fichero["name"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);


?>