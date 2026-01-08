<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  echo $id_medida = $_GET['idmedida'];
  // get id del sujeto
  $medida = "SELECT * FROM medidas WHERE id = '$id_medida'";
  $resultadomedida = $mysqli->query($medida);
  $rowmedida = $resultadomedida->fetch_assoc();
  $id_persona = $rowmedida['id_persona'];
  // tabla validar_medida
  //cambiar true a false para validar datos de la medida
  $validardatos = 'true';
  $val_medida = "UPDATE validar_medida SET validar_datos = '$validardatos', usuario = '$name' WHERE id_medida = '$id_medida'";
  $res_validar_medida = $mysqli->query($val_medida);
  // validar que se elimino la medida
  if($res_validar_medida){
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     
   </script>");
  }
}
?>
