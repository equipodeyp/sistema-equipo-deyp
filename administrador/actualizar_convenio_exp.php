<?php
error_reporting(0);
require 'conexion.php';
session_start ();
$verifica_update_person = $_SESSION["verifica_update_person"];
if ($verifica_update_person == 1) {
  // echo $verifica_update_person;
  unset($_SESSION['verifica_update_person']);
  $name = $_SESSION['usuario'];
  $sentencia=" SELECT usuario, nombre, area, apellido_p, apellido_m FROM usuarios WHERE usuario='$name'";
  $result = $mysqli->query($sentencia);
  $row=$result->fetch_assoc();
  // carga de datos
  $id_analisis_expediente = $_GET['id'];  //variable del folio al que se relaciona
  echo $id_analisis_expediente;
  $cons = "SELECT * FROM evaluacion_expediente WHERE id_analisis = '$id_analisis_expediente'";
  $res_cons = $mysqli->query($cons);
  $fila_cons = $res_cons->fetch_assoc();
  $id_evaluacion = $fila_cons['id'];
  // echo $fila_cons['id'];
  $analisis = $_POST['analisis_m'];
  $fecha_autorizacion = $_POST['fecha_auto'];
  $id_analisis = $_POST['id_analisis'];
  $convenio =$_POST['tipo_convenio'];
  $fecha_firma =$_POST['fecha_firma'];
  $fecha_inicio =$_POST['fecha_inicio'];
  $vigencia =$_POST['vigencia'];
  if ($fecha_inicio !== '' && $vigencia !== '') {
    $fecha_v = date("Y/m/d", strtotime($fecha_inicio."+$vigencia days"));
    $fecha_termino = date("Y/m/d", strtotime($fecha_v."- 1 days"));
  }
  $total_convenios = $_POST['id_convenio'];
  ////////////////////////////////////////////actualizar evaluacion por expediente
  $actualizar_eva_exp = "UPDATE evaluacion_expediente SET analisis ='$analisis', fecha_aut = '$fecha_autorizacion', id_analisis = '$id_analisis', tipo_convenio = '$convenio', fecha_firma = '$fecha_firma',
                                                          fecha_inicio = '$fecha_inicio', vigencia = '$vigencia', fecha_vigencia = '$fecha_termino', total_convenios = '$total_convenios'
                                                      WHERE id = '$id_evaluacion'";
  $res_atualizar = $mysqli->query($actualizar_eva_exp);
  // validacion de update correcto
  if($res_atualizar){
    echo ("<script type='text/javaScript'>
     window.location.href='../administrador/detalles_convenio_exp.php?id=$id_analisis_expediente';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}
else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
}

?>
