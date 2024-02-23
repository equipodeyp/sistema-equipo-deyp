<?php
// error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datsos
  $identificador = $_GET['folio'];   //variable del folio al que se relaciona
  // echo $identificador.'<br />';
  $datos_personales = "SELECT * FROM datospersonales WHERE identificador='$identificador'";
  $result_datos_personales = $mysqli->query($datos_personales);
  $fila_datos_personales=$result_datos_personales->fetch_assoc();
  $id= $fila_datos_personales['id'];
  // datos para guardar
  date_default_timezone_set("America/Mexico_City");
  $folioexpediente= $fila_datos_personales['folioexpediente'];
  $id_unico = $identificador;
  // echo $id_unico;
  $analisis = $_POST['analisis_m'];
  $fecha_aut = $_POST['fecha_auto'];
  $id_analisis = $_POST['id_analisis'];
  $tipo_convenio = $_POST['tipo_convenio'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $vigencia = $_POST['vigencia'];
  // echo $tipo_convenio.'<br />';
  if ($tipo_convenio === 'CONVENIO MODIFICATORIO') {
    $checkconvns = "SELECT COUNT(*) as t FROM evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'";
    $fcheckconvns = $mysqli->query($checkconvns);
    $rcheckconvns = $fcheckconvns->fetch_assoc();
    if ($rcheckconvns['t'] > 0) {
      $checkconvns2 = "SELECT * from  evaluacion_persona WHERE folioexpediente = '$folioexpediente' AND id_unico = '$id_unico'
      ORDER BY evaluacion_persona.id DESC limit 1";
      $fcheckconvns2 = $mysqli->query($checkconvns2);
      while ($rcheckconvns2 = $fcheckconvns2->fetch_assoc()) {
         $vigencia = 0;
         $fecha_vigencia = $rcheckconvns2['fecha_vigencia'];
      }
    }else {
      $checkconvns3 = "SELECT * from  determinacionincorporacion WHERE folioexpediente = '$folioexpediente' AND id = '$id'";
      $fcheckconvns3 = $mysqli->query($checkconvns3);
      while ($rcheckconvns3 = $fcheckconvns3->fetch_assoc()) {
         $vigencia = 0;
         $orgDate = $rcheckconvns3['fecha_termino'];
         $datefin = str_replace('/', '-', $orgDate);
         $fecha_vigencia = date("Y-m-d",strtotime($datefin));
      }
    }
  }elseif ($tipo_convenio === 'CONVENIO DE ADHESIÓN') {
    if ($fecha_inicio != '') {
      $fecha_mas = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
      $fecha_vigencia = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
      // solo se agrega si se eligio conveio de adhesion
      $estatus_suj_alert = 'PENDIENTE';
      // sql para agregar registro en la tabla de alerta de convenios
      $alert_conv = "INSERT INTO alerta_convenios(expediente, id_persona, id_unico, fecha_inicio, fecha_termino, estatus)
                            VALUES('$folioexpediente', '$id', '$id_unico', '$fecha_inicio', '$fecha_vigencia', '$estatus_suj_alert')";
      $ralert_conv = $mysqli ->query($alert_conv);
    }
  }

  $id_convenio = $_POST['id_convenio'];
  $observaciones = $_POST['observaciones'];
  $usuario =$name;
  $fecha_alta = date('y/m/d');

  $add_evaluacion_p = "INSERT INTO evaluacion_persona(folioexpediente, id_unico, analisis, fecha_aut, id_analisis, tipo_convenio, fecha_firma, fecha_inicio, vigencia, fecha_vigencia, id_convenio, observaciones, usuario, fecha_alta)
                 VALUES('$folioexpediente', '$id_unico', '$analisis', '$fecha_aut', '$id_analisis', '$tipo_convenio', '$fecha_firma', '$fecha_inicio', '$vigencia', '$fecha_vigencia', '$id_convenio', '$observaciones', '$usuario', '$fecha_alta')";
  $res_add_evaluacion_p = $mysqli->query($add_evaluacion_p);


// validacion del registro correcto
  if($res_add_evaluacion_p){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_persona.php?folio=$id';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
 }
?>
