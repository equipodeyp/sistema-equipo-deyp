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
  // get folioexpediente de tabla datospersonales
  $getfolio = "SELECT * FROM datospersonales WHERE id = '$id_persona'";
  $rgetfolio = $mysqli->query($getfolio);
  $fgetfolio = $rgetfolio ->fetch_assoc();
  $folioexpediente = $fgetfolio['folioexpediente'];
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
  $categoria = $_POST['form_category_of_medida'];
  $tipo = $_POST['form_type_of_medida'];
  if ($tipo == 'PROVISIONAL') {
    $dateprovisional = $_POST['form_date_extent_of_provisional'];
    $datedefinitiva = '';
  }elseif ($tipo == 'DEFINITIVA') {
    $dateprovisional = $_POST['form_date_extent_of_definitiva'];
    $datedefinitiva = $_POST['form_date_extent_of_definitiva'];
  }
  $clasificacion = $_POST['form_classification_of_medida'];
  if ($clasificacion == 'ASISTENCIA') {
    $medida = $_POST['form_extent_of_attendance'];
    if ($medida == 'VI. OTRAS') {
      $descripcion = strtoupper($_POST['form_otherextent_of_attendance']);
    }else {
      $descripcion = '';
    }
  }elseif ($clasificacion == 'RESGUARDO') {
    $medida = $_POST['form_guard_of_attendance'];
    if ($medida == 'XI. EJECUCION DE MEDIDAS PROCESALES') {
      $descripcion = $_POST['form_medida_procesal'];
    }elseif ($medida == 'XII. MEDIDAS OTORGADAS A SUJETOS RECLUIDOS') {
      $descripcion = $_POST['form_medida_sujetosrecluidos'];
    }elseif ($medida == 'XIII. OTRAS MEDIDAS') {
      $descripcion = strtoupper($_POST['form_other_medida_guard']);
    }else {
      $descripcion = '';
    }
  }
  $comentario =strtoupper($_POST['commentmediprovsuj']);
  $comment_mascara = 2;
  $estatus = 'EN EJECUCION';
  // add medida
  $addmedida = "INSERT INTO medidas (categoria, tipo, clasificacion, medida, descripcion, date_provisional, date_definitva, estatus, folioexpediente, id_persona, fecha_captura)
                              VALUES('$categoria', '$tipo', '$clasificacion', '$medida', '$descripcion', '$dateprovisional', '$datedefinitiva', '$estatus', '$folioexpediente', '$id_persona', '$fecha')";
  $raddmedida = $mysqli->query($addmedida);
  // get id de medida agregada
  $qry = "select max(id) As id from medidas";
  $result = $mysqli->query($qry);
  $row = $result->fetch_assoc();
  $id_medida =$row["id"];
  // add miltidisciplinario medidas
  $mult_meds = "INSERT INTO multidisciplinario_medidas(folioexpediente, id_persona, id_medida)
                VALUES ('$folioexpediente', '$id_persona', '$id_medida')";
  $res_mult_meds = $mysqli->query($mult_meds);
  // creacion de la medida para validacion posterior
  $validar = 'false';
  $validar_datos = 'false';
  $primerval = 'true';
  // $fecha_captura = date('y/m/d H:i:sa');
  $val_medida = "INSERT INTO validar_medida(folioexpediente, id_persona, id_medida, validacion, fecha_captura, validar_datos, 1ervalidacion)
                  VALUES ('$folioexpediente', '$id_persona', '$id_medida', '$validar', '$fecha', '$validar_datos', '$primerval')";
  $res_validar_medida = $mysqli->query($val_medida);
  // add comentario si es que tiene datos
  if ($comentario != '') {
    $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
    VALUES ('$comentario', '$folioexpediente', '$comment_mascara', '$name', '$id_persona', '$id_medida', '$fecha')";
    $rcomment = $mysqli->query($comment);
  }
  // validar adds
  if ($raddmedida && $res_mult_meds && $res_validar_medida) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!MEDIDA AGREGADA¡¡¡¡¡')
   </script>");
  }
}
?>
