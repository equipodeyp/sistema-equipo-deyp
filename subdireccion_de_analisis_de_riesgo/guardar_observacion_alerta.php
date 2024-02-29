<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  // carga de datos
  $id_alerta = $_GET['folio'];  //variable del folio al que se relaciona
  $check = "SELECT * FROM alerta_convenios WHERE id = '$id_alerta'";
  $rcheck = $mysqli -> query($check);
  $fcheck = $rcheck ->fetch_assoc();
  $idpersona = $fcheck['id_persona'];
  $idunico = $fcheck['id_unico'];
  $folioexpediente = $fcheck['expediente'];
  $observacion_alerta = $_POST['observacion_alert'];
  $estatus_alerta = $_POST['SIDO_RESUELTO'];

  date_default_timezone_set("America/Mexico_City");
  $fecha_observacion = date('Y/m/d H:i:sa');

  // id	id_persona	id_unico	folioexpediente	observacion	id_alerta	usuario	fecha
  if ($estatus_alerta === 'HECHO') {
    $updatealerta = "UPDATE alerta_convenios SET semaforo = 'RESUELTO', estatus = '$estatus_alerta' WHERE id = '$id_alerta'";
    $rupdatealerta = $mysqli->query($updatealerta);
  }

  $add_observacion = "INSERT INTO observaciones_alertas(id_persona, id_unico, folioexpediente, observacion, id_alerta, usuario, fecha)
                             VALUES('$idpersona', '$idunico', '$folioexpediente', '$observacion_alerta', '$id_alerta', '$name', '$fecha_observacion')";
  $res_add_observacion = $mysqli->query($add_observacion);
  // validacion de update correcto
  if($res_add_observacion){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_analisis_de_riesgo/menu.php';
     window.alert('!!!!!REGISTRO EXITOSO¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=menu.php'>";
}
?>
