<?php
// echo $name = $_SESSION['usuario'];
$fol_exp = $_GET['folio'];
// echo $fol_exp;
$fol=" SELECT * FROM datospersonales WHERE id='$fol_exp'";
$resultfol = $mysqli->query($fol);
$rowfol=$resultfol->fetch_assoc();
$name_folio=$rowfol['folioexpediente'];
$tipo_status=$rowfol['estatus'];
$identificador = $rowfol['identificador'];
$id_person = $rowfol['id'];
// contar si el sujeto aun no tiene medidas provisionales
$gettotalmedprovsujpp= "SELECT COUNT(*) AS totalmedidas FROM medidas WHERE id_persona = '$id_person'";
$rgettotalmedprovsujpp = $mysqli->query($gettotalmedprovsujpp);
$fgettotalmedprovsujpp = $rgettotalmedprovsujpp->fetch_assoc();
$counttotalmedidaspp = $fgettotalmedprovsujpp['totalmedidas'];
// get datos para agregar boton de ampliar medida de alojamiento temporal solo para sujetos que tengan esta medida
// obtener informacion si tiene medida de alojamiento temporal
$getalojtemp = "SELECT * FROM medidas
INNER JOIN datospersonales ON medidas.id_persona = datospersonales.id
WHERE medidas.id_persona = '$id_person' AND medidas.medida = 'VIII. ALOJAMIENTO TEMPORAL' AND medidas.estatus = 'EN EJECUCION' AND medidas.tipo = 'DEFINITIVA'
AND datospersonales.estatus ='SUJETO PROTEGIDO'";
$rgetalojtemp = $mysqli->query($getalojtemp);
if ($rgetalojtemp) {
  if ($rgetalojtemp->num_rows > 0) {
    $fgetalojtemp = $rgetalojtemp->fetch_assoc();
    $idmedidaalojtemp = $fgetalojtemp['id'];
    $showbuttonampliaralojamiento = 1;
  }else {
    $showbuttonampliaralojamiento = 0;
  }
}
// get datos de medida en general
$getdatosmedida = "SELECT * FROM medidas WHERE id_persona = '$id_person'";
$rgetdatosmedida = $mysqli->query($getdatosmedida);
$fgetdatosmedida = $rgetdatosmedida->fetch_assoc();
if ($fgetdatosmedida['date_definitva'] != '0000-00-00') {
  $ocultardateprov = 1;
}else {
  $ocultardateprov = 0;
}
// contar si existen medidas por validar
$countmedforval = "SELECT COUNT(*) AS totalmedvalidar FROM validar_medida WHERE id_persona ='$id_person' AND validar_datos ='false'";
$rcountmedforval = $mysqli->query($countmedforval);
$fcountmedforval = $rcountmedforval ->fetch_assoc();
$fcountmedforval['totalmedvalidar'];
if ($fcountmedforval['totalmedvalidar'] > 0) {
  $showfilacolvalidar = 1;
}else {
  $showfilacolvalidar = 0;
}
// contar si la persona ya cuenta con medidas ejecutadas
$getcontmedejecutadas = "SELECT COUNT(*) totalmedjecutadas FROM medidas WHERE id_persona = '$id_person' AND (estatus = 'EJECUTADA' OR estatus = 'CANCELADA')";
$rgetcontmedejecutadas = $mysqli->query($getcontmedejecutadas);
$fgetcontmedejecutadas = $rgetcontmedejecutadas ->fetch_assoc();
$resultmediejecutadas = $fgetcontmedejecutadas['totalmedjecutadas'];

$existvalidar = "SELECT COUNT(*) AS total FROM validar_medida
                  WHERE id_persona = '$id_person' AND validar_datos = 'false'";
$rexistvalidar = $mysqli->query($existvalidar);
$fexistvalidar = $rexistvalidar->fetch_assoc();
?>
