<?php
error_reporting(0);
require 'conexion.php';
session_start ();
echo $id_persona = $_GET['folio'];   //variable del folio al que se relaciona
// datos de la autoridad
echo '<br>';
echo $numero_medidas = $_POST['num_medidas'];
echo '<br>';
$name = $_SESSION['usuario'];
$folio_exp=" SELECT * FROM datospersonales WHERE id='$id_persona'";
$resultfolio_exp = $mysqli->query($folio_exp);
$rowfolio_exp=$resultfolio_exp->fetch_assoc();
$folio_expediente=$rowfolio_exp['folioexpediente'];
date_default_timezone_set("America/Mexico_City");
$fecha = date('y/m/d H:i:sa');

for ($i=1; $i <= $numero_medidas; $i++) {
  // echo $i;
  // echo '<br>';

  $addmedidas = "INSERT INTO medidas (categoria, tipo, clasificacion, medida, descripcion, date_provisional, estatus, folioexpediente, id_persona, fecha_captura)
                 VALUES('INICIAL', 'PROVISIONAL', '', '', '', '', 'EN EJECUCION', '$folio_expediente', '$id_persona', '$fecha')";
  $res_addmedidas = $mysqli->query($addmedidas);
  if ($res_addmedidas) {
    $qry = "select max(ID) As id from medidas";
    $result = $mysqli->query($qry);
    $row = $result->fetch_assoc();
    $id_med =$row["id"];
    $validar = 'false';
    $validar_datos = 'true';
    $primerval = 'false';
    $fecha_captura = date('y/m/d H:i:sa');

    $mult_meds = "INSERT INTO multidisciplinario_medidas(acuerdo, conclusionart35, date_close, folioexpediente, id_persona, id_medida)
                  VALUES ('', '',  '', '$folio_expediente', '$id_persona', '$id_med')";
    $res_mult_meds = $mysqli->query($mult_meds);

    $val_medida = "INSERT INTO validar_medida(folioexpediente, id_persona, id_medida, validacion, fecha_captura, validar_datos, usuario3,  1ervalidacion)
                    VALUES ('$folio_expediente', '$id_persona', '$id_med', '$validar', '$fecha_captura', '$validar_datos', '$name', '$primerval')";
    $res_validar_medida = $mysqli->query($val_medida);
  }

}
if($res_mult_meds && $res_validar_medida){
  echo ("<script type='text/javaScript'>
   window.location.href='../subdireccion_de_apoyo_tecnico_juridico/detalles_medidas.php?folio=$id_persona';
   window.alert('!!!!!Registro exitoso¡¡¡¡¡')
 </script>");
}else {
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
