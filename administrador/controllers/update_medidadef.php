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
  $folioexp = $fgetinfopers['folioexpediente'];
  // get datos del formulario
  date_default_timezone_set("America/Mexico_City");
  $fecha = date('y/m/d H:i:sa');
  // regresa la validacion a false para validar nuevamente la informacion
  $validacion = 'false';
  $fecha_validacion = date('y/m/d H:i:sa');
  $fecha_captura = date('y/m/d H:i:sa');
  $comment_mascara = '2';

  if (isset($_POST['act_tipo'])) {
    $tipo = $_POST['act_tipo'];
    $datedefinitiva = $_POST['act_datedefinitiva'];
    // actualizar tipo y fecha definitiva de la medida
    $upt_meddefinitiva = "UPDATE medidas SET tipo ='$tipo', date_definitva='$datedefinitiva'
                  WHERE id = '$id_medida'";
    $rupt_meddefinitiva = $mysqli->query($upt_meddefinitiva);
    //cambiar true a false para validar datos de la medida
    $validardatos = 'false';
    $val_medida = "UPDATE validar_medida SET validar_datos = '$validardatos', usuario3 = '$name' WHERE id_medida = '$id_medida'";
    $res_validar_medida = $mysqli->query($val_medida);
  }
  if (isset($_POST['act_estatus'])) {
    $estatus = $_POST['act_estatus'];echo "<BR>";
    if ($estatus == 'EJECUTADA') {
      $municipio = $_POST['act_municipio'];
      $datetermino = $_POST['act_datetermino'];
      if (isset($_POST['act_conart35'])) {
        $conclusion = $_POST['act_conart35'];
        if ($conclusion == 'CONVENIO') {
          $especificar = strtoupper($_POST['act_otherart35']);
        }elseif ($conclusion == 'OTRO') {
          $especificar = strtoupper($_POST['act_otherconclusion']);
        }else {
          $especificar = '';
        }
        // get info tabla conclusionart35
        $getconclusionconv = "SELECT * FROM conclusionart35 WHERE idsltname ='$conclusion'";
        $rgetconclusionconv = $mysqli ->query($getconclusionconv);
        if ($rgetconclusionconv) {
          if ($rgetconclusionconv ->num_rows > 0) {
            $fgetconclusionconv = $rgetconclusionconv ->fetch_assoc();
            $nameconclusion = $fgetconclusionconv['nombre'];
          }
        }
      }
      // actualizar estatus, municipio y fecha de ejecucion
      $upt_meddefinitiva = "UPDATE medidas SET estatus='$estatus', ejecucion='$municipio', date_ejecucion='$datetermino' WHERE id = '$id_medida'";
      $rupt_meddefinitiva = $mysqli->query($upt_meddefinitiva);
      // actualizar tabla de multidisciplinario_medidas con acuerdo, conclusionart35, otherart35 y date_close
      $uptmult_meds = "UPDATE multidisciplinario_medidas SET acuerdo='$nameconclusion', conclusionart35='$especificar', otherart35 = '$especificar', date_close='$datetermino' WHERE id_medida = '$id_medida'";
      $ruptmult_meds = $mysqli->query($uptmult_meds);
      // actualizar tabal de validar_medida para que tenga validacion false para que pueda validar sundirectora
      $datos_validacion = "UPDATE validar_medida SET validacion='$validacion', fecha_validacion = '$fecha_validacion', validar_datos = '$validacion' WHERE id_medida = '$id_medida'";
      $res_validacion = $mysqli->query($datos_validacion);
    }elseif ($estatus == 'CANCELADA') {
      $datecancelacion = $_POST['act_datecancelacion'];
      $motivo = strtoupper($_POST['act_motivocancel']);
      // actualizar estatus, motivo y fecha cancelada de la medida
      $upt_meddefinitiva = "UPDATE medidas SET estatus='$estatus', modificacion='$motivo', date_ejecucion='$datecancelacion' WHERE id = '$id_medida'";
      $rupt_meddefinitiva = $mysqli->query($upt_meddefinitiva);
      // actualizar tabal de multidisciplinario_medidas con fecha de cancelacion
      $uptmult_meds = "UPDATE multidisciplinario_medidas SET date_close='$datecancelacion' WHERE  id_medida = '$id_medida'";
      $ruptmult_meds = $mysqli->query($uptmult_meds);
      // actualizar tabal de validar_medida para que tenga validacion false para que pueda validar sundirectora
      $datos_validacion = "UPDATE validar_medida SET validacion='$validacion', fecha_validacion = '$fecha_validacion', validar_datos = '$validacion' WHERE id_medida = '$id_medida'";
      $res_validacion = $mysqli->query($datos_validacion);
    }
  }
  if (isset($_POST['commentmediprovsuj'])) {
    $commentmedida = strtoupper($_POST['commentmediprovsuj']);
    if ($commentmedida != '') {
      $comment = "INSERT INTO comentario(comentario, folioexpediente, comentario_mascara, usuario, id_persona, id_medida, fecha)
      VALUES ('$commentmedida', '$folioexp', '$comment_mascara', '$name', '$id_persona', '$id_medida', '$fecha_captura')";
      $rcomment = $mysqli->query($comment);
    }
  }
  // validando que se efectuo la actualizacion
  if ($rupt_meddefinitiva || $rcomment) {
    echo ("<script type='text/javaScript'>
     window.location.href='../detalles_medidas.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACION CORRECTA¡¡¡¡¡')
   </script>");
 }else {
   echo ("<script type='text/javaScript'>
    window.location.href='../detalles_medidas.php?folio=$id_persona';
    window.alert('NO SE ACTUALIZO NADA')
  </script>");
 }
}
?>
