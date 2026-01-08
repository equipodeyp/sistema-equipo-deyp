<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $id_medida = $_GET['idmedida'];
  // get id de persona de la tabla medidas
  $getinfopers = "SELECT * FROM medidas WHERE id = '$id_medida'";
  $rgetinfopers = $mysqli ->query($getinfopers);
  $fgetinfopers = $rgetinfopers ->fetch_assoc();
  $id_persona = $fgetinfopers['id_persona'];
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
  $idconvenio = strtoupper($_POST['idconvenioent']);
  $dateinicio = $_POST['dateinicioampliacion'];
  $daysvigencia = $_POST['daysvigenciaampliacion'];
  if ($dateinicio != '') {
    $fecha_mas = date("Y/m/d",strtotime($dateinicio."+ $daysvigencia days"));
    $datetermino = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
  }
  // add ampliacion medida alojamiento temporal
  $add_ampliacion_alojamiento = "INSERT INTO ampliacion_alojamiento_temporal(id_medida_alojamiento, id_convenio, fecha_inicio, dias_vigencia, fecha_termino_ampliacion)
                                                                      VALUES('$id_medida', '$idconvenio', '$dateinicio', '$daysvigencia', '$datetermino')";
  $res_add_ampliacion_alojamiento = $mysqli->query($add_ampliacion_alojamiento);
  //cambiar true a false para validar datos de la medida
  $validardatos = 'false';
  $val_medida = "UPDATE validar_medida SET validar_datos = '$validardatos', usuario3 = '$name' WHERE id_medida = '$id_medida'";
  $res_validar_medida = $mysqli->query($val_medida);

  // validar adds
  if ($res_add_ampliacion_alojamiento) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!AMPLIACION AGREGADA¡¡¡¡¡')
   </script>");
  }
}
?>
