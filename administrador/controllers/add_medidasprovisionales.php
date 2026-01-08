<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $id_persona = $_GET['idpersona'];
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
  $numero_medidasprov = $_POST['NUM_MEDIDAS_PROVISIONALES'];
  // get datos persona de tabla datospersonales
  $getdatopersona = "SELECT * FROM datospersonales WHERE id = '$id_persona'";
  $rgetdatopersona = $mysqli->query($getdatopersona);
  $fgetdatopersona = $rgetdatopersona ->fetch_assoc();
  $folioexpediente = $fgetdatopersona['folioexpediente'];
  // get datos persona de tabla datospersonales
  $getautoridadpersona = "SELECT * FROM autoridad WHERE id = '$id_persona'";
  $rgetautoridadpersona = $mysqli->query($getautoridadpersona);
  $fgetautoridadpersona = $rgetautoridadpersona ->fetch_assoc();
  $dateprovisionalper = $fgetautoridadpersona['fechasolicitud_persona'];
  // inicio de registro de medidas automatico segun el numero obtenido del form
  for ($i=1; $i <= $numero_medidasprov; $i++) {
    $addmedprov = "INSERT INTO medidas (categoria, tipo, date_provisional, estatus, folioexpediente, id_persona, fecha_captura)
                   VALUES('INICIAL', 'PROVISIONAL', '$dateprovisionalper', 'EN EJECUCION', '$folioexpediente', '$id_persona', '$fecha')";
    $raddmedprov = $mysqli->query($addmedprov);
    if ($raddmedprov) {
      $qry = "SELECT max(id) As id from medidas";
      $result = $mysqli->query($qry);
      $row = $result->fetch_assoc();
      $id_med =$row["id"];
      $validar = 'false';//subdireccion_de_analisis_de_riesgo
      $validar_datos = 'true';//Subdirección de estadistica y pre-registro
      $primerval = 'true';//Subdirección de apoyo tecnico y juridico
      $fecha_captura = date('y/m/d H:i:sa');

      $mult_meds = "INSERT INTO multidisciplinario_medidas(folioexpediente, id_persona, id_medida)
                    VALUES ('$folioexpediente', '$id_persona', '$id_med')";
      $res_mult_meds = $mysqli->query($mult_meds);

      $val_medida = "INSERT INTO validar_medida(folioexpediente, id_persona, id_medida, validacion, fecha_captura, validar_datos, usuario3,  1ervalidacion)
                      VALUES ('$folioexpediente', '$id_persona', '$id_med', '$validar', '$fecha_captura', '$validar_datos', '$name', '$primerval')";
      $res_validar_medida = $mysqli->query($val_medida);
    }
  }
  if ($raddmedprov && $res_mult_meds && $res_validar_medida) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!MEDIDAS PROVISIONALES GUARDADAS¡¡¡¡¡')
   </script>");
  }
}
?>
