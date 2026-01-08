<?php
error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $id_persona = $_GET['idpersona'];
  echo $idsolicitud = strtoupper($_POST['ID_SOLICITUD']);
  echo "<br>";
  echo $datesolicitud = $_POST['FECHA_SOLICITUD'];
  echo "<br>";
  echo $nameautoridad = strtoupper($_POST['NOMBRE_AUTORIDAD']);
  echo "<br>";
  if ($nameautoridad == 'OTRO') {
    echo $otherautoridad = strtoupper($_POST['OTHER_AUTORIDAD1']);
    echo "<br>";
  }
  echo $nameservidor = strtoupper($_POST['NOMBRE_SERVIDOR']);
  echo "<br>";
  echo $apaternoservidor = strtoupper($_POST['PATERNO_SERVIDOR']);
  echo "<br>";
  echo $amaternoservidor = strtoupper($_POST['MATERNO_SERVIDOR']);
  echo "<br>";
  echo $cargoservidor = strtoupper($_POST['CARGO_SERVIDOR']);
  echo "<br>";
  if ($nameautoridad == 'OTRO') {
    $addotherautoridad = "INSERT INTO nombreautoridad (nombre)
            VALUES ('$otherautoridad')";
    $raddotherautoridad = $mysqli->query($addotherautoridad);
    $uptautoridadpersona = "UPDATE autoridad SET idsolicitud ='$idsolicitud', nombreautoridad='$otherautoridad', otraautoridad='$otherautoridad',
                      nombreservidor='$nameservidor', apellidopaterno='$apaternoservidor', apellidomaterno='$amaternoservidor', cargoservidor='$cargoservidor',
                      fechasolicitud='$datesolicitud' WHERE id_persona = '$id_persona'";
    $ruptautoridadpersona = $mysqli->query($uptautoridadpersona);
  }else {
    $uptautoridadpersona = "UPDATE autoridad SET idsolicitud ='$idsolicitud', nombreautoridad='$nameautoridad', otraautoridad='$otherautoridad',
    nombreservidor='$nameservidor', apellidopaterno='$apaternoservidor', apellidomaterno='$amaternoservidor', cargoservidor='$cargoservidor',
    fechasolicitud='$datesolicitud' WHERE id_persona = '$id_persona'";
    $ruptautoridadpersona = $mysqli->query($uptautoridadpersona);
  }
  if ($ruptautoridadpersona) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACIÓN EXITOSA¡¡¡¡¡')
   </script>");
  }
}

?>
