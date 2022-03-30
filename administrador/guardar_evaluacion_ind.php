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
  $identificador = $_GET['folio'];   //variable del folio al que se relaciona
  // echo $identificador;
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
  // obtener fecha de la vigencia en automatico
  if ($fecha_inicio != '') {
    $fecha_mas = date("Y/m/d",strtotime($fecha_inicio."+ $vigencia days"));
    $fecha_vigencia = date("Y/m/d",strtotime($fecha_mas."- 1 days"));
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
     window.location.href='../administrador/seguimiento_persona.php?folio=$id';
     window.alert('!!!!!Registro exitoso¡¡¡¡¡')
   </script>");
  }
}else {
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=admin.php'>";
 }
?>
