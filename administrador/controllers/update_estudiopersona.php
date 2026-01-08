<?php
// error_reporting(0);
require '../conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  echo $id_estudio = $_GET['idestudio'];
  // get datos de la evaluacion por persona
  $getevaluacionpersona ="SELECT * FROM evaluacion_persona WHERE id = '$id_estudio'";
  $rgetevaluacionpersona = $mysqli->query($getevaluacionpersona);
  $fgetevaluacionpersona = $rgetevaluacionpersona ->fetch_assoc();
  $folioexpediente = $fgetevaluacionpersona['folioexpediente'];
  $id_unico = $fgetevaluacionpersona['id_unico'];
  // get datos de persona
  $getinfsujeto = "SELECT * FROM datospersonales WHERE identificador = '$id_unico'";
  $rgetinfsujeto = $mysqli->query($getinfsujeto);
  $fgetinfsujeto = $rgetinfsujeto ->fetch_assoc();
  $id_persona = $fgetinfsujeto['id'];
  echo "<br>";
  // get datos formulario
  // get datos de comentario si existe
  echo $uptcomentario = strtoupper($_POST['upt_observaciones']);
  date_default_timezone_set("America/Mexico_City");
  $fecha_modificacion = date('Y/m/d');
  echo $tipoconvenio = $_POST['upt_tipo_convenio'];
  echo "<br>";
  if ($tipoconvenio == 'CONVENIO-ENTENDIMIENTO') {
    echo $uptconvenio = 'CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA';
    echo "<br>";
    // get demas datos del formulario
    echo $uptent_datefirma = $_POST['fecha_firma_ent'];
    echo "<br>";
    echo $uptent_dateinicio = $_POST['fecha_inicio_ent'];
    echo "<br>";
    echo $uptent_vigencia = $_POST['vigencia_ent'];
    echo "<br>";
    echo $uptent_idconvenio = strtoupper($_POST['id_convenio_ent']);
    echo "<br>";
    // sql para actualizar estudio de persona
    if ($uptent_dateinicio != '') {
      echo $uptent_fecha_mas = date("Y/m/d",strtotime($uptent_dateinicio."+ $uptent_vigencia days"));
      echo "<br>";
      echo $uptent_fecha_vigencia = date("Y/m/d",strtotime($uptent_fecha_mas."- 1 days"));
      echo "<br>";
      // solo se agrega si se eligio conveio de adhesion
      echo $uptent_estatus_suj_alert = 'PENDIENTE';
      echo "<br>";
      echo $uptent_tipo_convenio_alert = 'CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA';
      echo "<br>";
      // sql para agregar registro en la tabla de alerta de convenios
      $alert_conv = "INSERT INTO alerta_convenios(expediente, id_persona, id_unico, fecha_inicio, fecha_termino, estatus, tipo_convenio)
                            VALUES('$folioexpediente', '$id', '$id_unico', '$fecha_inicio', '$fecha_vigencia', '$estatus_suj_alert', '$tipo_convenio_alert')";
      $ralert_conv = $mysqli ->query($alert_conv);
      $act_eva_ind = "UPDATE evaluacion_persona SET  tipo_convenio= '$uptconvenio', fecha_firma = '$uptent_datefirma', fecha_inicio = '$uptent_dateinicio',
                                                      vigencia = '$uptent_vigencia', fecha_vigencia = '$uptent_fecha_vigencia',
                                                     id_convenio = '$uptent_idconvenio', observaciones = '$uptcomentario', fecha_modificacion = '$fecha_modificacion',
                                                     usuario_mod = '$name' WHERE id = '$id_estudio'";
      $res_act_eva_ind = $mysqli->query($act_eva_ind);
    }
  }elseif ($tipoconvenio == 'CONVENIO-MODIFICATORIO') {
    $uptconvenio = 'CONVENIO MODIFICATORIO';
    echo "<br>";
    echo $uptmod_datefirma = $_POST['fecha_firma_mod'];
    echo "<br>";
    echo $uptmod_dateinicio = $_POST['fecha_inicio_mod'];
    echo "<br>";
    echo $uptmod_idconvenio = strtoupper($_POST['id_convenio_mod']);
    echo "<br>contador si existe estudio por persona";
    // sql para actualizar estudio de persona
    $checkconvns = "SELECT COUNT(*) as t FROM evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico' AND tipo_convenio != ''";
    $fcheckconvns = $mysqli->query($checkconvns);
    $rcheckconvns = $fcheckconvns->fetch_assoc();
    echo $rcheckconvns['t'];
    echo "<br>";
    if ($rcheckconvns['t'] > 0) {
      $checkconvns2 = "SELECT * from  evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'
      AND tipo_convenio != '' AND analisis != 'ESTUDIO TECNICO DE MODIFICACION' ORDER BY evaluacion_persona.id DESC limit 1";
      $fcheckconvns2 = $mysqli->query($checkconvns2);
      while ($rcheckconvns2 = $fcheckconvns2->fetch_assoc()) {
           echo $uptmod_vigencia = 0;
           echo "<br>";
           echo $uptmod_fecha_vigencia = $rcheckconvns2['fecha_vigencia'];
           echo "<br>";
      }
    }else {
      $checkconvns3 = "SELECT * from  determinacionincorporacion WHERE id = '$id_persona'";
      $fcheckconvns3 = $mysqli->query($checkconvns3);
      while ($rcheckconvns3 = $fcheckconvns3->fetch_assoc()) {
        echo $uptmod_vigencia = 0;
        echo "<br>";
        echo $uptmod_orgDate = $rcheckconvns3['fecha_termino'];
        echo "<br>";
        echo $uptmod_datefin = str_replace('/', '-', $uptmod_orgDate);
        echo "<br>";
        echo $uptmod_fecha_vigencia = date("Y-m-d",strtotime($uptmod_datefin));
        echo "<br>";
      }
    }
    $act_eva_ind = "UPDATE evaluacion_persona SET  tipo_convenio= '$uptconvenio', fecha_firma = '$uptmod_datefirma', fecha_inicio = '$uptmod_dateinicio',
                                                    vigencia = '$uptmod_vigencia', fecha_vigencia = '$uptmod_fecha_vigencia',
                                                   id_convenio = '$uptmod_idconvenio', observaciones = '$uptcomentario', fecha_modificacion = '$fecha_modificacion',
                                                   usuario_mod = '$name' WHERE id = '$id_estudio'";
    $res_act_eva_ind = $mysqli->query($act_eva_ind);
  }elseif ($tipoconvenio == 'NO-APLICA') {
    echo $uptconvenio = 'NO APLICA';
    echo "<br>";
    $act_eva_ind = "UPDATE evaluacion_persona SET  tipo_convenio= '$uptconvenio', observaciones = '$uptcomentario', fecha_modificacion = '$fecha_modificacion',
                                                   usuario_mod = '$name' WHERE id = '$id_estudio'";
    $res_act_eva_ind = $mysqli->query($act_eva_ind);
  }
  // validacion
  if ($res_act_eva_ind) {
    echo ("<script type='text/javaScript'>
     window.location.href='../seguimiento_persona.php?folio=$id_persona';
     window.alert('!!!!!ESTUDIO TÉCNICO AGREGADO¡¡¡¡¡')
   </script>");
  }
}
?>
