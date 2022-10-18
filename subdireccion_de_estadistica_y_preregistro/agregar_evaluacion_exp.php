<?php
error_reporting(0);
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
  $folioexpediente = $_GET['folio'];   //variable del folio al que se relaciona
  date_default_timezone_set("America/Mexico_City");
  $analisis = $_POST['analisis_m'];
  $fecha_aut = $_POST['fecha_auto'];
  $id_analisis = $_POST['id_analisis'];
  $tipo_convenio = $_POST['tipo_convenio'];
  $fecha_firma = $_POST['fecha_firma'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $vigencia = $_POST['vigencia'];

  if ($tipo_convenio === 'CONVENIO MODIFICATORIO') {
    $checkconvns = "SELECT COUNT(*) as t FROM evaluacion_expediente WHERE folioexpediente = '$folioexpediente'";
    $fcheckconvns = $mysqli->query($checkconvns);
    $rcheckconvns = $fcheckconvns->fetch_assoc();

    if ($rcheckconvns['t'] > 0) {
      $checkconvns1 = "SELECT * FROM evaluacion_expediente WHERE folioexpediente = '$folioexpediente'
      ORDER BY evaluacion_expediente.id DESC limit 1";
      $fcheckconvns1 = $mysqli->query($checkconvns1);
      while ($rcheckconvns1 = $fcheckconvns1->fetch_assoc()) {
         $vigencia = 0;
         $fecha_vigencia = $rcheckconvns1['fecha_vigencia'];
      }
    }else {
      $checkconvns2 = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$folioexpediente'";
      $fcheckconvns2 = $mysqli->query($checkconvns2);
      while ($rcheckconvns2 = $fcheckconvns2->fetch_assoc()) {
         $vigencia = 0;
         $fecha_vigencia = $rcheckconvns2['fecha_termino_convenio'];
      }
    }
  }elseif ($tipo_convenio === 'CONVENIO DE ADHESIÓN') {
    // obtener fecha de la vigencia en automatico
    if ($fecha_inicio != '') {
      $fecha_mas = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
      $fecha_vigencia = date("Y/m/d",strtotime($fecha_mas."- 1 days"));

    }
  }
  $total_convenios = $_POST['id_convenio'];
  $observaciones = $_POST['observaciones'];
  $usuario =$name;
  $fecha_alta = date('y/m/d');




  $add_evaluacion_exp = "INSERT INTO evaluacion_expediente(folioexpediente, analisis, fecha_aut, id_analisis, tipo_convenio, fecha_firma, fecha_inicio, vigencia, fecha_vigencia, total_convenios, obseervaciones, usuario, fecha_alta)
                 VALUES('$folioexpediente', '$analisis', '$fecha_aut', '$id_analisis', '$tipo_convenio', '$fecha_firma', '$fecha_inicio', '$vigencia', '$fecha_vigencia', '$total_convenios', '$observaciones', '$usuario', '$fecha_alta')";
  $res_add_evaluacion_exp = $mysqli->query($add_evaluacion_exp);
// validacion del registro correcto
  if($res_add_evaluacion_exp){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/seguimiento_expediente.php?folio=$folioexpediente';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
 }
?>
