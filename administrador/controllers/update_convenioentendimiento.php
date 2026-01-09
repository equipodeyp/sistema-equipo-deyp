<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  echo $id_persona = $_GET['idpersona'];
  // get folioexpediente de persona
  $getfolexppersona ="SELECT * FROM datospersonales WHERE id = '$id_persona'";
  $rgetfolexppersona = $mysqli->query($getfolexppersona);
  $fgetfolexppersona = $rgetfolexppersona ->fetch_assoc();
  // get datos de formulario
  echo "<br>";
  echo $estudio = $_POST['ANALISIS_MULTIDISCIPLINARIO'];
  echo "<br>";
  echo $incorporacion = $_POST['INCORPORACION'];
  echo "<br>";
  echo $date_autorizacion = $_POST['FECHA_AUTORIZACION'];
  echo "<br>";
  echo $id_estudio = strtoupper($_POST['id_analisis']);
  echo "<br>";
  echo $convenio = $_POST['CONVENIO_ENTENDIMIENTO'];
  echo "<br>";
  echo $date_firma = $_POST['FECHA_CONVENIO_ENTENDIMIENTO'];
  echo "<br>";
  echo $date_inicio = $_POST['fecha_inicio'];
  echo "<br>";
  echo $vigencia = $_POST['ipt_vigenciaconv'];
  echo "<br>";
  if ($date_inicio != '' && $vigencia != '') {
    $fecha_vigencia = date("Y/m/d",strtotime($date_inicio."+ $vigencia days"));
    $fecha_termino = date("d/m/Y",strtotime($fecha_vigencia."- 1 days"));
    $fecha_finalconvenio = date("Y/m/d",strtotime($fecha_vigencia."- 1 days"));
  }else {
    $date_inicio = '';
    $vigencia = '';
    $fecha_termino = '';
    $fecha_finalconvenio = '';
  }
  echo $id_convenio = strtoupper($_POST['id_convenio']);
  echo "<br>";
  echo $estatus = $_POST['ESTATUS_PERSONA'];
  echo "<br>";
  echo $activo = $_POST['activoprograma'];
  echo "<br>";
  echo $desincorporacion = $_POST['CONCLUSION_CANCELACION_EXP'];
  echo "<br>";
  echo $date_desincorporacion = $_POST['FECHA_DESINCORPORACION'];
  echo "<br>";
  echo $date_cancelacion = $_POST['date_cancelacion'];
  echo "<br>";
  echo $conclusion_art35 = $_POST['CONCLUSION_ART351'];
  echo "<br>";
  if ($conclusion_art35 == 'IX. ESTABLECIDAS EN EL CONVENIO DE ENTENDIMIENTO' || $conclusion_art35 == 'OTRO') {
    echo $other = strtoupper($_POST['OTHER_ART351']);
    echo "<br>";
  }else {
    echo $other = '';
    echo "<br>";
  }

  //////////////////////////////////////////////////////////////////////////////
  // consultar primero la informacion de los selects para poder actualizar
  $check_det_incor = "SELECT * FROM determinacionincorporacion WHERE id_persona = '$id_persona'";
  $res_check_det_incor = $mysqli->query($check_det_incor);
  $filachk = $res_check_det_incor->fetch_assoc();
  // echo $filachk['multidisciplinario'];
  //////////////////////////////////////////////////////////////////////////////
  if ($filachk['multidisciplinario'] === 'EN ELABORACION' || $filachk['multidisciplinario'] === '') {
      $updatedeterminacion = "UPDATE determinacionincorporacion SET multidisciplinario='$estudio', incorporacion = '$incorporacion', date_autorizacion = '$date_autorizacion', id_analisis = '$id_estudio'
      WHERE id_persona = '$id_persona'";
      $rupdatedeterminacion = $mysqli->query($updatedeterminacion);
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($filachk['convenio'] === '' || $filachk['convenio'] === 'PENDIENTE DE EJECUCION') {
    $updatedeterminacion = "UPDATE determinacionincorporacion SET convenio='$convenio', vigencia = '$vigencia', date_convenio = '$date_firma', fecha_inicio = '$date_inicio',
                                                      fecha_termino = '$fecha_termino', id_convenio = '$id_convenio', fecha_vigencia = '$fecha_finalconvenio'
                                                  WHERE id_persona = '$id_persona' ";
    $rupdatedeterminacion = $mysqli->query($updatedeterminacion);
    echo $fol_expediente = $fgetfolexppersona['folioexpediente'];
    echo "<br>";
    echo $id_unico = $fgetfolexppersona['identificador'];
    echo "<br>";
    echo $estatus_suj_alert = 'PENDIENTE';
    echo "<br>";
    echo $tipo_convenio_alert = 'CONVENIO DE ENTENDIMIENTO';
    echo "<br>";
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($convenio === 'FORMALIZADO') {
    // sql para agregar registro en la tabla de alerta de convenios
    $alert_conv = "INSERT INTO alerta_convenios(expediente, id_persona, id_unico, fecha_inicio, fecha_termino, estatus, tipo_convenio)
                          VALUES('$fol_expediente', '$id_persona', '$id_unico', '$fecha_inicio', '$fecha_finalconvenio', '$estatus_suj_alert', '$tipo_convenio_alert')";
    $ralert_conv = $mysqli ->query($alert_conv);
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($fgetfolexppersona['estatus'] === 'PERSONA PROPUESTA' || $fgetfolexppersona['estatus'] === 'SUJETO PROTEGIDO' || $fgetfolexppersona['estatus'] === '' || $fgetfolexppersona['estatus'] === 'SUSPENDIDO TEMPORALMENTE') {
    $datos_persona = "UPDATE datospersonales SET estatus='$estatus'  WHERE id = '$id_persona'";
    $res_dat_per = $mysqli->query($datos_persona);
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($estatus == 'DESINCORPORADO' || $estatus == 'NO INCORPORADO') {
    if ($desincorporacion == 'CANCELACION') {
      $updatedeterminacion = "UPDATE determinacionincorporacion SET conclu_cancel='$desincorporacion', date_desincorporacion='$date_cancelacion'
                                                    WHERE id_persona = '$id_persona' ";
      $rupdatedeterminacion = $mysqli->query($updatedeterminacion);
    }elseif ($desincorporacion == 'CONCLUSION') {
      $updatedeterminacion = "UPDATE determinacionincorporacion SET conclu_cancel='$desincorporacion', conclusionart35='$conclusion_art35', otroart35='$other',
                                                        date_desincorporacion='$date_desincorporacion' WHERE id_persona = '$id_persona' ";
      $rupdatedeterminacion = $mysqli->query($updatedeterminacion);
    }
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($activo == 'on') {
    $datos_personastatusprog = "UPDATE datospersonales SET estatusprograma='ACTIVO'  WHERE id = '$id_persona'";
    $res_dat_per_statusprog = $mysqli->query($datos_personastatusprog);
  }else {
    $datos_personastatusprog = "UPDATE datospersonales SET estatusprograma='INACTIVO'  WHERE id = '$id_persona'";
    $res_dat_per_statusprog = $mysqli->query($datos_personastatusprog);
  }
  //////////////////////////////////////////////////////////////////////////////
  if ($rupdatedeterminacion || $res_dat_per_statusprog) {
    echo ("<script type='text/javaScript'>
     window.location.href='../seguimiento_persona.php?folio=$id_persona';
     window.alert('!!!!!ACTUALIZACION CORRECTA¡¡¡¡¡')
   </script>");
  }
}
?>
