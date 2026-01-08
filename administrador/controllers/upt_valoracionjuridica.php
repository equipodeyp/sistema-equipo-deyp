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
  $resultadovaljur = $_POST['RESULTADO_VALORACION_JURIDICA'];
  if ($resultadovaljur == 'SI PROCEDE') {
    $motivo = '';
  }elseif ($resultadovaljur == 'NO PROCEDE') {
    $motivo = $_POST['MOTIVO_NO_PROCEDENCIA'];
  }elseif ($resultadovaljur == 'PARCIALMENTE PROCEDE') {
    $motivo = $_POST['articulo23proc'];
  }
  // update valoracion juridica de la persona de tabla valoracionjuridica
  $uptprocesopenalpersona = "UPDATE valoracionjuridica SET resultadovaloracion ='$resultadovaljur', motivoprocedencia='$motivo'
                             WHERE id_persona = '$id_persona'";
  $ruptprocesopenalpersona = $mysqli->query($uptprocesopenalpersona);
  if ($ruptprocesopenalpersona) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_persona.php?folio=$id_persona';
     window.alert('!!!!!VALORACION JURIDICA ACTUALIZADA¡¡¡¡¡')
   </script>");
  }

}
?>
