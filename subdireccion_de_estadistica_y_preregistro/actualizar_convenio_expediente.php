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
  $id_convenio_exp = $_GET['id'];  //variable del id de la medida
  // echo $id_convenio_exp;
  $cons = "SELECT * FROM evaluacion_expediente WHERE id = '$id_convenio_exp'";
  $res_cons = $mysqli->query($cons);
  $fila_cons = $res_cons->fetch_assoc();
  $id_convenio_evaluacion = $fila_cons['id_analisis'];
  $folioexpediente = $fila_cons['folioexpediente'];

  date_default_timezone_set("America/Mexico_City");
  $tipo_convenio = $_POST['tipo_convenio'];
  // echo $tipo_convenio;

  $fecha_firma = $_POST['fecha_firma'];
  // echo $fecha_firma;
  $fecha_inicio = $_POST['fecha_inicio'];
  // echo $fecha_inicio;
  $vigencia = $_POST['vigencia'];
  // echo $vigencia;
  if ($tipo_convenio === 'CONVENIO MODIFICATORIO') {
    $checkconvns = "SELECT COUNT(*) as t FROM evaluacion_expediente WHERE folioexpediente = '$folioexpediente'";
    $fcheckconvns = $mysqli->query($checkconvns);
    $rcheckconvns = $fcheckconvns->fetch_assoc();
    // echo $rcheckconvns['t'];
    if ($rcheckconvns['t'] > 0) {
      $checkconvns11 = "SELECT COUNT(*) as t FROM evaluacion_expediente WHERE folioexpediente = '$folioexpediente' AND analisis != 'ACTUALIZACION'
      ORDER BY evaluacion_expediente.id DESC limit 1";
      $fcheckconvns11 = $mysqli->query($checkconvns11);
      $rcheckconvns11 = $fcheckconvns11->fetch_assoc();
      // echo $rcheckconvns11['t'];
      if ($rcheckconvns11['t'] > 0) {
        $checkconvns1 = "SELECT * FROM evaluacion_expediente WHERE folioexpediente = '$folioexpediente' AND tipo_convenio != ''
        ORDER BY evaluacion_expediente.id DESC limit 1";
        $fcheckconvns1 = $mysqli->query($checkconvns1);
        while ($rcheckconvns1 = $fcheckconvns1->fetch_assoc()) {
           $vigencia = 0;
           $fecha_vigencia = $rcheckconvns1['fecha_vigencia'];
        }
      }else {
        $checkconvns22 = "SELECT * FROM analisis_expediente WHERE folioexpediente = '$folioexpediente'";
        $fcheckconvns22 = $mysqli->query($checkconvns22);
        while ($rcheckconvns22 = $fcheckconvns22->fetch_assoc()) {
            $vigencia = 0;
            $fecha_vigencia = $rcheckconvns22['fecha_termino_convenio'];
        }
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
  // echo $fecha_vigencia;
  $total_convenios = $_POST['id_convenio'];
  $total_convenios;
  $observaciones = $_POST['observaciones'];
  // echo $observaciones;
  $usuario =$name;
  // echo $usuario;
  $fecha_modificacion = date('y/m/d');
  // echo $fecha_modificacion;



  $act_eva_exp = "UPDATE evaluacion_expediente SET  tipo_convenio= '$tipo_convenio', fecha_firma = '$fecha_firma', fecha_inicio = '$fecha_inicio', vigencia = '$vigencia', fecha_vigencia = '$fecha_vigencia',
                                                 total_convenios = '$total_convenios', obseervaciones = '$observaciones', fecha_modificacion = '$fecha_modificacion', usuario_mod = '$usuario' WHERE id = '$id_convenio_exp'";
  $res_act_eva_exp = $mysqli->query($act_eva_exp);
  // validacion de update correcto
  if($res_act_eva_exp){
    echo ("<script type='text/javaScript'>
     window.location.href='../subdireccion_de_estadistica_y_preregistro/detalles_convenio_exp.php?id=$id_convenio_evaluacion';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
