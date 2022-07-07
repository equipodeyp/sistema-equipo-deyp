<?php
session_start ();

$fol_exp = $_SESSION['idpersona'];
$name_folio = $_SESSION['folio_expediente'];
$id_pers = $_SESSION['iniciales_pers'];
// echo $fol_exp;
// echo $name_folio;
// echo $id_pers;
// 1 UPSIPPED/SAR/TOL-TOL/001/2021 JAMA-001

$name_carpeta = $name_folio;
$resultado = str_replace("/", "-", $name_carpeta);
// echo $resultado;

$fichero = $_FILES["file"];


move_uploaded_file($fichero["tmp_name"], "../subdireccion_de_apoyo_tecnico_juridico/repo/$resultado/$id_pers/".$fichero["name"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);


?>