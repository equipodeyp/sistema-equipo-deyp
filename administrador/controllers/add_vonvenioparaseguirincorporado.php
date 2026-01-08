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
  $folioexpediente = $fgetfolexppersona['folioexpediente'];
  $id_unico = $fgetfolexppersona['identificador'];
  echo "<br>";
  // get datos formulario
  echo $estudio = $_POST['analisis_m'];
  echo "<br>";
  echo $dateautorizacion = $_POST['fecha_auto'];
  echo "<br>";
  echo $idanalisis = strtoupper($_POST['id_analisis']);
  echo "<br>";
  echo $convenio = $_POST['tipo_convenio'];
  echo "<br>";
  echo $datefirma = $_POST['fecha_firma'];
  echo "<br>";
  echo $dateinicio = $_POST['fecha_inicio'];
  echo "<br>";
  echo $vigencia = $_POST['vigencia'];
  echo "<br>";
  echo $idconvenio =strtoupper($_POST['id_convenio']);
  echo "<br>";
  echo $observaciones = strtoupper($_POST['observaciones']);
  echo "<br>";
  // validar que tipo de convenio es segun el caso
  if ($convenio === 'CONVENIO MODIFICATORIO') {
    $checkconvns = "SELECT COUNT(*) as t FROM evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'";
    $fcheckconvns = $mysqli->query($checkconvns);
    $rcheckconvns = $fcheckconvns->fetch_assoc();
    echo $rcheckconvns['t'];
    echo "<br>";
    if ($rcheckconvns['t'] > 0) {
      $checkconvns2 = "SELECT * from  evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'
      ORDER BY evaluacion_persona.id DESC limit 1";
      $fcheckconvns2 = $mysqli->query($checkconvns2);
      while ($rcheckconvns2 = $fcheckconvns2->fetch_assoc()) {
         echo $vigencia = 0;
         echo "<br>";
         echo $fecha_vigencia = $rcheckconvns2['fecha_vigencia'];
         echo "<br>";
      }
    }else {
      $checkconvns3 = "SELECT * from  determinacionincorporacion WHERE folioexpediente = '$folioexpediente' AND id_persona = '$id_persona'";
      $fcheckconvns3 = $mysqli->query($checkconvns3);
      while ($rcheckconvns3 = $fcheckconvns3->fetch_assoc()) {
         echo $vigencia = 0;
         echo "<br>";
         echo $orgDate = $rcheckconvns3['fecha_termino'];
         echo "<br>";
         echo $datefin = str_replace('/', '-', $orgDate);
         echo "<br>";
         echo $fecha_vigencia = date("Y-m-d",strtotime($datefin));
         echo "<br>";
      }
    }
  }elseif ($convenio === 'CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA') {
    if ($dateinicio != '') {
      echo $fecha_mas = date("Y/m/d",strtotime($dateinicio."+ $vigencia days"));
      echo "<br>";
      echo $fecha_vigencia = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
      echo "<br>";
      // solo se agrega si se eligio conveio de adhesion
      echo $estatus_suj_alert = 'PENDIENTE';
      echo "<br>";
      echo $tipo_convenio_alert = 'CONVENIO DE ENTENDIMIENTO PARA CONTINUAR INCORPORADO AL PROGRAMA';
      echo "<br>";
      // sql para agregar registro en la tabla de alerta de convenios
      $alert_conv = "INSERT INTO alerta_convenios(expediente, id_persona, id_unico, fecha_inicio, fecha_termino, estatus, tipo_convenio)
                            VALUES('$folioexpediente', '$id', '$id_unico', '$fecha_inicio', '$fecha_vigencia', '$estatus_suj_alert', '$tipo_convenio_alert')";
      $ralert_conv = $mysqli ->query($alert_conv);
    }
  }
  $usuario =$name;
  $fecha_alta = date('Y/m/d');

  $addevaluacionpersona = "INSERT INTO evaluacion_persona(folioexpediente, id_unico, analisis, fecha_aut, id_analisis, tipo_convenio, fecha_firma, fecha_inicio, vigencia, fecha_vigencia, id_convenio, observaciones, usuario, fecha_alta)
                 VALUES('$folioexpediente', '$id_unico', '$estudio', '$dateautorizacion', '$idanalisis', '$convenio', '$datefirma', '$dateinicio', '$vigencia', '$fecha_vigencia', '$idconvenio', '$observaciones', '$usuario', '$fecha_alta')";
  $raddevaluacionpersona = $mysqli->query($addevaluacionpersona);
  if ($raddevaluacionpersona) {
    echo ("<script type='text/javaScript'>
     window.location.href='../seguimiento_persona.php?folio=$id_persona';
     window.alert('!!!!!ESTUDIO TÉCNICO AGREGADO¡¡¡¡¡')
   </script>");
  }
}
?>
