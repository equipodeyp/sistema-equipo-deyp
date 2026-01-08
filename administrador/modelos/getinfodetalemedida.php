<?php
$idmedida = $_GET['id'];
// echo $fol_exp;
// get info medidas
$getinfomedida = "SELECT * FROM medidas WHERE id = '$idmedida'";
$rgetinfomedida = $mysqli->query($getinfomedida);
$fgetinfomedida = $rgetinfomedida->fetch_assoc();
$idpersona = $fgetinfomedida['id_persona'];
// get info sujeto con idpersona
$getdatospersona = "SELECT * FROM datospersonales WHERE id = '$idpersona'";
$rgetdatospersona = $mysqli ->query($getdatospersona);
$fgetdatospersona = $rgetdatospersona -> fetch_assoc();

// get datos de validacion de medida
$fol=" SELECT * FROM validar_medida WHERE id_medida='$idmedida'";
$resultfol = $mysqli->query($fol);
$rowfol1=$resultfol->fetch_assoc();
$name_folio=$rowfol1['folioexpediente'];
$validacion = $rowfol1['validar_datos'];

?>
