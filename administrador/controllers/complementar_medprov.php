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
  $clasificacion = $_POST['CLASIFICACION_MEDIDA'];
  if ($clasificacion == 'ASISTENCIA') {
    $medidaincompleta = $_POST['MEDIDAS_ASISTENCIA'];
    if ($medidaincompleta == 'PSICOLOGICO') {
      $medidacompleta = 'TRATAMIENTO PSICOLOGICO';
    }elseif ($medidaincompleta == 'MEDICO') {
      $medidacompleta = 'TRATAMIENTO MEDICO';
    }elseif ($medidaincompleta == 'SANITARIO') {
      $medidacompleta = 'TRATAMIENTO SANITARIO';
    }elseif ($medidaincompleta == 'ASESORAMIENTO') {
      $medidacompleta = 'II. ASESORAMIENTO JURIDICO GRATUITO';
    }elseif ($medidaincompleta == 'GESTION') {
      $medidacompleta = 'III. GESTION DE TRAMITES';
    }elseif ($medidaincompleta == 'AYUDA') {
      $medidacompleta = 'IV. AYUDA DE SERVICIOS';
    }elseif ($medidaincompleta == 'APOYO') {
      $medidacompleta = 'V. APOYO ECONOMICO';
    }elseif ($medidaincompleta == 'OTRAS') {
      $medidacompleta = 'VI. OTRAS';
    }
    if ($medidacompleta == 'VI. OTRAS') {
      $descripcion = strtoupper($_POST['OTRA_MEDIDA_ASISTENCIA']);
    }else {
      $descripcion= '';
    }
  }elseif ($clasificacion == 'RESGUARDO') {
    $medidaincompleta = $_POST['MEDIDAS_RESGUARDO'];
    if ($medidaincompleta == 'SALVAGUARDA') {
      $medidacompleta = 'I. SALVAGUARDA DE LA INTEGRIDAD PERSONAL';
    }elseif ($medidaincompleta == 'VIGILANCIA') {
      $medidacompleta = 'II. VIGILANCIA';
    }elseif ($medidaincompleta == 'TRASLADO') {
      $medidacompleta = 'III. TRASLADO DEL SUJETO';
    }elseif ($medidaincompleta == 'CUSTODIA') {
      $medidacompleta = 'IV. CUSTODIA POLICIAL O DOMICILIARIA';
    }elseif ($medidaincompleta == 'REUBICACION') {
      $medidacompleta = 'V. REUBICACION.';
    }elseif ($medidaincompleta == 'MECANISMOS') {
      $medidacompleta = 'VI. MECANISMOS DE COMUNICACION INMEDIATA';
    }elseif ($medidaincompleta == 'CAMBIO') {
      $medidacompleta = 'VII. CAMBIO DE NUMERO DE TELEFONO';
    }elseif ($medidaincompleta == 'ALOJAMIENTO') {
      $medidacompleta = 'VIII. ALOJAMIENTO TEMPORAL';
    }elseif ($medidaincompleta == 'CAPACITACION') {
      $medidacompleta = 'IX. CAPACITACION DE MEDIDAS';
    }elseif ($medidaincompleta == 'NUEVAENTIDAD') {
      $medidacompleta = 'X. NUEVA IDENTIDAD DEL SUJETO';
    }elseif ($medidaincompleta == 'PROCESALES') {
      $medidacompleta = 'XI. EJECUCION DE MEDIDAS PROCESALES';
    }elseif ($medidaincompleta == 'RECLUIDOS') {
      $medidacompleta = 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS';
    }elseif ($medidaincompleta == 'OTRASR') {
      $medidacompleta = 'XIII. OTRAS MEDIDAS';
    }
    if ($medidacompleta == 'XI. EJECUCION DE MEDIDAS PROCESALES') {
      $descripcion = $_POST['RESGUARDO_XI'];
    }elseif ($medidacompleta == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
      $descripcion = $_POST['RESGUARDO_XII'];
    }elseif ($medidacompleta == 'XIII. OTRAS MEDIDAS') {
      $descripcion = strtoupper($_POST['OTRA_MEDIDA_RESGUARDO']);
    }else {
      $descripcion = '';
    }
  }
  // actualizar datos de medida provisional
  $upt_medprovisional = "UPDATE medidas SET clasificacion ='$clasificacion', medida='$medidacompleta', descripcion='$descripcion'
                WHERE id = '$id_medida'";
  $rupt_medprovisional = $mysqli->query($upt_medprovisional);
  //cambiar true a false para validar datos de la medida
  $validardatos = 'false';
  $val_medida = "UPDATE validar_medida SET validar_datos = '$validardatos', usuario3 = '$name' WHERE id_medida = '$id_medida'";
  $res_validar_medida = $mysqli->query($val_medida);

  if ($rupt_medprovisional) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACION CORRECTA¡¡¡¡¡')
   </script>");
  }
}
?>
