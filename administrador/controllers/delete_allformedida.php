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
  // eliminar medida de las 3 tablas donde se almacena informacion de la misma
  // tabla medidas
  $deleteofmedida = "DELETE FROM medidas WHERE id='$id_medida'";
  $rdeleteofmedida = $mysqli->query($deleteofmedida);
  // resetear id de tabla medidas
  $resetmedidas = "ALTER TABLE medidas AUTO_INCREMENT = 1";
  $rresetmedidas = $mysqli->query($resetmedidas);
  // tabla multidisciplinario_medidas
  $deleteofmultidisciplinario = "DELETE FROM multidisciplinario_medidas WHERE id_medida='$id_medida'";
  $rdeleteofmultidisciplinario = $mysqli->query($deleteofmultidisciplinario);
  // resetear id de tabla medidas
  $resetmultidis = "ALTER TABLE multidisciplinario_medidas AUTO_INCREMENT = 1";
  $rresetmultidis = $mysqli->query($resetmultidis);
  // tabla validar_medida
  $deleteofvalidar = "DELETE FROM validar_medida WHERE id_medida='$id_medida'";
  $rdeleteofvalidar = $mysqli->query($deleteofvalidar);
  // resetear id de tabla medidas
  $resetvalidarmedida = "ALTER TABLE validar_medida AUTO_INCREMENT = 1";
  $rresetvalidarmedida = $mysqli->query($resetvalidarmedida);
  // validar que se elimino la medida
  if($rdeleteofmedida AND $rdeleteofmultidisciplinario AND $rdeleteofvalidar){
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!ELIMINACIÓN CORRECTA¡¡¡¡¡')
   </script>");
  }
}
?>
